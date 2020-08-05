<?php
  require_once('../../../../BNHG7nx88aBa/article.php');

  $url = "https://ryo.dev/article/coding/why-isnt-it-centered-even-if-m0auto-is-specified-in-inlineBlock/";
  $article = new Article();
  $dbInfo = $article->getInfoFromDM($url);

  $originalParts = [
    "desc" => $dbInfo['description'],
    "title" => $dbInfo['title'],
    "originalCSS" => "/article/coding/why-isnt-it-centered-even-if-m0auto-is-specified-in-inlineBlock/style_min.css",
    "datePublished" => '2020-03-12',
    "dateModified" => '2020-03-12',
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
          <li><a href="#specification" class="tableOfContents-link">仕様書によると</a></li>
          <li><a href="#devTool" class="tableOfContents-link">デベロッパーツールで確認</a></li>
          <li><a href="#finally" class="tableOfContents-link">最後に</a></li>
        </ol>
      </div>

      <section id="specification">
        <h2>仕様書によると</h2>
        <div class="p1">
          <div class="parent p2"><div class="children"></div></div>
          <p class="p2">上の図形は2つの<code class="inlineCode">div</code>要素で構成されています。枠線の図形は<code class="inlineCode">div.parent</code>、青背景の図形は<code class="inlineCode">div.children</code>、<code class="inlineCode">div.parent</code>は<code class="inlineCode">div.children</code>の親要素になっています。</p>
        </div>
        <div class="p1">
          <p class="p2">各<code class="inlineCode">div</code>要素には次のCSSを指定しています。</p>
          <pre class="p2"><code class="blockCode_c"><span class="code-line"><span class="code-green">.parent</span> {<span class="code-blue">border</span>: <span class="code-purple">1</span><span class="code-pink">px</span> <span class="code-blue">solid</span> <span class="code-purple">#787878</span>;}</span>
<span class="code-line"><span class="code-green">.children</span> {</span>
<span class="code-line">  <span class="code-blue">background</span>: <span class="code-purple">#1E88E5</span>;</span>
<span class="code-line">  <span class="code-blue">height</span>: <span class="code-purple">100</span><span class="code-pink">px</span>;</span>
<span class="code-line">  <span class="code-blue">margin</span>: <span class="code-purple">25</span><span class="code-pink">px</span> <span class="code-blue">auto</span>;</span>
<span class="code-line">  <span class="code-blue">width</span>: <span class="code-purple">100</span><span class="code-pink">px</span>;</span>
<span class="code-line">}</span></code></pre>
        </div>
        <div class="p1">
          <p class="p2"><code class="inlineCode">div</code>要素の<code class="inlineCode">display</code>プロパティの初期値は<code class="inlineCode">block</code>です。ここで、<code class="inlineCode">div.children</code>に<code class="inlineCode">display: inline-block;</code>を指定するとこうなります。</p>
          <div class="parent p2"><div class="children" style="display:inline-block;"></div></div>
        </div>
        <p class="p1">なぜでしょう？</p>
        <p class="p1">...仕様書を見てみましょう。</p>
        <div class="p1">
          <p class="p2">まずは、<a href="https://www.w3.org/TR/CSS/">Snapshot</a>と呼ばれるページを見てみます。SnapshotについてW3Cでは次のように説明しています</p>
          <blockquote cite="https://www.w3.org/Style/2011/CSS-process" class="p2">
            <p>For software makers, there is an easy way to know what parts of CSS should be implemented and what parts not yet. Since 2007, the working group publishes so called snapshots, which explain exactly that.</p>
            <p class="quoteSource"><cite><a href="https://www.w3.org/Style/2011/CSS-process">Levels, snapshots, modules…</a></cite></p>
          </blockquote>
        </div>
        <p class="p1">今（<time datetime="2020-03-12">2020.03.12</time>）のところのSnapshotの最新版はSnapshot 2018ですが、これはつまり、2018年時点でのCSSの状態を形成するすべての仕様をまとめているということです。なお、Snapshotの最新版は常に「<a href="https://www.w3.org/TR/CSS/">https://www.w3.org/TR/CSS/</a>」というURLで確認できます（<a href="https://www.w3.org/Style/2011/CSS-process">ソース</a>）。</p>
        <p class="p1">さて、次に<a href="https://www.w3.org/TR/CSS/#properties">SnapshotのProperty Index</a>を見ます。CSSプロパティがたくさん並んでいます。その中の「margin」をクリックします。すると、<a href="https://drafts.csswg.org/css2/box.html#propdef-margin">8.3 Margin properties</a>の中の項目に飛びます。少し上にスクロールすると、<q cite="https://drafts.csswg.org/css2/box.html#margin-properties">The properties defined in this section refer to the &lt;margin-width&gt; value type, which may take one of the following values:</q>という文言に続いて3つの値が紹介されています。今回知りたいのは<code class="inlineCode">auto</code>の挙動なので、「auto」の項目を見ます。<q cite="https://drafts.csswg.org/css2/box.html#margin-properties">See the section on <a href="https://drafts.csswg.org/css2/visudet.html#Computing_widths_and_margins">calculating widths and margins</a> for behavior.</q>と書いてあるので、指示に従ってそちらのページに移動します。</p>
        <p class="p1"><a href="https://drafts.csswg.org/css2/visudet.html#Computing_widths_and_margins">10.3 Calculating widths and margins</a>という項目に飛びました。今回は、<code class="inlineCode">display: inline-block;</code>を指定した要素の<code class="inlineCode">margin</code>の値に<code class="inlineCode">auto</code>を指定したときの挙動について知りたいです。また、<a href="https://html.spec.whatwg.org/multipage/rendering.html#replaced-elements"><code class="inlineCode">div</code>要素は置換要素（replaced elements）ではありません</a>。ということで、<a href="https://drafts.csswg.org/css2/visudet.html#inlineblock-width">10.3.9 'Inline-block', non-replaced elements in normal flow</a>の項目を見ます。</p>
        <div class="p1">
          <p class="p2">その中には次のように書いてあります。</p>
          <blockquote cite="https://drafts.csswg.org/css2/visudet.html#inlineblock-width" class="p2">
            <p>A computed value of 'auto' for <a href="https://drafts.csswg.org/css2/box.html#propdef-margin-left">'margin-left'</a> or <a href="box.html#propdef-margin-right">'margin-right'</a> becomes a used value of '0'.</p>
            <p class="quoteSource"><cite><a href="https://drafts.csswg.org/css2/visudet.html#inlineblock-width">Visual formatting model details</a></cite></p>
          </blockquote>
        </div>
        <p class="p1">ふぅ...。やっと核心に到着しました。</p>
        <p class="p1">つまり、<code class="inlineCode">display: inline-block;</code>を指定した要素の<code class="inlineCode">margin-left</code>もしくは<code class="inlineCode">margin-right</code>の値に<code class="inlineCode">auto</code>を指定すると、値は<code class="inlineCode">0</code>と解釈されるということです。</p>
      </section>

      <section id="devTool">
        <h2>デベロッパーツールで確認</h2>
        <p class="p1">ChromeのデベロッパーツールのElementsパネルのComputedタブを使います（<a href="https://developers.google.com/web/tools/chrome-devtools/css/reference#computed">詳しい使い方はこちら</a>）。まずは、<code class="inlineCode">display: inline-block;</code>を指定する前の<code class="inlineCode">div.children</code>の<code class="inlineCode">margin</code>の値を確認してみましょう。</p>
        <div class="p1">
          <div class="parent p2"><div class="children"></div></div>
          <figure class="p2">
            <picture>
              <source srcset="img/db.webp" type="image/webp">
              <source srcset="img/db.jpg" type="image/jpg">
              <img src="img/db.jpg" alt="displayプロパティの値がblockで、marginプロパティに25pxとautoの2つの値を指定したdiv要素のmarginの計算値" class="fullWidthImg p2">
            </picture>
            <figcaption class="p2"><code class="inlineCode">margin-top</code>と<code class="inlineCode">margin-bottom</code>の値は指定した通りに<code class="inlineCode">25px</code>になっています。<code class="inlineCode">margin-right</code>と<code class="inlineCode">margin-left</code>の値はもろもろの計算をした結果<code class="inlineCode">260.038px</code>という値が指定されたみたいです。ここの値は画面幅（正確には親要素の幅）が変わると値が変わります。</figcaption>
          </figure>
        </div>
        <p class="p1">次に、<code class="inlineCode">display: inline-block;</code>を指定した状態を見てみます。</p>
        <div class="p1">
          <div class="parent p2"><div class="children" style="display:inline-block;"></div></div>
          <figure class="p2">
            <picture>
              <source srcset="img/dib.webp" type="image/webp">
              <source srcset="img/dib.jpg" type="image/jpg">
              <img src="img/dib.jpg" alt="displayプロパティの値がinline-blockで、marginプロパティに25pxとautoの2つの値を指定したdiv要素のmarginの計算値" class="fullWidthImg p2">
            </picture>
            <figcaption class="p2"><code class="inlineCode">margin-top</code>と<code class="inlineCode">margin-bottom</code>の値は先ほどと同じく、指定した通りに<code class="inlineCode">25px</code>になっています。しかし、<code class="inlineCode">margin-right</code>と<code class="inlineCode">margin-left</code>の値は<code class="inlineCode">0px</code>になっています。</figcaption>
          </figure>
        </div>
        <p class="p1">仕様書通りですね。<code class="inlineCode">display: inline-block;</code>を指定した要素の<code class="inlineCode">margin-left</code>もしくは<code class="inlineCode">margin-right</code>の値に<code class="inlineCode">auto</code>を指定すると、値は<code class="inlineCode">0</code>と解釈されます。</p>
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
