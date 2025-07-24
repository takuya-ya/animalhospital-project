@echo off
echo Laravel 開発サーバーを起動中...

REM PHPのビルトインサーバー起動（新しいウィンドウで）
start cmd /k "php artisan serve"

REM Vite（npm run dev）起動（別ウィンドウで）
start cmd /k "npm run dev"

exit
