<?php
  require_once('../../../../BNHG7nx88aBa/article.php');

  $url = "https://ryo.dev/article/coding/no_need_to_mark_the_entire_article_with_the_article_element/";
  $article = new Article();
  $dbInfo = $article->getInfoFromDM($url);

  $originalParts = [
    "desc" => $dbInfo['description'],
    "title" => $dbInfo['title'],
    "originalCSS" => "/article/coding/no_need_to_mark_the_entire_article_with_the_article_element/style_min.css",
    "datePublished" => '2020-02-05',
    "dateModified" => '2020-04-21',
    "breadcrumbList" => [
      ["name" => "HOME", "item" => "https://ryo.dev/"],
      ["name" => "記事", "item" => "https://ryo.dev/article/?category=all&p=1"],
      ["name" => $dbInfo['category_name'], "item" => "https://ryo.dev/article/?category=".$dbInfo['category_slug']."&p=1"]
    ]
  ];
  $parts = $article->getArticleInfo($originalParts);
?> <!DOCTYPE html><html lang="ja"> <?php include($_SERVER['DOCUMENT_ROOT'] . $parts["html"]["head"]); ?> <body> <?php include($_SERVER['DOCUMENT_ROOT'] . $parts["html"]["header"]); ?> <main><div class="h1_c"><ul aria-label="パンくずリスト" class="breadcrumbs_c"> <?php forEach($parts["breadcrumbList"] as $page): ?> <li class="breadcrumbs-list"><a href="<?= $page["item"]; ?>" class="breadcrumbs-list-link"><?= $page["name"]; ?></a></li> <?php endforeach; ?> </ul><p class="lastUpdated">最終更新日：<time datetime="<?= $parts["dateModified"]; ?>"><?= str_replace('-', '.', $parts["dateModified"]); ?></time></p><h1><?= $parts["title"] ?></h1><ol class="tableOfContents" aria-label="目次"><li><a href="#according-to-the-specification" class="tableOfContents-link">仕様書によると...</a></li><li><a href="#my-interpretation" class="tableOfContents-link">僕なりの解釈</a></li><li><a href="#finally" class="tableOfContents-link">最後に</a></li></ol></div><section id="according-to-the-specification"><h2>仕様書によると...</h2><div class="p1"><p class="p2"><code class="inlineCode">article</code>要素について、仕様書には次のように書いてあります。</p><blockquote cite="https://momdo.github.io/html/sections.html#the-article-element" class="p2"><p>ページの主な内容（すなわち、フッタ, ヘッダ, ナビブロック, サイドバーを除外した部分）すべてが，全体として単独の自己完結的な構成になるとき、それを <code class="codeInQuote">article</code> でマークすることは — そうしてもよいが — 形の上では冗長になる（それは単独の文書を成し，ページが単独の構成であることは自明になるので）。</p><p class="quoteSource"><cite><a href="https://momdo.github.io/html/sections.html#the-article-element">HTML Standard 日本語訳</a></cite></p></blockquote></div></section><section id="my-interpretation"><h2>僕なりの解釈</h2><p class="p1"><q cite="https://momdo.github.io/html/sections.html#the-article-element">ページの主な内容すべてが，全体として単独の自己完結的な構成</q>というのは、<strong>ブログや記事</strong>を含むのではないでしょうか。ブログや記事は1ページ1テーマが基本形です。HTMLとCSSの書き方についての内容と先週の九州旅行の思い出の内容を1つの記事に書く人はいないでしょう。</p><div class="p1"><p class="p2">ということは、ブログや記事の場合、次のようにマークアップする必要はないのでは？</p><pre class="p2"><code class="blockCode_c"><span class="code-line">&lt;<span class="code-pink">header</span>&gt;&lt;/<span class="code-pink">header</span>&gt;</span>
<span class="code-line">&lt;<span class="code-pink">main</span>&gt;</span>
<span class="code-line">  &lt;<span class="code-pink">article</span>&gt;&lt;/<span class="code-pink">article</span>&gt;</span>
<span class="code-line">&lt;/<span class="code-pink">main</span>&gt;</span>
<span class="code-line">&lt;<span class="code-pink">footer</span>&gt;&lt;/<span class="code-pink">footer</span>&gt;</span></code></pre><pre class="p2"><code class="blockCode_c"><span class="code-line">&lt;<span class="code-pink">article</span>&gt;</span>
<span class="code-line">  &lt;<span class="code-pink">header</span>&gt;&lt;/<span class="code-pink">header</span>&gt;</span>
<span class="code-line">  &lt;<span class="code-pink">main</span>&gt;&lt;/<span class="code-pink">main</span>&gt;</span>
<span class="code-line">  &lt;<span class="code-pink">footer</span>&gt;&lt;/<span class="code-pink">footer</span>&gt;</span>
<span class="code-line">&lt;/<span class="code-pink">article</span>&gt;</span></code></pre></div><div class="p1"><p class="p2">このようにマークアップすればいいということでしょうか？</p><pre class="p2"><code class="blockCode_c"><span class="code-line">&lt;<span class="code-pink">header</span>&gt;&lt;/<span class="code-pink">header</span>&gt;</span>
<span class="code-line">&lt;<span class="code-pink">main</span>&gt;&lt;/<span class="code-pink">main</span>&gt;</span>
<span class="code-line">&lt;<span class="code-pink">footer</span>&gt;&lt;/<span class="code-pink">footer</span>&gt;</span></code></pre></div></section><section id="finally"><h2>最後に</h2><p>もし誤った情報を見つけたり、お聞きしたいことがあったりした場合は、<a href="https://twitter.com/ryoo20190328">TwitterのDM</a>か<a href="mailto:roxen@ryo.dev">メール</a>にご連絡ください。</p></section></main> <?php include($_SERVER['DOCUMENT_ROOT'] . $parts["html"]["footer"]); ?> <?php if($parts["js"] !== ""): ?> <script> <?php foreach($parts["js"] as $path) {include($_SERVER['DOCUMENT_ROOT'] . $path);} ?> </script> <?php endif; ?> </body></html>