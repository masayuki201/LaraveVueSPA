## 環境
●PHP、Composer、NPMが利用可能な環境で下記環境構築を行います。
<br>
●Laravel Mix 5.0.1
<br>
●Laravel 6.20.44
<br>
●PHP 7.3.29
<br>
●NPM 6.14.11
<br>
●Vue.js 2.6.14


## 環境構築
### ●クローン
git clone https://github.com/masayuki201/LaraveVueSPA.git

### ●PHP側パッケージインストール
<br>
composer install

### ●.env修正
<br>
.env.exampleをコピーし、.envを作成
<br>
.envのDB情報を修正
<br>
<br>
DBにsqliteを使用する場合の例
<br>
『DB_CONNECTION=sqlite』とし、他のDB情報は削除

### ●DB、テストデータ生成
<br>
php artisan migrate:refresh --seed
<br>
<br>
必要であれば、
<br>
php artisan key:generate   

### ●フロントエンドパッケージインストール
<br>
npm install

### ●フロントエンドビルド
<br>
npm run dev

### ●サーバー起動
<br>
php artisan serve
