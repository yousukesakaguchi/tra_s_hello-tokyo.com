# antellijance.co.jp

## 開発環境について
---
フロントはgulp、サーバーはLocal
- gulpでコンパイルとLocalの仮想サーバーへプロキシ接続
- Localは仮想サーバーとデータベース


### ローカルサーバー
-
#### Local https://localwp.com/
WordPress専用のローカルサーバーアプリです。
- WordPressを自動インストール
- 複数サイト管理可能
- サイトごとにPHPのバージョンやデータベースの種類を選択可能

### フロント構築
-
#### gulp
- pug コンパイル
- scss コンパイル
- javascript ミニファイ
- assets/内のデータをコピー
- 仮想サーバー起動
- オートリロード

## 開発環境セットアップ
---
1. gitクローン
### Localのセットアップ
参考：https://chot.design/wordpress-basic/6db3843ce304/
2. Localをインストール
3. Localで新規サイト追加

  下記の順で入力・選択してください。

  【What's your site name?】
  
  antellijance.co.jp

  【Choose your environment】
  
    Custom
  
    ・PHP Version
    
    7.#.#

    ・Web Server

    Apache #.#.#

    ・Database
    
    MySQL 8.#.#

  【Setup WordPress】

  ・WordPress Username

  admin

  ・WordPress Password

  Av&Ut~WsqNGq

  ・WordPress Email

  dev-email@flywheel.local（そのまま）

### WordPressのセットアップ
4. 作成したWordPressの管理画面へログイン
5. 「Settings」→「Site Language」→日本語に変更
6. プラグイン「All-in-One WP Migration」をインストール〜有効化
7. メニューに追加された All-in-One WP Migration からインポート
8. gitデータ「_datas/wordpress/antellijancecojp.local-20210303-070059-00n3pn.wpress」をインポート

### gulpのセットアップ
9. /Users/{ユーザー名}/antellijance.co.jp/gulp/ でnpm install
10. gulp（コンパイルとbrowsersyncが起動します）

### gulpとLocalの連携
11. /Users/{ユーザー名}/antellijance.co.jp/gulp/ に 「WPtheme/」フォルダが追加されます。
    これがWordPressのテーマデータになります。
    Localにこれを読み込ませるため、「WPtheme/」フォルダのシンボリックリンクを作成
12. ↑で作成したシンボリックリンクを「/Users/{ユーザー名}/Local Sites/antellijancecojp/app/public/wp-content/themes/」に移動
13. themes/にあるantellijance/フォルダを削除
14. シンボリックリンクを「antellijance」にリネーム

これで環境は完成です。
localhost:5000 がbrowsersyncサーバー、
antellijancecojp.local がLocalサーバー のURLです。
browsersyncの方がオートリロード対応で、基本的にこちらしか使わないと思います。
WordPressの管理画面を触るときにはLocalサーバーの方を使用します。




## 作業開始時
---
1. Localを起動
2. antellijance.co.jp を起動（START SITE）
3. gulp