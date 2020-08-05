<?php
  require_once('../../../../BNHG7nx88aBa/article.php');

  $url = "https://ryo.dev/article/coding/why-specify-contentProperty-for-PE/";
  $article = new Article();
  $dbInfo = $article->getInfoFromDM($url);

  $originalParts = [
    "desc" => $dbInfo['description'],
    "title" => $dbInfo['title'],
    "datePublished" => '2020-01-26',
    "dateModified" => '2020-04-21',
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
          <li><a href="#why" class="tableOfContents-link">なぜ？</a></li>
          <li><a href="#codeCheck" class="tableOfContents-link">コードをチェック</a></li>
          <li><a href="#finally" class="tableOfContents-link">最後に</a></li>
        </ol>
      </div>

      <section id="why">
        <h2>なぜ？</h2>
        <p class="p1" id="l1"><code class="inlineCode">content</code>プロパティの初期値は<code class="inlineCode">normal</code>です（<a href="https://drafts.csswg.org/css-content-3/#content-property" aria-labelledby="l1">ソース</a>）。</p>
        <p class="p1" id="l2"><code class="inlineCode">::before</code>と<code class="inlineCode">::after</code>に<code class="inlineCode">content: normal;</code>が指定されていると、<code class="inlineCode">content: none;</code>を指定したのと同じ状態になります（<a href="https://drafts.csswg.org/css-content-3/#valdef-content-normal" aria-labelledby="l2">ソース</a>）。</p>
        <p class="p1" id="l3"><code class="inlineCode">::before</code>と<code class="inlineCode">::after</code>に<code class="inlineCode">content: none;</code>が指定されていると、<code class="inlineCode">display: none;</code>を指定されたかのように要素が表示されなくなります（<a href="https://drafts.csswg.org/css-content-3/#valdef-content-none" aria-labelledby="l3">ソース</a>）。</p>
        <p class="p1" id="l4"><code class="inlineCode">::before</code>と<code class="inlineCode">::after</code>の<code class="inlineCode">content</code>プロパティの値が<code class="inlineCode">none</code>ではないとき、擬似要素はさも、擬似要素を指定している元の要素の直接の子要素であるかのようにふるまい、他の要素と同様にCSSでスタイリングできます（<a href="https://drafts.csswg.org/css-pseudo-4/#generated-content" aria-labelledby="l4">ソース</a>）。</p>
      </section>

      <section id="codeCheck">
        <h2>コードをチェック</h2>
        <div class="p1">
          <p class="p2"><code class="inlineCode">content: "";</code>の場合...</p>
          <img src="img/blank.jpg" alt="contentプロパティに空欄を指定してレンダリングした" class="fullWidthImg p2">
          <p class="p2"><strong>擬似要素あり！</strong></p>
        </div>
        <div class="p1">
          <p class="p2"><code class="inlineCode">content: none;</code>の場合...</p>
          <img src="img/none.jpg" alt="contentプロパティにnoneを指定してレンダリングした" class="fullWidthImg p2">
          <p class="p2"><strong>擬似要素なし！</strong></p>
        </div>
        <div class="p1">
          <p class="p2"><code class="inlineCode">content: normal;</code>の場合...</p>
          <img src="img/normal.jpg" alt="contentプロパティにnormalを指定してレンダリングした" class="fullWidthImg p2">
          <p class="p2"><strong>擬似要素なし！</strong></p>
        </div>
      </section>

      <section id="finally">
        <h2>最後に</h2>
        <p>もし誤った情報を見つけたり、お聞きしたいことがあったりした場合は、<a href="https://twitter.com/ryoo20190328">TwitterのDM</a>か<a href="mailto:roxen@ryo.dev">メール</a>にご連絡ください。</p>
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
