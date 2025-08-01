# Laravel コントローラー設計に関する考察

## 問い：管理者用と一般ユーザー用の`ReservationController`は統合すべきか？

2 つの`ReservationController`（`Admin\ReservationController`と`ReservationController`）を統合するという設計案について、その是非を中立的な立場から考察する。

### 一般的なコントローラーの設計思想（参考文献より）

1.  **単一責任の原則 (Single Responsibility Principle)**

    -   クラスやメソッドは「たった一つの責任」を持つべき。
    -   コントローラーは HTTP リクエストとレスポンスの管理に専念し、複雑なロジックは他クラスに委譲する。

2.  **関心の分離 (Separation of Concerns)**

    -   ビジネスロジック → サービスクラス、アクションクラス
    -   バリデーション → フォームリクエストクラス
    -   データベース関連ロジック → モデル、リポジトリクラス
    -   上記のように、コントローラーから各種ロジックを分離することが推奨される。

3.  **コントローラーをシンプルに保つ (Fat Model, Skinny Controller)**
    -   ロジックを他クラスへ委譲し、コントローラーを「薄く」保つことで、可読性と保守性を高める。

### コントローラー統合の是非

#### 現状の責任分担

-   `Admin\ReservationController`: **管理者**として、**全ユーザー**の予約を管理する。
-   `ReservationController`: **一般ユーザー**として、**自身**の予約を管理する。

これらは操作対象・権限・ビジネスルールが明確に異なるため、それぞれが別の「責任」を担っている。

#### 統合のデメリット

-   **単一責任の原則への違反**: 2 つの異なる責任を 1 つのクラスが担うことになる。
-   **コードの複雑化**: 権限（管理者／一般ユーザー）による条件分岐が多発し、可読性が低下する。
-   **保守性の低下**: 一方の機能改修が、もう一方へ意図しない影響を与えるリスクが高まる。

#### 結論

参考文献が示すベストプラクティスに基づくと、**コントローラーの統合は推奨されない**。責任の異なるクラスは分割したままの方が、単一責任の原則に沿い、コードの可読性・保守性が高まる。

### 推奨される代替案：サービスクラスの導入

コードの重複を避けたいという目的であれば、コントローラーを統合する代わりに、**共通のビジネスロジックをサービスクラスに抽出する**アプローチが有効である。

#### 実装例

1.  `app/Services/ReservationService.php` を作成。
2.  予約日時の重複チェックなど、共通化できるロジックをサービスクラスに実装する。
3.  両方の`ReservationController`から、この`ReservationService`を依存性注入（DI）などを通じて呼び出す。

#### サービスクラス導入のメリット

-   **DRY 原則**: ロジックを一元管理し、コードの重複を排除できる。
-   **関心の分離**: コントローラーとビジネスロジックを綺麗に分離できる。
-   **高い保守性**: ロジックの修正がサービスクラスの 1 箇所で完結する。
-   **テストの容易性**: ビジネスロジックを単体でテストしやすくなる。

### まとめ

現状のコントローラー分割は維持しつつ、共通ロジックをサービスクラスへリファクタリングする手法が、より堅牢で保守性の高い設計につながる。

---

### 参考文献

-   [Clean Laravel Controllers: Best Practices and Tips, part 1](https://medium.com/@moumenalisawe/clean-laravel-controllers-best-practices-and-tips-part-1-d44cd614dd2c)
-   [How to write clean Controllers in Laravel](https://dev.to/anantrp/how-to-write-clean-controllers-in-laravel-1m9p)
-   [What is a controller in Laravel framework?](https://codedamn.com/news/laravel/what-is-a-controller-in-laravel-framework)
-   [GitHub - Khaledsb/laravel-best-practices](https://github.com/Khaledsb/laravel-best-practices)
-   [Laravel Project Structure: Moving Code Out of Controllers](https://medium.com/@laravelprotips/laravel-project-structure-moving-code-out-of-controllers-7cdc3541928d)
