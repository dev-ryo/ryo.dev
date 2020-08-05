<?php
  require_once('../../../../BNHG7nx88aBa/article.php');

  $url = "https://ryo.dev/article/coding/determine_breakpoints_based_on_content_content/";
  $article = new Article();
  $dbInfo = $article->getInfoFromDM($url);

  $originalParts = [
    "desc" => $dbInfo['description'],
    "title" => $dbInfo['title'],
    "originalCSS" => "",
    "datePublished" => '2020-02-06',
    "dateModified" => '2020-04-26',
    "breadcrumbList" => [
      ["name" => "HOME", "item" => "https://ryo.dev/"],
      ["name" => "記事", "item" => "https://ryo.dev/article/?category=all&p=1"],
      ["name" => $dbInfo['category_name'], "item" => "https://ryo.dev/article/?category=".$dbInfo['category_slug']."&p=1"]
    ]
  ];
  $parts = $article->getArticleInfo($originalParts);
?>

<!DOCTYPE html>
<html lang="ja">
<?php include($_SERVER['DOCUMENT_ROOT'] . $parts["html"]["head"]); ?>
<body>
  <?php include($_SERVER['DOCUMENT_ROOT'] . $parts["html"]["header"]); ?>

    <main>
      <div class="h1_c">
        <ul aria-label="パンくずリスト" class="breadcrumbs_c">
          <?php forEach($parts["breadcrumbList"] as $page): ?>
            <li class="breadcrumbs-list">
              <a href="<?= $page["item"]; ?>" class="breadcrumbs-list-link"><?= $page["name"]; ?></a>
            </li>
          <?php endforeach; ?>
        </ul>
        <p class="lastUpdated">最終更新日：<time datetime="<?= $parts["dateModified"]; ?>"><?= str_replace('-', '.', $parts["dateModified"]); ?></time></p>
        <h1><?= $parts["title"] ?></h1>

        <ol class="tableOfContents" aria-label="目次">
          <li><a href="#how-to-determine" class="tableOfContents-link">ブレークポイントの決め方</a></li>
          <li><a href="#finally" class="tableOfContents-link">最後に</a></li>
        </ol>
      </div>

      <section id="how-to-determine">
        <h2>ブレークポイントの決め方</h2>
        <p class="p1">「スマホやPCの主流の画面幅は〇〇pxだから、ブレークポイントはこの値にしよう！」と解説しているサイトを散見しますが、Googleはそれを推奨していません。</p>
        <p class="p1">なぜなら、<a href="https://developers.google.com/web/fundamentals/design-and-ux/responsive/?hl=ja#%E3%83%96%E3%83%AC%E3%83%BC%E3%82%AF%E3%83%9D%E3%82%A4%E3%83%B3%E3%83%88%E3%81%AE%E6%B1%BA%E3%82%81%E6%96%B9"><q cite="https://developers.google.com/web/fundamentals/design-and-ux/responsive/?hl=ja#%E3%83%96%E3%83%AC%E3%83%BC%E3%82%AF%E3%83%9D%E3%82%A4%E3%83%B3%E3%83%88%E3%81%AE%E6%B1%BA%E3%82%81%E6%96%B9">メンテナンスが非常に大変になる可能性があ</q></a>るからだとGoogleは説明しています。例えば、「横幅768pxのタブレットのシェア率が最多だから」という理由で、ブレークポイントを768pxとしてコーディングしたとします。では、今後販売されるタブレットの主流の横幅は変わらずに768pxである保証はあるのでしょうか？　もし横幅840pxタブレットが主流になったらどうなるでしょう。またコーディングし直しますか？　<q cite="https://developers.google.com/web/fundamentals/design-and-ux/responsive/?hl=ja#%E3%83%96%E3%83%AC%E3%83%BC%E3%82%AF%E3%83%9D%E3%82%A4%E3%83%B3%E3%83%88%E3%81%AE%E6%B1%BA%E3%82%81%E6%96%B9">メンテナンスが非常に大変になる</q>とはこのことを言っているのでしょう。</p>
        <div class="p1">
          <p class="p2">ではブレークポイントをどのように決めるかというと、その点もGoogleが説明してくれています。ざっと説明します。</p>
          <ol class="p2 list_ml">
            <li class="listE">
              <p class="p2">狭い横幅のままレイアウト崩れが起きないようにコーディングします。ちなみに僕は<a href="https://developers.google.com/web/tools/chrome-devtools/device-mode?hl=ja#device">デベロッパーツールのDevice Mode</a>で「iPhone 5/SE（横幅320px）」を選択してコーディングしています。</p>
              <p class="p2">
                <picture>
                  <source srcset="img/iphone5SE-1650.webp" type="image/webp">
                  <source srcset="img/iphone5SE-1650.jpg" type="image/jpg">
                  <img src="img/iphone5SE-1650.jpg" alt="デベロッパーツールのDevice Modeで「iPhone 5/SE（横幅320px）」を選択したときのスクショ" class="fullWidthImg">
                </picture>
              </p>
            </li>
            <li class="listE">画面幅を少しずつ広げながら、デザインがおかしくないかを確認します。「デザインがおかしくないか」というのは例えば、文字サイズが小さくないか、余白が広くないか、画像が大きくないかなどです。</li>
            <li class="listE">もしデザインがおかしい箇所があったら、その時点での画面幅をブレークポイントとし、デザインを調整します。</li>
          </ol>
        </div>
        <p class="p1">まぁ、詳しくは<a href="https://developers.google.com/web/fundamentals/design-and-ux/responsive/?hl=ja#%E3%83%96%E3%83%AC%E3%83%BC%E3%82%AF%E3%83%9D%E3%82%A4%E3%83%B3%E3%83%88%E3%81%AE%E6%B1%BA%E3%82%81%E6%96%B9">「レスポンシブ ウェブデザインの基本  |  Web  |  Google Developers」の「ブレークポイントの決め方」</a>の章を見てください。画像付きで分かりやすく解説しています。Googleさんがご丁寧に解説しているので僕が改めて詳しく解説する必要もありませんからね。</p>
        <p class="p1">ちなみに、WCAG2.1の<a href="https://www.w3.org/TR/2018/REC-WCAG21-20180605/#reflow">Success Criterion 1.4.10 Reflow</a>（レベルAA、<a href="https://waic.jp/docs/WCAG21/#reflow">日本語訳はこちら</a>）では、幅320pxで情報や機能が損なわず、かつ、スクロールせずにコンテンツを表示できることを求めています。なので、アクセシビリティを考慮するのであれば、320px幅からコーディングを始めるといいかもしれません。</p>
      </section>

      <section id="finally">
        <h2>最後に</h2>
        <p>もし誤った情報を見つけたり、より良いコードを知っていたり、お聞きしたいことがあったりした場合は、<a href="https://twitter.com/ryoo20190328">TwitterのDM</a>か<a href="mailto:roxen@ryo.dev">メール</a>にご連絡ください。</p>
      </section>
    </main>

    <?php include($_SERVER['DOCUMENT_ROOT'] . $parts["html"]["footer"]); ?>

    <?php if($parts["js"] !== ""): ?>
      <script>
        <?php foreach($parts["js"] as $path) {include($_SERVER['DOCUMENT_ROOT'] . $path);} ?>
      </script>
    <?php endif; ?>
</body>
</html>
