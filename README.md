# このリポジトリについて
このリポジトリには僕のサイト（[https://ryo.dev/](https://ryo.dev/)）のソースコードを保存しています。

## 仕組み
静的サイトジェネレーターの[11ty](https://www.11ty.dev/)を使っています。

テンプレートエンジンは[Nunjucks](https://mozilla.github.io/nunjucks/)です。

ホスティングサービスには[firebase hosting](https://firebase.google.com/docs/hosting?hl=ja)を使っています。

## ディレクトリ構成
    public
      ├ article
      ├ img
      ├ service
      └ work
    src
      ├ body
        ├ article
        ├ service
        └ work
      ├ data
      └ parts
        ├ article
        ├ footer
        ├ head
        ├ header
        ├ layouts
        └ resetCSS

| ディレクトリ | 説明 |
----|----
| public | 公開用のHTMLファイルはここに書き込まれる。11tyの`_site`に相当。 |
| public/article | 記事を保存 |
| public/service | 自作のWebサービスを保存 |
| public/work | 役務関係のページを保存 |
| src | テンプレートやレイアウトを保存 |
| src/body | 主に、`main`要素の中身を保存。11tyの`.`に相当。 |
| src/data | [グローバルデータ](https://www.11ty.dev/docs/data-global/)を保存。11tyの`_data`に相当。 |
| src/parts | 共通部を保存。11tyの`_includes`に相当。 |
