# ビジネスロジック集約によるリファクタリングガイド

## 概要

このガイドでは、Laravel アプリケーションにおいて **Fat Controller** 問題を解決し、ビジネスロジックをモデル層に適切に集約するリファクタリング手法を解説します。

## 参考文献

-   [Laravel から一歩先へ。クリーンアーキテクチャによる柔軟な設計パターン](https://qiita.com/ucan-lab/items/a9a5c55ce12a6d8752d3)

## 現在の問題点

### Fat Controller 問題

従来の MVC パターンでは、コントローラーにビジネスロジックが集中しがちです：

```php
// ❌ 問題のあるコード例
class ReservationController extends Controller
{
    public function create()
    {
        // ビジネスロジックがコントローラーに散在
        $availableUsers = User::whereDoesntHave('reservations')->orderBy('name')->get();
        $usersWithReservations = User::whereHas('reservations')->with('reservations')->orderBy('name')->get();

        return view('reservations.create', compact('availableUsers', 'usersWithReservations'));
    }

    public function store(Request $request)
    {
        // 複雑なビジネスルールがコントローラーに
        $userExistingReservation = Reservation::where('user_id', $request->user_id)->first();
        if ($userExistingReservation) {
            return back()->withErrors(['user_id' => 'この顧客は既に予約があります。']);
        }

        // 重複コードが複数のコントローラーに存在
    }
}
```

### この設計の問題

1. **責務の集中**: コントローラーが肥大化
2. **重複コード**: 同じロジックが複数箇所に存在
3. **テストの困難さ**: ビジネスロジックの単体テストが困難
4. **保守性の低下**: 仕様変更時に複数箇所の修正が必要

## リファクタリング手法

### 1. ビジネスロジックのモデル層への集約

#### スコープの活用

```php
// ✅ 改善されたUserモデル
class User extends Authenticatable
{
    // 既存のコード...

    /**
     * 予約可能なユーザー（予約がない）のスコープ
     */
    public function scopeAvailableForReservation($query)
    {
        return $query->whereDoesntHave('reservations');
    }

    /**
     * 既存予約があるユーザーのスコープ
     */
    public function scopeWithExistingReservations($query)
    {
        return $query->has('reservations')
            ->with(['reservations' => function($q) {
                $q->orderBy('reservation_datetime', 'desc');
            }]);
    }
}
```

#### ビジネスメソッドの追加

```php
class User extends Authenticatable
{
    /**
     * この顧客が予約を持っているか
     *
     * @return bool
     */
    public function hasReservation(): bool
    {
        return $this->reservations()->exists();
    }

    /**
     * 最新の予約を取得
     *
     * @return Reservation|null
     */
    public function latestReservation(): ?Reservation
    {
        return $this->reservations()
            ->orderBy('reservation_datetime', 'desc')
            ->first();
    }

    /**
     * 予約可能かどうか判定
     *
     * @return bool
     */
    public function canMakeReservation(): bool
    {
        return !$this->hasReservation();
    }

    /**
     * 予約統計を取得
     *
     * @return array
     */
    public static function getReservationStats(): array
    {
        return [
            'available' => self::availableForReservation()->count(),
            'reserved' => self::withExistingReservations()->count(),
            'total' => self::count(),
        ];
    }
}
```

### 2. コントローラーのスリム化

```php
// ✅ リファクタリング後のコントローラー
class ReservationController extends Controller
{
    public function create()
    {
        // ビジネスロジックはモデルに委譲
        $availableUsers = User::availableForReservation()
            ->orderBy('name')
            ->get();

        $usersWithReservations = User::withExistingReservations()
            ->orderBy('name')
            ->get();

        return view('reservations.create', compact(
            'availableUsers',
            'usersWithReservations'
        ));
    }

    public function store(Request $request)
    {
        $userId = $this->resolveUserId($request);
        $user = User::find($userId);

        // モデルのメソッドを使って統一的にチェック
        if (!$user->canMakeReservation()) {
            return back()->withErrors([
                'user_id' => 'この顧客は既に予約があります。'
            ]);
        }

        // 予約作成処理...
    }
}
```

### 3. ビューでの活用

```blade
{{-- ✅ ビューでもモデルメソッドを活用 --}}
@php
    $hasExistingReservation = auth()->user()->hasReservation();
@endphp

@if($hasExistingReservation)
    <div class="alert alert-warning">
        すでに予約があります。
        予約日時: {{ auth()->user()->latestReservation()->reservation_datetime->format('Y/m/d H:i') }}
    </div>
@endif
```

## 利点

### 1. 関心の分離

-   **コントローラー**: リクエスト処理とレスポンス生成に専念
-   **モデル**: ビジネスロジックとデータ操作に専念
-   **ビュー**: プレゼンテーション層に専念

### 2. 再利用性の向上

```php
// 複数のコントローラーで同じメソッドを使用可能
$stats = User::getReservationStats();

// 管理者用
$availableUsers = User::availableForReservation()->get();

// 顧客用
$canReserve = auth()->user()->canMakeReservation();
```

### 3. テスタビリティの向上

```php
// ✅ ビジネスロジックの単体テストが容易
class UserTest extends TestCase
{
    public function testCanMakeReservationWhenNoExistingReservation()
    {
        $user = User::factory()->create();

        $this->assertTrue($user->canMakeReservation());
    }

    public function testCannotMakeReservationWhenHasExistingReservation()
    {
        $user = User::factory()->create();
        Reservation::factory()->create(['user_id' => $user->id]);

        $this->assertFalse($user->canMakeReservation());
    }
}
```

## クリーンアーキテクチャとの関連

### 依存関係の方向

```
外側の層 → 内側の層
Controller → Model (Domain)
```

-   **内側（Domain 層）**: ビジネスルールとエンティティ
-   **外側（Application 層）**: ユースケース実装
-   **最外側（Infrastructure 層）**: フレームワーク、DB、外部 API

### Domain 層の純粋性保持

```php
// ✅ フレームワークに依存しないビジネスロジック
class User extends Authenticatable
{
    public function canMakeReservation(): bool
    {
        // 純粋なビジネスルール
        return !$this->hasReservation();
    }
}
```

## 実装ステップ

### Step 1: 現状分析

1. コントローラーの肥大化箇所を特定
2. 重複するビジネスロジックを抽出
3. ドメインルールを整理

### Step 2: モデル設計

1. スコープの定義
2. ビジネスメソッドの実装
3. 統計・集計メソッドの追加

### Step 3: コントローラー修正

1. ビジネスロジックをモデルメソッドに置き換え
2. コントローラーをスリム化
3. 重複コードの除去

### Step 4: テスト追加

1. モデルメソッドの単体テスト
2. コントローラーの機能テスト
3. 統合テストの実装

## 注意点

### 過度な抽象化を避ける

-   **Simple CRUD**: 単純な操作はそのまま
-   **Complex Business Logic**: 複雑なルールのみ抽象化

### パフォーマンスの考慮

```php
// ✅ N+1問題を避ける
public function scopeWithExistingReservations($query)
{
    return $query->has('reservations')
        ->with(['reservations' => function($q) {
            $q->orderBy('reservation_datetime', 'desc');
        }]);
}
```

### 段階的なリファクタリング

1. **既存機能を壊さない**
2. **テストファーストで進める**
3. **小さな単位で改善**

## まとめ

ビジネスロジックをモデル層に適切に集約することで：

-   ✅ **Fat Controller 問題の解決**
-   ✅ **コードの再利用性向上**
-   ✅ **テスタビリティの向上**
-   ✅ **保守性の向上**
-   ✅ **フレームワーク依存度の軽減**

クリーンアーキテクチャの原則に従って、関心の分離と依存方向の明確化を行うことで、長期的に保守可能なアプリケーションを構築できます。

---

**参考**: [Laravel から一歩先へ。クリーンアーキテクチャによる柔軟な設計パターン](https://qiita.com/ucan-lab/items/a9a5c55ce12a6d8752d3)
