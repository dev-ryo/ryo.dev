<?php
  require_once('../../../../BNHG7nx88aBa/article.php');

  $url = "https://ryo.dev/article/coding/how-to-center-an-inline-element-and-an-inlineBlock-element/";
  $article = new Article();
  $dbInfo = $article->getInfoFromDM($url);

  $originalParts = [
    "desc" => $dbInfo['description'],
    "title" => $dbInfo['title'],
    "originalCSS" => "/article/coding/how-to-center-an-inline-element-and-an-inlineBlock-element/style_min.css",
    "datePublished" => '2020-04-02',
    "dateModified" => '2020-04-02',
    "breadcrumbList" => [
      ["name" => "HOME", "item" => "https://ryo.dev/"],
      ["name" => "記事", "item" => "https://ryo.dev/article/?category=all&p=1"],
      ["name" => $dbInfo['category_name'], "item" => "https://ryo.dev/article/?category=".$dbInfo['category_slug']."&p=1"]
    ]
  ];
  $parts = $article->getArticleInfo($originalParts);
?> <!DOCTYPE html><html lang="ja"> <?php include($_SERVER['DOCUMENT_ROOT'] . $parts["html"]["head"]); ?> <body> <?php include($_SERVER['DOCUMENT_ROOT'] . $parts["html"]["header"]); ?> <main><div class="h1_c"><ul aria-label="パンくずリスト" class="breadcrumbs_c"> <?php forEach($parts["breadcrumbList"] as $page): ?> <li class="breadcrumbs-list"><a href="<?= $page["item"]; ?>" class="breadcrumbs-list-link"><?= $page["name"]; ?></a></li> <?php endforeach; ?> </ul><p class="lastUpdated">最終更新日：<time datetime="<?= $parts["dateModified"]; ?>"><?= str_replace('-', '.', $parts["dateModified"]); ?></time></p><h1><?= $parts["title"] ?></h1><ol class="tableOfContents" aria-label="目次"><li><a href="#tac" class="tableOfContents-link"><code class="inlineCode">text-align: center;</code>を使う</a></li><li><a href="#flex" class="tableOfContents-link"><code class="inlineCode">flex</code>を使う</a></li><li><a href="#pl" class="tableOfContents-link"><code class="inlineCode">position: relative;</code>を使う</a></li><li><a href="#demand" class="tableOfContents-link">需要</a></li><li><a href="#contactMe" class="tableOfContents-link">最後に</a></li></ol></div><section id="tac"><h2><code class="inlineCode">text-align: center;</code>を使う</h2><div class="p1"><div class="sample-p-tac p2"><code class="sample-di">display: inline;</code></div><div class="sample-p-tac p2"><code class="sample-dib">display: inline-block;</code></div><pre class="p2"><code class="blockCode_c"><span class="code-line">&lt;<span class="code-pink">div</span> <span class="code-green">class</span>=<span class="code-yellow">"tac"</span>&gt;</span>
<span class="code-line">  &lt;<span class="code-pink">code</span>&gt;display: inline;&lt;/<span class="code-pink">code</span>&gt;</span>
<span class="code-line">&lt;/<span class="code-pink">div</span>&gt;</span>
<span class="code-line"></span>
<span class="code-line">&lt;<span class="code-pink">div</span> <span class="code-green">class</span>=<span class="code-yellow">"tac"</span>&gt;</span>
<span class="code-line">  &lt;<span class="code-pink">code</span> <span class="code-green">class</span>=<span class="code-yellow">"dib"</span>&gt;display: inline-block;&lt;/<span class="code-pink">code</span>&gt;</span>
<span class="code-line">&lt;/<span class="code-pink">div</span>&gt;</span></code></pre><pre class="p2"><code class="blockCode_c"><span class="code-line"><span class="code-green">.tac</span> {<span class="code-blue">text-align</span>: <span class="code-blue">center</span>;}</span>
<span class="code-line"><span class="code-green">.dib</span> {<span class="code-blue">display</span>: <span class="code-blue">inline-block</span>;}</span>
<span class="code-line"></span>
<span class="code-line code-gray">/* code要素のdisplayプロパティの初期値はinlineです。また、枠線と背景色と余白を追加するCSSは省略しています。 */</span></code></pre></div><p class="p1"><code class="inlineCode">display</code>プロパティの値が<code class="inlineCode">inline</code>または<code class="inlineCode">inline-block</code>である要素（以下、inline的な要素）の親要素に<code class="inlineCode">text-align: center;</code>を指定する方法です。</p></section><section id="flex"><h2><code class="inlineCode">flex</code>を使う</h2><div class="p1"><div class="sample-p-flex p2"><code class="sample-di">display: inline;</code></div><div class="sample-p-flex p2"><code class="sample-dib">display: inline-block;</code></div><pre class="p2"><code class="blockCode_c"><span class="code-line">&lt;<span class="code-pink">div</span> <span class="code-green">class</span>=<span class="code-yellow">"flex"</span>&gt;</span>
<span class="code-line">  &lt;<span class="code-pink">code</span>&gt;display: inline;&lt;/<span class="code-pink">code</span>&gt;</span>
<span class="code-line">&lt;/<span class="code-pink">div</span>&gt;</span>
<span class="code-line"></span>
<span class="code-line">&lt;<span class="code-pink">div</span> <span class="code-green">class</span>=<span class="code-yellow">"flex"</span>&gt;</span>
<span class="code-line">  &lt;<span class="code-pink">code</span> <span class="code-green">class</span>=<span class="code-yellow">"dib"</span>&gt;display: inline-block;&lt;/<span class="code-pink">code</span>&gt;</span>
<span class="code-line">&lt;/<span class="code-pink">div</span>&gt;</span></code></pre><pre class="p2"><code class="blockCode_c"><span class="code-line"><span class="code-green">.flex</span> {</span>
<span class="code-line">  <span class="code-blue">display</span>: <span class="code-blue">flex</span>;</span>
<span class="code-line">  <span class="code-blue">justify-content</span>: <span class="code-blue">center</span>;</span>
<span class="code-line">}</span>
<span class="code-line"><span class="code-green">.dib</span> {<span class="code-blue">display</span>: <span class="code-blue">inline-block</span>;}</span>
<span class="code-line"></span>
<span class="code-line code-gray">/* code要素のdisplayプロパティの初期値はinlineです。また、枠線と背景色と余白を追加するCSSは省略しています。 */</span></code></pre></div><p class="p1">inline的な要素の親要素に<code class="inlineCode">display: flex;</code>と<code class="inlineCode">justify-content: center;</code>を指定する方法です。</p></section><section id="pl"><h2><code class="inlineCode">position: relative;</code>を使う</h2><div class="p1"><div class="sample-p p2"><code class="sample-di-pl">display: inline;</code></div><div class="sample-p p2"><code class="sample-dib-pl">display: inline-block;</code></div><pre class="p2"><code class="blockCode_c"><span class="code-line">&lt;<span class="code-pink">div</span>&gt;</span>
<span class="code-line">  &lt;<span class="code-pink">code</span> <span class="code-green">class</span>=<span class="code-yellow">"pl"</span>&gt;display: inline;&lt;/<span class="code-pink">code</span>&gt;</span>
<span class="code-line">&lt;/<span class="code-pink">div</span>&gt;</span>
<span class="code-line"></span>
<span class="code-line">&lt;<span class="code-pink">div</span>&gt;</span>
<span class="code-line">  &lt;<span class="code-pink">code</span> <span class="code-green">class</span>=<span class="code-yellow">"dib pl"</span>&gt;display: inline-block;&lt;/<span class="code-pink">code</span>&gt;</span>
<span class="code-line">&lt;/<span class="code-pink">div</span>&gt;</span></code></pre><pre class="p2"><code class="blockCode_c"><span class="code-line"><span class="code-green">.pl</span> {</span>
<span class="code-line">  <span class="code-blue">left</span>: <span class="code-purple">50</span><span class="code-pink">%</span>;</span>
<span class="code-line">  <span class="code-blue">position</span>: <span class="code-blue">relative</span>;</span>
<span class="code-line">  <span class="code-blue">transform</span>: <span class="code-blue">translateX</span>(<span class="code-purple">-50</span><span class="code-pink">%</span>);</span>
<span class="code-line">}</span>
<span class="code-line"><span class="code-green">.dib</span> {<span class="code-blue">display</span>: <span class="code-blue">inline-block</span>;}</span>
<span class="code-line"></span>
<span class="code-line code-gray">/* code要素のdisplayプロパティの初期値はinlineです。また、枠線と背景色と余白を追加するCSSは省略しています。 */</span></code></pre></div><p class="p1">inline-blockな要素に<code class="inlineCode">left: 50%;</code>と<code class="inlineCode">position: relative;</code>と<code class="inlineCode">transform: translateX(-50%);</code>を指定することで中央揃えになります。</p><p class="p1">しかし、inlineな要素に同じコードを指定しても中央揃えにはなりません。</p></section><section id="contactMe"><h2>最後に</h2><p>もし誤った情報を見つけたりお聞きしたいことがあったりした場合は、<a href="https://twitter.com/ryoo20190328">TwitterのDM</a>か<a href="mailto:roxen@ryo.dev">メール</a>にご連絡ください。</p></section></main> <?php include($_SERVER['DOCUMENT_ROOT'] . $parts["html"]["footer"]); ?> <?php if($parts["js"] !== ""): ?> <script> <?php foreach($parts["js"] as $path) {include($_SERVER['DOCUMENT_ROOT'] . $path);} ?> </script> <?php endif; ?> </body></html>