<?php
  require_once($_SERVER['DOCUMENT_ROOT'].'/../BNHG7nx88aBa/article4.php');

  $url = "https://ryo.dev/article/php/diff-btwn-js-and-php-switch-statement/";
  $page = new Page();
  $dbInfo = $page->getInfoFromDB($url);
  $myInfo = $page->myInfo;

  $page->originalCSS = "/article/php/diff-btwn-js-and-php-switch-statement/style_min.css";
  $page->datePublished = '2020-05-12';
  $page->dateModified = '2020-05-12';
  $page->breadcrumbList = [
    ["name" => "HOME", "item" => $myInfo['hp']],
    ["name" => "記事", "item" => $myInfo['articleCategory']['all']['link']],
    ["name" => $myInfo['articleCategory']['php']['name'], "item" => $myInfo['articleCategory']['php']['link']]
  ];
?>

<!DOCTYPE html>
<html lang="ja">
<?php include($page->root.$page->html["head"]); ?>
<body>
  <?php include($page->root.$page->html["header"]); ?>

    <main>
      <div class="h1_c">
        <ul aria-label="パンくずリスト" class="breadcrumbs_c">
          <?php forEach($page->breadcrumbList as $ePage): ?>
            <li class="breadcrumbs-list">
              <a href="<?= $ePage["item"]; ?>" class="breadcrumbs-list-link"><?= $ePage["name"]; ?></a>
            </li>
          <?php endforeach; ?>
        </ul>
        <p class="lastUpdated">最終更新日：<time datetime="<?= $page->dateModified; ?>"><?= str_replace('-', '.', $page->dateModified); ?></time></p>
        <h1><?=$page->title; ?></h1>

        <ol class="tableOfContents" aria-label="目次">
          <li class="toc-li"><a href="#js" class="toc-a">JavaScriptのswitch文</a></li>
          <li class="toc-li"><a href="#php" class="toc-a">PHPのswitch文</a></li>
          <li class="toc-li"><a href="#summary" class="toc-a">まとめ</a></li>
          <li class="toc-li"><a href="#php-strict" class="toc-a">PHPでも厳密に比較したい</a></li>
          <li class="toc-li"><a href="#contact" class="toc-a">最後に</a></li>
        </ol>
      </div>

      <section id="js">
        <h2>JavaScriptのswitch文</h2>
        <p class="p1">JavaScriptでは、式の値と<code class="inlineCode">case</code>節を<strong>厳密等価演算子（===）</strong>を使って比較します（<a href="https://developer.mozilla.org/ja/docs/Web/JavaScript/Reference/Statements/switch#Description">ソース</a>）。コードで確かめてみましょう。</p>
        <pre class="p1"><code class="blockCode_c"><span class="code-line"><span class="code-blue">function</span> <span class="code-green">compareSwitch</span>(<span class="code-orange">num</span>) {</span>
<span class="code-line">  <span class="code-pink">switch</span>(num) {</span>
<span class="code-line">    <span class="code-pink">case</span> <span class="code-purple">5</span>:</span>
<span class="code-line">      console.<span class="code-blue">log</span>(<span class="code-yellow">'数値の5'</span>);</span>
<span class="code-line">      <span class="code-pink">break</span>;</span>
<span class="code-line">    <span class="code-pink">default</span>:</span>
<span class="code-line">      console.<span class="code-blue">log</span>(<span class="code-yellow">'該当なし'</span>);</span>
<span class="code-line">      <span class="code-pink">break</span>;</span>
<span class="code-line">  }</span>
<span class="code-line"></span>
<span class="code-line">  <span class="code-pink">switch</span>(num) {</span>
<span class="code-line">    <span class="code-pink">case</span> <span class="code-yellow">'5'</span>:</span>
<span class="code-line">      console.<span class="code-blue">log</span>(<span class="code-yellow">'文字列の5'</span>);</span>
<span class="code-line">      <span class="code-pink">break</span>;</span>
<span class="code-line">    <span class="code-pink">default</span>:</span>
<span class="code-line">      console.<span class="code-blue">log</span>(<span class="code-yellow">'該当なし'</span>);</span>
<span class="code-line">      <span class="code-pink">break</span>;</span>
<span class="code-line">  }</span>
<span class="code-line">}</span></code></pre>
        <div class="p1">
          <p class="p2"><code class="inlineCode">compareSwitch</code>関数の引数に<strong>数値の5</strong>を指定して呼び出す、すなわち<code class="inlineCode">compareSwitch(5)</code>を呼び出したときの結果は次のようになります。</p>
          <pre class="p2"><code class="blockCode_c"><span class="code-line">数値の5</span>
<span class="code-line">該当なし</span></code></pre>
        </div>
        <div class="p1">
          <p class="p2"><code class="inlineCode">compareSwitch</code>関数の引数に<strong>文字列の5</strong>を指定して呼び出す、すなわち<code class="inlineCode">compareSwitch('5')</code>を呼び出したときの結果は次のようになります。</p>
          <pre class="p2"><code class="blockCode_c"><span class="code-line">該当なし</span>
<span class="code-line">文字列の5</span></code></pre>
        </div>
        <p class="p1">この結果から、JavaScriptでは確かに厳密等価演算子（===）を使って式の値（ここでは<code class="inlineCode">num</code>）と<code class="inlineCode">case</code>節を比較していることが分かりますね。</p>
      </section>

      <section id="php">
        <h2>PHPのswitch文</h2>
        <p class="p1">PHPでは、式の値と<code class="inlineCode">case</code>節を<strong>等価演算子（==）</strong>を使って比較します（<a href="https://www.php.net/manual/ja/control-structures.switch.php">ソース</a>）。コードで確かめてみましょう。</p>
        <pre class="p1"><code class="blockCode_c"><span class="code-line"><span class="code-blue">function</span> <span class="code-green">compareSwitch</span>($num) {</span>
<span class="code-line">  <span class="code-pink">switch</span>($num) {</span>
<span class="code-line">    <span class="code-pink">case</span> <span class="code-purple">5</span>:</span>
<span class="code-line">      <span class="code-blue">echo</span> <span class="code-yellow">'数値の5'</span>;</span>
<span class="code-line">      <span class="code-pink">break</span>;</span>
<span class="code-line">    <span class="code-pink">default</span>:</span>
<span class="code-line">      <span class="code-blue">echo</span> <span class="code-yellow">'該当なし'</span>;</span>
<span class="code-line">      <span class="code-pink">break</span>;</span>
<span class="code-line">  }</span>
<span class="code-line"></span>
<span class="code-line">  <span class="code-pink">switch</span>($num) {</span>
<span class="code-line">    <span class="code-pink">case</span> <span class="code-yellow">'5'</span>:</span>
<span class="code-line">      <span class="code-blue">echo</span> <span class="code-yellow">'文字列の5'</span>;</span>
<span class="code-line">      <span class="code-pink">break</span>;</span>
<span class="code-line">    <span class="code-pink">default</span>:</span>
<span class="code-line">      <span class="code-blue">echo</span> <span class="code-yellow">'該当なし'</span>;</span>
<span class="code-line">      <span class="code-pink">break</span>;</span>
<span class="code-line">  }</span>
<span class="code-line">}</span></code></pre>
        <div class="p1">
          <p class="p2"><code class="inlineCode">compareSwitch</code>関数の引数に<strong>数値の5</strong>を指定して呼び出す、すなわち<code class="inlineCode">compareSwitch(5)</code>を呼び出したときの結果は次のようになります。</p>
          <pre class="p2"><code class="blockCode_c"><span class="code-line">数値の5</span>
<span class="code-line">文字列の5</span></code></pre>
        </div>
        <div class="p1">
          <p class="p2"><code class="inlineCode">compareSwitch</code>関数の引数に<strong>文字列の5</strong>を指定して呼び出す、すなわち<code class="inlineCode">compareSwitch('5')</code>を呼び出したときの結果は次のようになります。</p>
          <pre class="p2"><code class="blockCode_c"><span class="code-line">数値の5</span>
<span class="code-line">文字列の5</span></code></pre>
        </div>
        <p class="p1">この結果から、PHPでは確かに等価演算子（==）を使って式の値（ここでは<code class="inlineCode">$num</code>）と<code class="inlineCode">case</code>節を比較していることが分かりますね。</p>
      </section>

      <section id="summary">
        <h2>まとめ</h2>
        <div class="summary-C">
          <p class="summary-title">switch文</p>
          <p class="summary-la">JS<br><span class="summary-symbol">===</span></p>
          <p class="summary-la">PHP<br><span class="summary-symbol">==</span></p>
        </div>
      </section>

      <section id="php-strict">
        <h2>PHPでも厳密に比較したい</h2>
        <p class="p1">次のようなコードを書くことで、<code class="inlineCode">compareSwitch(5)</code>と<code class="inlineCode">compareSwitch('5')</code>を呼び出したときの結果は<a href="#js">JSの時</a>と同じになります。</p>
        <pre class="p1"><code class="blockCode_c"><span class="code-line"><span class="code-blue">function</span> <span class="code-green">compareSwitch</span>($num) {</span>
<span class="code-line">  <span class="code-pink">switch</span>(<span class="code-purple">true</span>) {</span>
<span class="code-line">    <span class="code-pink">case</span> $num <span class="code-pink">===</span> <span class="code-purple">5</span>:</span>
<span class="code-line">      <span class="code-blue">echo</span> <span class="code-yellow">'数値の5'</span>;</span>
<span class="code-line">      <span class="code-pink">break</span>;</span>
<span class="code-line">    <span class="code-pink">default</span>:</span>
<span class="code-line">      <span class="code-blue">echo</span> <span class="code-yellow">'該当なし'</span>;</span>
<span class="code-line">      <span class="code-pink">break</span>;</span>
<span class="code-line">  }</span>
<span class="code-line"></span>
<span class="code-line">  <span class="code-pink">switch</span>(<span class="code-purple">true</span>) {</span>
<span class="code-line">    <span class="code-pink">case</span> $num <span class="code-pink">===</span> <span class="code-yellow">'5'</span>:</span>
<span class="code-line">      <span class="code-blue">echo</span> <span class="code-yellow">'文字列の5'</span>;</span>
<span class="code-line">      <span class="code-pink">break</span>;</span>
<span class="code-line">    <span class="code-pink">default</span>:</span>
<span class="code-line">      <span class="code-blue">echo</span> <span class="code-yellow">'該当なし'</span>;</span>
<span class="code-line">      <span class="code-pink">break</span>;</span>
<span class="code-line">  }</span>
<span class="code-line">}</span></code></pre>
      </section>

      <section id="contact">
        <h2>最後に</h2>
        <p>誤った情報を見つけたりお聞きしたいことがございましたら、<a href="<?=$myInfo["contact"]["tw2"]; ?>">TwitterのDM</a>か<a href="mailto:<?=$myInfo["contact"]["mail"]; ?>">メール</a>までご連絡ください。</p>
      </section>
    </main>

    <?php include($page->root.$page->html["footer"]); ?>

  <?php if($page->js !== ""): ?>
    <script nonce="<?=$page->nonce; ?>">
      <?php foreach($page->js as $path) {include($page->root.$path);} ?>
    </script>
  <?php endif; ?>
</body>
</html>
