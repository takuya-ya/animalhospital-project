# ナビゲーションのハイライト機能実装ガイド

現在表示しているページに応じて、ヘッダーなどのナビゲーション要素のスタイルを変更する（ハイライトする）機能の実装方法について説明します。

## 方法 1：Laravel のヘルパー関数を使う（推奨）

サーバーサイドで HTML を生成する際に、現在のページの URL やルート情報をもとに動的に CSS クラスを割り当てる方法です。これが最も信頼性が高く、効率的な方法です。

例えば、ナビゲーションを管理している Blade ファイル（例: `resources/views/layouts/navigation.blade.php`）で、以下のように記述します。

Laravel の `Request::is()` ヘルパーや `request()->routeIs()` メソッドを使うと、現在の URL やルートが指定したパターンに一致するかどうかを判定できます。

```php
{{-- resources/views/layouts/navigation.blade.php の例 --}}

{{-- ... 既存のコード ... --}}
<div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
        {{ __('Dashboard') }}
    </x-nav-link>

    {{-- 例：トップページへのリンク --}}
    <x-nav-link :href="route('welcome')" :active="request()->is('/')">
        {{ __('Home') }}
    </x-nav-link>

    {{-- 例：サービスページへのリンク --}}
    <x-nav-link :href="route('services')" :active="request()->is('services*')">
        {{ __('Services') }}
    </x-nav-link>
</div>
{{-- ... 既存のコード ... --}}
```

### 解説

-   `request()->is('/')`: 現在のページのパスが `/` (ルート、つまりホームページ) である場合に `true` を返します。
-   `request()->is('services*')`: ワイルドカード `*` を使うと、`/services` や `/services/detail` のようなパスにも一致させることができます。
-   `request()->routeIs('dashboard')`: 現在のルート名が `dashboard` である場合に `true` を返します。パスの変更に強いため、より堅牢な実装になります。
-   `x-nav-link` コンポーネントの `:active` 属性に `true` または `false` を渡すことで、Tailwind CSS のクラスが動的に切り替わり、アクティブな状態のスタイルが適用されます。

## 方法 2：JavaScript を使う

クライアントサイドで完結させたい場合は、JavaScript を使う方法もあります。

`resources/js/app.js` に以下のコードを追記します。

```javascript
// resources/js/app.js

document.addEventListener('DOMContentLoaded', () => {
  const currentPath = window.location.pathname;
  // ヘッダーのナビゲーションリンクをすべて取得します。セレクタはご自身のHTML構造に合わせて調整してください。
  const navLinks = document.querySelectorAll('.nav-link'); // 仮のクラス名

  navLinks.forEach(link => {
    // リンクのhref属性値と現在のパスが
```
