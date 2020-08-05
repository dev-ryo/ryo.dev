<?php
  require_once('../../../../BNHG7nx88aBa/article.php');

  $url = "https://ryo.dev/article/coding/change-the-behavior-according-to-the-hover-direction-without-using-JS/";
  $article = new Article();
  $dbInfo = $article->getInfoFromDM($url);

  $originalParts = [
    "desc" => $dbInfo['description'],
    "title" => $dbInfo['title'],
    "originalCSS" => "/article/coding/change-the-behavior-according-to-the-hover-direction-without-using-JS/style_min.css",
    "datePublished" => '2020-03-24',
    "dateModified" => '2020-03-24',
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
        <li><a href="#overview" class="tableOfContents-link">概要</a></li>
        <li><a href="#code" class="tableOfContents-link">コード</a></li>
        <li><a href="#howItWorks" class="tableOfContents-link">仕組み</a></li>
        <li><a href="#demand" class="tableOfContents-link">需要</a></li>
        <li><a href="#contactMe" class="tableOfContents-link">最後に</a></li>
      </ol>
    </div>

    <section id="overview">
      <h2>概要</h2>
      <p class="p1">上からホバーしたときと下からホバーしたときで動作を変えるのはJavaScriptを使わないとできないもんだと勝手に思い込んでいましたが、それをJSを使わずにHTMLとCSSのみで実現できる方法をふと思いつきました。下にサンプルを置きます。</p>
      <div class="hoverJudge p1">
        <div class="upperHalf"></div>
        <div class="lowerHalf"></div>
        <p class="hoverJudge-txt"></p>
      </div>
    </section>

    <section id="code">
      <h2>コード</h2>
      <pre class="p2"><code class="blockCode_c"><span class="code-line">&lt;<span class="code-pink">div</span> <span class="code-green">class</span>=<span class="code-yellow">"hoverJudge"</span>&gt;</span>
<span class="code-line">  &lt;<span class="code-pink">div</span> <span class="code-green">class</span>=<span class="code-yellow">"upperHalf"</span>&gt;&lt;/<span class="code-pink">div</span>&gt;</span>
<span class="code-line">  &lt;<span class="code-pink">div</span> <span class="code-green">class</span>=<span class="code-yellow">"lowerHalf"</span>&gt;&lt;/<span class="code-pink">div</span>&gt;</span>
<span class="code-line">  &lt;<span class="code-pink">p</span> <span class="code-green">class</span>=<span class="code-yellow">"hoverJudge-txt"</span>&gt;&lt;/<span class="code-pink">p</span>&gt;</span>
<span class="code-line">&lt;/<span class="code-pink">div</span>&gt;</span></code></pre>

      <pre class="p2"><code class="blockCode_c"><span class="code-line"><span class="code-green">.hoverJudge</span> {</span>
<span class="code-line">  <span class="code-blue">background</span>: <span class="code-purple">#eee</span>;</span>
<span class="code-line">  <span class="code-blue">font-size</span>: <span class="code-blue">calc</span>(<span class="code-purple">1</span><span class="code-pink">rem +</span> <span class="code-purple">2</span><span class="code-pink">px</span>);</span>
<span class="code-line">  <span class="code-blue">font-weight</span>: <span class="code-blue">bold</span>;</span>
<span class="code-line">  <span class="code-blue">line-height</span>: <span class="code-purple">100</span><span class="code-pink">px</span>;</span>
<span class="code-line">  <span class="code-blue">position</span>: <span class="code-blue">relative</span>;</span>
<span class="code-line">  <span class="code-blue">text-align</span>: <span class="code-blue">center</span>;</span>
<span class="code-line">}</span>
<span class="code-line"><span class="code-green">.upperHalf</span>,</span>
<span class="code-line"><span class="code-green">.lowerHalf</span> {</span>
<span class="code-line">  <span class="code-blue">width</span>: <span class="code-purple">100</span><span class="code-pink">%</span>;</span>
<span class="code-line">  <span class="code-blue">height</span>: <span class="code-purple">50</span><span class="code-pink">%</span>;</span>
<span class="code-line">  <span class="code-blue">position</span>: <span class="code-blue">absolute</span>;</span>
<span class="code-line">  <span class="code-blue">z-index</span>: <span class="code-purple">1</span>;</span>
<span class="code-line">}</span>
<span class="code-line"><span class="code-green">.upperHalf</span> {<span class="code-blue">top</span>: <span class="code-purple">0</span>;}</span>
<span class="code-line"><span class="code-green">.lowerHalf</span> {<span class="code-blue">bottom</span>: <span class="code-purple">0</span>;}</span>
<span class="code-line"><span class="code-green">.hoverJudge-txt::after</span> {</span>
<span class="code-line">  <span class="code-blue">content</span>: <span class="code-yellow">"どっちからホバーしたかな？"</span>;</span>
<span class="code-line">  <span class="code-blue">display</span>: <span class="code-blue">block</span>;</span>
<span class="code-line">  <span class="code-blue">width</span>: <span class="code-purple">100</span><span class="code-pink">%</span>;</span>
<span class="code-line">  <span class="code-blue">height</span>: <span class="code-purple">100</span><span class="code-pink">px</span>;</span>
<span class="code-line">}</span>
<span class="code-line"><span class="code-green">.upperHalf:hover,</span></span>
<span class="code-line"><span class="code-green">.lowerHalf:hover</span>{</span>
<span class="code-line">  <span class="code-blue">height</span>: <span class="code-purple">100</span><span class="code-pink">%</span>;</span>
<span class="code-line">  <span class="code-blue">z-index</span>: <span class="code-purple">2</span>;</span>
<span class="code-line">}</span>
<span class="code-line"><span class="code-green">.upperHalf:hover</span> <span class="code-pink">~</span> <span class="code-green">.hoverJudge-txt::after</span> {</span>
<span class="code-line">  <span class="code-blue">content</span>: <span class="code-yellow">"上から！"</span>;</span>
<span class="code-line">  <span class="code-blue">background</span>: <span class="code-purple">#e25a5a</span>;</span>
<span class="code-line">}</span>
<span class="code-line"><span class="code-green">.lowerHalf:hover</span> <span class="code-pink">~</span> <span class="code-green">.hoverJudge-txt::after</span> {</span>
<span class="code-line">  <span class="code-blue">content</span>: <span class="code-yellow">"下から！"</span>;</span>
<span class="code-line">  <span class="code-blue">background</span>: <span class="code-purple">#03a9f4</span>;</span>
<span class="code-line">}</span></code></pre>
    </section>

    <section id="howItWorks">
      <h2>仕組み</h2>
      <p class="p1">特徴は大きく分けて3つあります。</p>

      <section class="p1">
        <h3>特徴1</h3>
        <div class="p1">
          <p class="p2"><code class="inlineCode">.hoverJudge-txt::after</code>がグレーの部分全体です。<code class="inlineCode">.upperHalf</code>（赤枠）をその上半分に、<code class="inlineCode">.lowerHalf</code>（青枠）をその下半分に被せています。</p>
          <div class="hoverJudge p2 howItWorks-exp">どっちからホバーしたかな？</div>
        </div>
        <p class="p1">グレーの部分にマウスを持ってくるとき、上からホバーしたときは最初に<code class="inlineCode">.upperHalf</code>の部分を通ることになります。また、下からホバーしたときは最初に<code class="inlineCode">.lowerHalf</code>の部分を通ることになります。したがって、<code class="inlineCode">.upperHalf:hover</code>と<code class="inlineCode">.lowerHalf:hover</code>をセレクタにすることで、上からホバーしたときと下からホバーしたときで条件分岐できます。</p>
      </section>

      <section>
        <h3>特徴2</h3>
        <div class="p1">
          <p class="p2">デフォルトでは、<code class="inlineCode">.upperHalf</code>と<code class="inlineCode">.lowerHalf</code>の<code class="inlineCode">height</code>はいずれも<code class="inlineCode">.hoverJudge-txt::after</code>の<code class="inlineCode">height</code>の半分にしています。しかし、ホバーしたときは、ホバーした要素の<code class="inlineCode">height</code>が<code class="inlineCode">.hoverJudge-txt::after</code>の<code class="inlineCode">height</code>と同じになるようにしています。</p>
          <pre class="p2"><code class="blockCode_c"><span class="code-line"><span class="code-green">.upperHalf</span>,</span>
<span class="code-line"><span class="code-green">.lowerHalf</span> {<span class="code-blue">height</span>: <span class="code-purple">50</span><span class="code-pink">%</span>;}</span>
<span class="code-line"></span>
<span class="code-line"><span class="code-green">.hoverJudge-txt::after</span> {<span class="code-blue">height</span>: <span class="code-purple">100</span><span class="code-pink">px</span>;}</span>
<span class="code-line"></span>
<span class="code-line"><span class="code-green">.upperHalf:hover</span>,</span>
<span class="code-line"><span class="code-green">.lowerHalf:hover</span> {<span class="code-blue">height</span>: <span class="code-purple">100</span><span class="code-pink">%</span>;}</span></code></pre>
        </div>
        <div class="p1">
          <p class="p2">なぜなら、しないとこうなるからです。</p>
          <div class="hoverJudge p2">
            <div class="upperHalf exp2"></div>
            <div class="lowerHalf exp2"></div>
            <p class="hoverJudge-txt"></p>
          </div>
        </div>
      </section>

      <section>
        <h3>特徴3</h3>
        <div class="p1">
          <p class="p2"><code class="inlineCode">.upperHalf</code>と<code class="inlineCode">.lowerHalf</code>は、デフォルトでは<code class="inlineCode">z-index</code>を<code class="inlineCode">1</code>にしています。しかし、ホバーしたときは、ホバーした要素の<code class="inlineCode">z-index</code>を<code class="inlineCode">2</code>にしています。</p>
          <pre class="p2"><code class="blockCode_c"><span class="code-line"><span class="code-green">.upperHalf</span>,</span>
<span class="code-line"><span class="code-green">.lowerHalf</span> {<span class="code-blue">z-index</span>: <span class="code-purple">1</span>;}</span>
<span class="code-line"></span>
<span class="code-line"><span class="code-green">.upperHalf:hover</span>,</span>
<span class="code-line"><span class="code-green">.lowerHalf:hover</span> {<span class="code-blue">z-index</span>: <span class="code-purple">2</span>;}</span></code></pre>
        </div>
        <div class="p1">
          <p class="p2">デフォルトの要素の重なり順は、<code class="inlineCode">.upperHalf</code>が後ろで<code class="inlineCode">.lowerHalf</code>が前です。<code class="inlineCode">.upperHalf</code>にホバーしたときに<code class="inlineCode">height</code>を<code class="inlineCode">.hoverJudge-txt::after</code>と同じにしたとしても、<code class="inlineCode">.lowerHalf</code>が前にいるので、<code class="inlineCode">.lowerHalf</code>と重なる部分は見えなくなってしまうのです。</p>
          <div class="hoverJudge p2">
            <div class="upperHalf exp3"></div>
            <div class="lowerHalf exp3"></div>
            <p class="hoverJudge-txt"></p>
          </div>
        </div>
      </section>
    </section>

    <section id="demand">
      <h2>需要</h2>
      <p>あるなら教えてほしいです。</p>
    </section>

    <section id="contactMe">
      <h2>最後に</h2>
      <p>もし誤った情報を見つけたりお聞きしたいことがあったりした場合は、<a href="https://twitter.com/ryoo20190328">TwitterのDM</a>か<a href="mailto:roxen@ryo.dev">メール</a>にご連絡ください。</p>
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
