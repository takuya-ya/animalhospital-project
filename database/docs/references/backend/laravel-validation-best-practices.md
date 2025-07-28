# Laravel バリデーション ベストプラクティス ガイド

## 概要

Laravel アプリケーションにおけるバリデーション実装のベストプラクティスをまとめたガイドです。
2024-2025年の最新動向と実際のプロジェクト経験を基に構成されています。

## バリデーション手法の比較

### 1. Form Request クラス（最推奨）

**使用場面：** 複雑なバリデーション、再利用が必要な場合

```php
// コマンド生成
php artisan make:request StoreReservationRequest

// 実装例
class StoreReservationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id',
            'reservation_datetime' => [
                'required',
                'date',
                'after:now',
                function ($attribute, $value, $fail) {
                    $datetime = Carbon::parse($value);
                    
                    // 日曜日チェック
                    if ($datetime->isSunday()) {
                        $fail('日曜日は定休日です。');
                    }
                    
                    // 休診日チェック（DB検証）
                    if (Holiday::where('holiday_date', $datetime->format('Y-m-d'))->exists()) {
                        $fail('この日は休診日です。');
                    }
                    
                    // 重複チェック
                    if (Reservation::where('reservation_datetime', $datetime)->exists()) {
                        $fail('この時間は既に予約が入っています。');
                    }
                    
                    // ユーザーの既存予約チェック
                    if (auth()->check()) {
                        $existing = Reservation::where('user_id', auth()->id())
                            ->where('reservation_datetime', '>', now())
                            ->exists();
                        if ($existing) {
                            $fail('すでに未来の予約があります。');
                        }
                    }
                }
            ],
        ];
    }
    
    public function messages(): array
    {
        return [
            'reservation_datetime.after' => '過去の日時は予約できません',
            'user_id.exists' => '指定されたユーザーが存在しません',
        ];
    }
}
```

**Controller での使用：**
```php
public function store(StoreReservationRequest $request)
{
    // バリデーションは自動実行済み
    Reservation::create($request->validated() + [
        'user_id' => Auth::id()
    ]);
    
    return redirect()->route('reservations.index')
        ->with('success', '予約が完了しました。');
}
```

### 2. Controller 直接バリデーション

**使用場面：** シンプルな一回限りのバリデーション

```php
public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'age' => 'integer|between:0,150'
    ]);
    
    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }
    
    // 処理継続
}
```

### 3. カスタムバリデーションルール

**複雑なビジネスロジックを再利用可能にする場合：**

```php
// コマンド生成
php artisan make:rule NotHolidayRule

// 実装
class NotHolidayRule implements Rule
{
    public function passes($attribute, $value)
    {
        $date = Carbon::parse($value)->format('Y-m-d');
        return !Holiday::where('holiday_date', $date)->exists();
    }

    public function message()
    {
        return 'この日は休診日です。';
    }
}

// 使用
'reservation_date' => ['required', 'date', new NotHolidayRule()]
```

## 実装前後の比較

### Before（Controller内でのバリデーション）
```php
public function store(Request $request)
{
    // 20-30行のバリデーション処理
    $datetime = Carbon::parse($request->reservation_date . ' ' . $request->reservation_time);
    
    // 休診日チェック
    $isHoliday = Holiday::where('holiday_date', $datetime->format('Y-m-d'))->exists();
    if ($isHoliday) {
        return back()->withErrors(['reservation_date' => 'この日は休診日です。']);
    }

    // 日曜日チェック
    if ($datetime->isSunday()) {
        return back()->withErrors(['reservation_date' => '日曜日は定休日です。']);
    }

    // ユーザーの未来の予約チェック
    $userExistingReservation = Reservation::where('user_id', Auth::id())
        ->where('reservation_datetime', '>', now())
        ->first();
    if ($userExistingReservation) {
        return back()->withErrors(['reservation_date' => 'すでに未来の予約があります。']);
    }

    // 重複チェック
    $existing = Reservation::where('reservation_datetime', $datetime)->first();
    if ($existing) {
        return back()->withErrors(['reservation_time' => 'この時間は既に予約が入っています。']);
    }
    
    // 実際の処理
    Reservation::create([
        'user_id' => Auth::id(),
        'reservation_datetime' => $datetime,
    ]);
    
    return redirect()->route('reservations.index');
}
```

### After（Form Request使用後）
```php
public function store(StoreReservationRequest $request)
{
    // バリデーションは自動実行済み（3-5行で完了）
    Reservation::create($request->validated() + [
        'user_id' => Auth::id()
    ]);
    
    return redirect()->route('reservations.index')
        ->with('success', '予約が完了しました。');
}
```

## 選択基準

| 手法 | 適用場面 | メリット | デメリット |
|------|----------|----------|-----------|
| **Form Request** | 複雑・再利用・DB検証 | 保守性◎、再利用◎、自動実行 | 初期設定必要 |
| **Controller直接** | シンプル・一回限り | 分かりやすい、柔軟性◎ | 再利用性△、Controller肥大化 |
| **カスタムルール** | 複雑なビジネスロジック | 再利用性◎、テスト容易 | 別ファイル管理 |

## 推奨パターン（2025年版）

### 基本方針
1. **Form Request をデフォルト**として採用
2. 特別な理由がある場合のみ Controller 直接を使用
3. 複雑なビジネスロジックはカスタムルールに分離

### プロジェクト適用例
```php
// 1. Form Request でベースバリデーション
class StoreReservationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'reservation_datetime' => [
                'required',
                'date',
                'after:now',
                new NotHolidayRule(),
                new NotSundayRule(),
                new NoConflictRule(),
                new UserReservationLimitRule(),
            ],
        ];
    }
}

// 2. 必要に応じてService層でビジネスロジック補完
class ReservationService
{
    public function createReservation(array $data): Reservation
    {
        // 追加のビジネスロジック
        return Reservation::create($data);
    }
}
```

## DB検証の実装パターン

### Form Request内でのDB検証
```php
public function rules(): array
{
    return [
        'email' => [
            'required',
            'email',
            function ($attribute, $value, $fail) {
                if (User::where('email', $value)->exists()) {
                    $fail('このメールアドレスは既に使用されています。');
                }
            }
        ],
    ];
}
```

### exists と unique ルールの活用
```php
'user_id' => 'required|exists:users,id',
'email' => 'required|email|unique:users,email',
```

## エラーハンドリング

### 自動エラー表示（Blade）
```blade
@error('reservation_date')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
```

### JSON API での対応
```php
// FormRequest内
protected function failedValidation(Validator $validator)
{
    if (request()->expectsJson()) {
        throw new HttpResponseException(
            response()->json(['errors' => $validator->errors()], 422)
        );
    }
    
    parent::failedValidation($validator);
}
```

## まとめ

- **Form Request** を積極的に活用してコードの保守性を向上
- **DB検証も Form Request で実装可能**
- Controller は HTTP フローの制御に専念
- 複雑なロジックはカスタムルールやService層に分離

## 参考文献

1. [Laravel Validation 101, Controllers, Form Requests, and Rules - Laravel News](https://laravel-news.com/laravel-validation-101-controllers-form-requests-and-rules)
2. [Mastering Laravel Form Validation: Best Practices for 2025 - Howik](https://howik.com/laravel-best-practices-for-form-validation)
3. [19+ Laravel Best Practices for Developers in 2025 | ButterCMS](https://buttercms.com/blog/laravel-best-practices/)
4. [Laravel Best Practices, Tips, and Tricks for 2025 - DEV Community](https://dev.to/westtan/laravel-best-practices-tips-and-tricks-for-2025-5542)
5. [Better place for validations? Controller or Model? - Laracasts](https://laracasts.com/discuss/channels/general-discussion/better-place-for-validations-controller-or-model)
6. [Laravel公式ドキュメント - Validation](https://laravel.com/docs/11.x/validation)
7. [Qiita - Laravelのバリデーション方法](https://qiita.com/gone0021/items/c613ef7e006b6f5d47ce)

---

*最終更新: 2025年7月*