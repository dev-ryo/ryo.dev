<?php
  require_once('../../../../BNHG7nx88aBa/article.php');

  $url = "https://ryo.dev/article/coding/autoAdjust-textarea-accordingTo-theNumOfLines/";
  $article = new Article();
  $dbInfo = $article->getInfoFromDM($url);

  $originalParts = [
    "twCard" => 'summary_large_image',
    "twImg" => 'https://ryo.dev/article/coding/autoAdjust-textarea-accordingTo-theNumOfLines/img/twCard.png',
    "desc" => $dbInfo['description'],
    "title" => $dbInfo['title'],
    "originalCSS" => "/article/coding/autoAdjust-textarea-accordingTo-theNumOfLines/style_min.css",
    "datePublished" => '2020-01-27',
    "dateModified" => '2020-04-20',
    "schemaArticleImg" => '"https://ryo.dev/article/coding/autoAdjust-textarea-accordingTo-theNumOfLines/img/schema1-1.png", "https://ryo.dev/article/coding/autoAdjust-textarea-accordingTo-theNumOfLines/img/schema4-3.png", "https://ryo.dev/article/coding/autoAdjust-textarea-accordingTo-theNumOfLines/img/schema16-9.png"',
    "breadcrumbList" => [
      ["name" => "HOME", "item" => "https://ryo.dev/"],
      ["name" => "記事", "item" => "https://ryo.dev/article/?category=all&p=1"],
      ["name" => $dbInfo['category_name'], "item" => "https://ryo.dev/article/?category=".$dbInfo['category_slug']."&p=1"]
    ]
  ];
  $parts = $article->getArticleInfo($originalParts);
?> <!DOCTYPE html><html lang="ja"> <?php include($_SERVER['DOCUMENT_ROOT'] . $parts["html"]["head"]); ?> <body> <?php include($_SERVER['DOCUMENT_ROOT'] . $parts["html"]["header"]); ?> <main><div class="h1_c"><ul aria-label="パンくずリスト" class="breadcrumbs_c"> <?php forEach($parts["breadcrumbList"] as $page): ?> <li class="breadcrumbs-list"><a href="<?= $page["item"]; ?>" class="breadcrumbs-list-link"><?= $page["name"]; ?></a></li> <?php endforeach; ?> </ul><p class="lastUpdated">最終更新日：<time datetime="<?= $parts["dateModified"] ?>"><?= str_replace('-', '.', $parts["dateModified"]); ?></time></p><h1><?= $parts["title"] ?></h1><ol class="tableOfContents" aria-label="目次"><li><a href="#code" class="tableOfContents-link">コード</a></li><li><a href="#description" class="tableOfContents-link">コードの説明</a></li><li><a href="#s3" class="tableOfContents-link">サンプル</a></li><li><a href="#s4" class="tableOfContents-link">注意</a></li><li><a href="#s5" class="tableOfContents-link">最後に</a></li></ol></div><section id="code"><h2>コード</h2><p class="p2">最低限のコードはこちらになります。</p><pre class="p2"><code class="blockCode_c"><span class="code-line">&lt;<span class="code-pink">textarea</span> <span class="code-green">class</span>=<span class="code-yellow">"sample"</span>&gt;&lt;/<span class="code-pink">textarea</span>&gt;</span></code></pre><pre class="p2"><code class="blockCode_c"><span class="code-line"><span class="code-blue">const</span> <var class="code-purple">tareaE</var> <span class="code-pink">=</span> document.<span class="code-blue">querySelector</span>(<span class="code-yellow">'.sample'</span>);</span>
<span class="code-line"><span class="code-blue">const</span> <span class="code-purple">bdw</span> <span class="code-pink">=</span> <span class="code-purple">4</span>;</span>
<span class="code-line">tareaE.<span class="code-blue">addEventListener</span>(<span class="code-yellow">'input'</span>, () <span class="code-blue">=&gt;</span> {</span>
<span class="code-line">  tareaE.style.height <span class="code-pink">=</span> <span class="code-yellow">"20px"</span>;</span>
<span class="code-line">  tareaE.style.height <span class="code-pink">=</span> tareaE.scrollHeight <span class="code-pink">+</span> bdw <span class="code-pink">+</span> <span class="code-yellow">"px"</span>;</span>
<span class="code-line">});</span></code></pre></section><section id="description"><h2>コードの説明</h2><div class="p1"><p class="p2">後々<code class="inlineCode">textarea</code>要素（以下「テキストエリア」）に対してイベントを設定したりCSSを指定したりするために、まずは<code class="inlineCode">querySelector()</code>メソッドを使ってテキストエリアを取得します（<a href="https://developer.mozilla.org/ja/docs/Web/API/Document/querySelector">querySelector()メソッドについて詳しく知る</a>）。</p><pre class="p2"><code class="blockCode_c"><span class="code-line"><span class="code-blue">const</span> <var class="code-purple fs_n">tareaE</var> <span class="code-pink">=</span> document.<span class="code-blue">querySelector</span>(<span class="code-yellow">'.sample'</span>);</span>
<span class="code-line code-gray">// const <var>bdw</var> = 4;</span>
<span class="code-line code-gray">// tareaE.addEventListener('input', () =&gt; {</span>
<span class="code-line code-gray">//   tareaE.style.height = "20px";</span>
<span class="code-line code-gray">//   tareaE.style.height = tareaE.scrollHeight + bdw + "px";</span>
<span class="code-line code-gray">// });</span></code></pre></div><div class="p1"><p class="p2">次に、テキストエリアに<code class="inlineCode">input</code>イベントを指定します。これによりテキストエリアに文字が入力されるたびにイベントが発火します（<a href="https://developer.mozilla.org/ja/docs/Web/API/HTMLElement/input_event">inputイベントについて詳しく知る</a>）。</p><pre class="p2"><code class="blockCode_c"><span class="code-line code-gray">// const <var class="fs_n">tareaE</var> = document.querySelector('.sample');</span>
<span class="code-line code-gray">// const <var>bdw</var> = 4;</span>
<span class="code-line">tareaE.<span class="code-blue">addEventListener</span>(<span class="code-yellow">'input'</span>, () <span class="code-blue">=&gt;</span> {</span>
<span class="code-line code-gray">//   tareaE.style.height = "20px";</span>
<span class="code-line code-gray">//   tareaE.style.height = tareaE.scrollHeight + bdw + "px";</span>
<span class="code-line">});</span></code></pre></div><div class="p1"><p class="p2"><code class="inlineCode">scrollHeight</code>プロパティ（以下「<code class="inlineCode">scrollHeight</code>」）を使うことで、ある要素の現在見えている部分の高さとスクロールしなければ見えない部分の高さを合わせた値を取得できます（<a href="https://developer.mozilla.org/ja/docs/Web/API/Element/scrollHeight">scrollHeightプロパティについて詳しく知る</a>）。つまり、<code class="inlineCode">scrollHeight</code>の値はある要素を垂直スクロールせずに見るための最小の値ということになります。テキストエリアで文字が右端に到達し折り返されて行数が増えるごとに、<code class="inlineCode">scrollHeight</code>の値も増えます。</p><div class="p2 textarea_c"><textarea rows="1" placeholder="文字を入力してみてください" class="sample1"></textarea><div class="sample1-val">scrollHeight: px</div></div></div><div class="p1"><p class="p2"><code class="inlineCode">scrollHeight</code>の値をテキストエリアの高さとして設定すればいいのですが、<code class="inlineCode">scrollHeight</code>は境界線の太さを含みません。したがって、<code class="inlineCode">scrollHeight</code>の値にテキストエリアの上と下の境界線の太さを加えた値を高さとして指定します。</p><pre class="p2"><code class="blockCode_c"><span class="code-line code-gray">// const <var class="fs_n">tareaE</var> = document.querySelector('.sample');</span>
<span class="code-line"><span class="code-blue">const</span> <span class="code-purple">bdw</span> <span class="code-pink">=</span> <span class="code-purple">4</span>;</span>
<span class="code-line code-gray">// tareaE.addEventListener('input', () =&gt; {</span>
<span class="code-line">  tareaE.style.height <span class="code-pink">=</span> <span class="code-yellow">"20px"</span>;</span>
<span class="code-line">  tareaE.style.height <span class="code-pink">=</span> tareaE.scrollHeight <span class="code-pink">+</span> bdw <span class="code-pink">+</span> <span class="code-yellow">"px"</span>;</span>
<span class="code-line code-gray">// });</span></code></pre></div><div class="p1"><p class="p2">境界線の太さをJSで取得する場合は下のようなコードを書きます。</p><pre class="p2"><code class="blockCode_c"><span class="code-line"><span class="code-blue">const</span> <var class="code-purple">compStyles</var> <span class="code-pink">=</span> <span class="code-green">getComputedStyle</span>(tareaE, <span class="code-purple">null</span>);</span>
<span class="code-line"><span class="code-blue">const</span> <var class="code-purple">bdtW</var> <span class="code-pink">=</span> compStyles.<span class="code-green">getPropertyValue</span>(<span class="code-yellow">"border-top-width"</span>);</span>
<span class="code-line"><span class="code-blue">const</span> <var class="code-purple">bdbW</var> <span class="code-pink">=</span> compStyles.<span class="code-green">getPropertyValue</span>(<span class="code-yellow">"border-bottom-width"</span>);</span></code></pre></div><p class="p1">ではなぜ「20px」も指定しているのでしょうか？</p><div class="p1"><p class="p2">それを指定しないと複数行にわたる文字を一度に消したときに高さが縮んでくれません。また、文字を1文字ずつ消したときにおかしな動作をします。試してみよう！</p><div class="textarea_c p2"><textarea rows="7" class="sample2">hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello</textarea></div></div><p class="p1">この問題を解決するために20pxを指定します。<br>ではなぜ「20px」という値にしているのでしょうか？</p><p class="p1">結論から言うと、20pxである必要はありません。</p><p class="p1">テキストエリアの<code class="inlineCode">height</code>プロパティに<code class="inlineCode">scrollHeight</code>の値を指定する前に、十分に小さい値を指定します。その時、<code class="inlineCode">scrollHeight</code>の値は、要素の中身をスクロールなしで見るための最小の値になっています。そこで、テキストエリアの<code class="inlineCode">height</code>プロパティに<code class="inlineCode">scrollHeight</code>の値を指定することで、テキストエリアはちょうどいい大きさになるわけです。</p><p class="p1">「十分に小さい値」を説明するのが難しいです...。もし分からなかったら「1px」と指定しておけば大丈夫です。</p></section><section id="s3"><h2>サンプル</h2><div class="p1 mb24rem"><p class="p2">下のサンプルは次のような特徴を持っています。</p><ul class="list_ml p2"><li class="listE"><code class="inlineCode">min-height: 100px;</code>を指定してデフォルトで数行分の高さを持たせています。</li><li class="listE"><code class="inlineCode">max-height: 200px;</code>を指定して高さの最大値を指定しています。</li><li class="listE">変数<var class="inlineCode">bdw</var>にはテキストエリアの上下境界線の太さの合計値に+1した値を代入しています。そうしないとテキストエリアの高さが100px～200pxのときに垂直スクロールバーが表示されてしまいました。</li></ul></div><p class="codepen" data-height="411" data-theme-id="37501" data-default-tab="result" data-user="Mryoo" data-slug-hash="BaywxqM" style="height:411px;box-sizing:border-box;display:flex;align-items:center;justify-content:center;border:2px solid;margin:1em 0;padding:1em" data-pen-title="Text area that automatically adjusts the height according to the number of lines"><span>See the Pen <a href="https://codepen.io/Mryoo/pen/BaywxqM">Text area that automatically adjusts the height according to the number of lines</a> by RYO (<a href="https://codepen.io/Mryoo">@Mryoo</a>) on <a href="https://codepen.io">CodePen</a>.</span></p><script async src="https://static.codepen.io/assets/embed/ei.js" nonce="<?=$parts['nonce']; ?>"></script></section><section id="s4"><h2>注意</h2><p class="p1">もし<code class="inlineCode">height</code>プロパティにトランジションエフェクトを適用させていると、複数行を消したときの動作がおかしくなります（以下のサンプルを参照）。したがって、テキストエリアに<code class="inlineCode">transition</code>プロパティを指定したい場合は、<code class="inlineCode">transition-property</code>プロパティの値に<code class="inlineCode">all</code>と<code class="inlineCode">height</code>以外を設定してください。</p><div class="textarea_c p1"><textarea rows="8" class="sample3">hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello</textarea></div></section><section id="s5"><h2>最後に</h2><p>もし誤った情報を見つけたり、より良いコードを知っていたり、お聞きしたいことがあったりした場合は、<a href="https://twitter.com/ryoo20190328">TwitterのDM</a>か<a href="mailto:roxen@ryo.dev">メール</a>にご連絡ください。</p></section></main> <?php include($_SERVER['DOCUMENT_ROOT'] . $parts["html"]["footer"]); ?> <?php if($parts["js"] !== ""): ?> <script> <?php foreach($parts["js"] as $path) {include($_SERVER['DOCUMENT_ROOT'] . $path);} ?> </script> <?php endif; ?> <script nonce="<?=$parts['nonce']; ?>">const sample1E = document.querySelector('.sample1');
    sample1E.addEventListener('input', () => {
      document.querySelector('.sample1-val').textContent = "scrollHeight: " + sample1E.scrollHeight + "px";
    });

    const sample2E = document.querySelector('.sample2');
    sample2E.addEventListener('input', () => {
      sample2E.style.height = sample2E.scrollHeight + "px";
    });

    const sample3E = document.querySelector('.sample3');
    sample3E.addEventListener('input', () => {
      sample3E.style.height = "20px";
      sample3E.style.height = sample3E.scrollHeight + "px";
    });

    const textareaE = document.querySelectorAll('textarea');
    for(let i = 0; i < textareaE.length; i++) {
      textareaE[i].addEventListener('focus', () => {textareaE[i].parentNode.style.color = "#6846B7";});
      textareaE[i].addEventListener('blur', () => {textareaE[i].parentNode.removeAttribute('style');});
    }</script></body></html>