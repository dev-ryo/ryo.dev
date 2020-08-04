<?php
  require_once($_SERVER['DOCUMENT_ROOT'].'/../BNHG7nx88aBa/article6.php');

  $page = new Page();
  $me = $page->me;

  $url = "https://ryo.dev/article/myWebServices/testPagesTogether/";
  $title = "【概要】Caitoc";
  $desc = "サービス最終更新日：2020.07.08　テストしたいページのURLをコピペしてテストボタンを押すだけで、各種WebページテストツールでそのURLをテストしたときの結果ページへのリンクを生成します。";
  $page->twCard = 'summary_large_image';
  $page->twImg = 'https://ryo.dev/article/myWebServices/testPagesTogether/img/tw.jpg';
  $originalCSS = "/article/myWebServices/testPagesTogether/style_min.css";
  $datePublished = '2020-03-13';
  $dateModified = '2020-07-08';
  $schemaArticleImg = '"https://ryo.dev/article/myWebServices/testPagesTogether/img/schema1-1.jpg", "https://ryo.dev/article/myWebServices/testPagesTogether/img/schema4-3.jpg", "https://ryo.dev/article/myWebServices/testPagesTogether/img/schema16-9.jpg"';
  $breadcrumbList = [
    ["name" => "HOME", "item" => $me['hp']],
    ["name" => "記事", "item" => $me['articleCategory']['all']['link']],
    ["name" => $me['articleCategory']['myWebServices']['name'], "item" => $me['articleCategory']['myWebServices']['link']]
  ];
?> <!DOCTYPE html><html lang="ja"> <?php include($page->root.$page->html["head"]); ?> <body> <?php include($page->root.$page->html["header"]); ?> <main><div class="h1_c"><ul aria-label="パンくずリスト" class="breadcrumbs_c"> <?php forEach($breadcrumbList as $ePage): ?> <li class="breadcrumbs-list"><a href="<?= $ePage["item"]; ?>" class="breadcrumbs-list-link"><?= $ePage["name"]; ?></a></li> <?php endforeach; ?> </ul><p class="lastUpdated">最終更新日：<time datetime="<?= $dateModified; ?>"><?= str_replace('-', '.', $dateModified); ?></time></p><h1><?=$title; ?></h1><ol class="tableOfContents" aria-label="目次"><li class="toc-li"><a href="#thought" class="toc-a">思い</a></li><li class="toc-li"><a href="#about" class="toc-a">どんなサービスか？</a></li><li class="toc-li"><a href="#wts" class="toc-a">Caitocで使用するテストツール</a></li><li class="toc-li"><a href="#origin" class="toc-a">Caitoc、名前の由来</a></li><li class="toc-li"><a href="#note" class="toc-a">注意</a></li><li class="toc-li"><a href="#finally" class="toc-a">最後に</a></li></ol></div><section id="thought"><h2>思い</h2><p class="p1">Webページをテストするためのツール（以下「テストツール」）がネット上にはいくつもあります。例えば、読み込み速度を評価するものやコードの文法ミスを指摘してくれるものなどがあります。</p><p class="p1">以前の僕はWebページを作るたびに、いくつかのテストツールを使ってテストをしていました。それらのテストツールはすべてブックマークしていました。テストするときはブックマークからサービスのページを開き、作成したWebページのURLをコピペして、テスト開始ボタンを押してテストをしました。この作業を各テストツールごとに行います。</p><p class="p1">...<strong>だるい</strong>。ちまちまちまちま単調な作業を繰り返し行うのは苦痛です。</p><p class="p1">ということでこれらの作業を自動化したのが<strong>Caitoc</strong>（ケイトック）です。</p></section><section id="about"><h2>どんなサービスか？</h2><figure class="p1"><p class="p2">まずは、テストしたいページのURLを入力し、「テストする」ボタンを押します。</p><p class="p2"><picture><source srcset="img/tw.webp" type="image/webp"><source srcset="img/tw.jpg" type="image/jpg"><img src="img/tw.jpg" alt="テストしたいURLを入力" width="1200" height="630" class="fullWidthImg"></picture></p></figure><figure class="p1"><p class="p2">すると、下のような画面になります。縦に並んでいるのはテストツールの結果ページに飛ぶためのリンクです。例えば、一番上の「HTMLの有効性」を押すと、「The W3C Markup Validation Service」でそのURLをテストしたときの結果ページに飛びます。</p><p class="p2"><picture><source srcset="img/result.webp" type="image/webp"><source srcset="img/result.jpg" type="image/jpg"><img src="img/result.jpg" alt="テストしたいURLを入力して「テストをする」ボタンを押した後に表示される結果画面" width="1200" height="630" class="fullWidthImg"></picture></p></figure><p class="p1">これまでの手間のかかる作業を大幅に減らすことができ、このサービス上から各種テストツールのテスト結果ページに移動できるようになりました。僕が欲しくて自作したものですが、正直めちゃくちゃありがたいサービスです。</p><p class="p1"><a href="https://ryo.dev/service/testPagesTogether/" class="toService">使ってみる</a></p></section><section id="wts"><h2>Caitocで使用するテストツール</h2><ul class="p1"><li>HTMLの有効性：<a href="https://validator.w3.org/">The W3C Markup Validation Service</a></li><li>CSSの有効性：<a href="https://jigsaw.w3.org/css-validator/">W3C CSS 検証サービス</a></li><li>読み込み速度：<a href="https://developers.google.com/speed/pagespeed/insights/">PageSpeed Insights</a></li><li>モバイルフレンドリーの有効性：<a href="https://search.google.com/test/mobile-friendly">モバイル フレンドリー テスト</a></li><li>構造化データの有効性：<a href="https://search.google.com/test/rich-results">リッチリザルト テスト</a></li><li>Twitterカードの有効性：<a href="https://cards-dev.twitter.com/validator">Card Validator</a></li><li>AMPの有効性：<a href="https://search.google.com/test/amp">AMP テスト</a></li><li>全体的なパフォーマンス：<a href="https://web.dev/measure/">Measure</a></li></ul></section><section id="origin"><h2>Caitoc、名前の由来</h2><p class="p1">アルファベットをランダムに並べてたまたま出てきた文字列です。</p><p class="p1">「Caitoc」を「ケイトック」と読むのは、Google翻訳では「Caitoc」を「ケイトック」と読み上げたからです。その読みが英語的に正しいかどうかは知りません。</p><p class="p1">重要なのは、そのサービスでどんな課題を解決できるのか、ということです。だから名前はどうでもいいです。どうでもいいことに時間と労力を費やすのは合理的ではないので、名前は適当につけました。</p></section><section id="note"><h2>注意</h2><p class="p1">「Twitterカードの有効性」と「全体的なパフォーマンス」は自分でURLをコピペしないといけません。</p></section><section id="finally"><h2>最後に</h2><p>もしサービスをよりよくする案を思いついたり、不具合を見つけたり、お聞きしたいことがあったりした場合は、<a href="<?=$me["contact"]["tw2"]; ?>">TwitterのDM</a>か<a href="<?=$me["contact"]["mail"]; ?>">メール</a>にご連絡ください。</p></section></main> <?php include($page->root.$page->html["footer"]); ?> </body></html>