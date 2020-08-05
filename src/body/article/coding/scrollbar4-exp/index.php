<?php
  require_once('../../../../BNHG7nx88aBa/article.php');

  $url = "https://ryo.dev/article/coding/scrollbar4-exp/";
  $article = new Article();
  $dbInfo = $article->getInfoFromDM($url);

  $originalParts = [
    "desc" => $dbInfo['description'],
    "title" => $dbInfo['title'],
    "originalCSS" => "/article/coding/scrollbar4-exp/style_min.css",
    "datePublished" => '2020-01-26',
    "dateModified" => '2020-01-26',
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
          <li><a href="#sample" class="tableOfContents-link">サンプル</a></li>
          <li><a href="#features" class="tableOfContents-link">特徴</a></li>
          <li><a href="#code" class="tableOfContents-link">コード</a></li>
          <li><a href="#customization" class="tableOfContents-link">カスタマイズ</a></li>
          <li><a href="#finally" class="tableOfContents-link">最後に</a></li>
        </ol>
      </div>

      <section id="overview">
        <h2>概要</h2>
        <p class="p1">垂直スクロール量によって伸縮するプログレスバーを作りました。プログレスバーは一般的に画面の上もしくは下に固定されています。プログレスバーは画面の左端から右端まで伸びます。つまり、プログレスバーの最大の長さは、画面の横幅と同じです。もしあなたがページ全体のX%の箇所までスクロールしたら、プログレスバーは画面幅のX%分だけ伸びます。</p>
        <p class="p1">長いWebページの場合、プログレスバーを使うことで、ユーザーはどれだけ読み進めたのかや残りがどれくらいあるかを視覚的に直感的に把握することができます。</p>
      </section>

      <section id="sample">
        <h2>サンプル</h2>
        <p class="p1">このページで使っています。</p>

        <!-- *****************************
        ↓↓↓ プログレスバーを作るコード
        ***************************** -->
        <div class="progressBar" aria-hidden="true"></div>
        <script nonce="<?=$parts['nonce']; ?>">
          const progressBarE = document.querySelector('.progressBar');
          const page_h = function() {return document.body.getBoundingClientRect().height - window.innerHeight;};
          const progressBarWidthAdjustment = function() {
            let scrollAmount = window.scrollY;
            progressBarE.style.transform = "translateX(" + scrollAmount * 100 / page_h() + "vw)";
          };

          function get__adjustment() {
            page_h();
            progressBarWidthAdjustment();
          };

          window.addEventListener('load', get__adjustment);
          window.addEventListener('scroll', progressBarWidthAdjustment);
          window.addEventListener('resize', get__adjustment);
        </script>
        <!-- *****************************
        ↑↑↑ プログレスバーを作るコード
        ***************************** -->
      </section>

      <section id="features">
        <h2>特徴</h2>
        <ul class="list_ml">
          <li class="listE">プログレスバーの伸縮は<code class="inlineCode">transform</code>プロパティによって制御します。パフォーマンスにいい！</li>
          <li class="listE">HTML：1行、CSS：8行、JS：17行。シンプルかつ軽量！</li>
          <li class="listE">自由にカスタマイズ可能！</li>
          <li class="listE">画面リサイズするとプログレスバーも必要な分だけ伸縮します！</li>
          <li class="listE">読み込み完了後にX%の場所にいたら、プログレスバーもX%伸びます。</li>
          <li class="listE">VoiceOverやNVDAはこの要素を読み上げません！プログレスバーの要素は支援技術には提供されません。混乱を避けるためです。</li>
        </ul>
      </section>

      <section id="code">
        <h2>コード</h2>
        <p class="codepen" data-height="508" data-theme-id="37501" data-default-tab="js,result" data-user="Mryoo" data-slug-hash="yLyXooa" style="height: 508px; box-sizing: border-box; display: flex; align-items: center; justify-content: center; border: 2px solid; margin: 1em 0; padding: 1em;" data-pen-title="Scrollbar4 :  Progress bar that expands and contracts according to the scroll amount">
          <span>See the Pen <a href="https://codepen.io/Mryoo/pen/yLyXooa">
          Scrollbar4 :  Progress bar that expands and contracts according to the scroll amount</a> by RYO (<a href="https://codepen.io/Mryoo">@Mryoo</a>)
          on <a href="https://codepen.io">CodePen</a>.</span>
        </p>
        <script async src="https://static.codepen.io/assets/embed/ei.js" nonce="<?=$parts['nonce']; ?>"></script>
      </section>

      <section id="customization">
        <h2>カスタマイズ</h2>
        <ul class="list_ml">
          <li class="listE">
            <button type="button" data-class="progressBar" class="btn-active">デフォルト</button>
            <a href="https://codepen.io/Mryoo/pen/yLyXooa" class="a-focHovAct">サンプル</a>
          </li>
          <li class="listE">
            <button type="button" data-class="progressBar pb-bottom">ページ下部</button>
            <a href="https://codepen.io/Mryoo/pen/ExaXqaN" class="a-focHovAct">サンプル</a>
          </li>
          <li class="listE">
            <button type="button" data-class="progressBar pb-gradation">グラデーション</button>
            <a href="https://codepen.io/Mryoo/pen/MWYoNww" class="a-focHovAct">サンプル</a>
          </li>
          <li class="listE">
            <button type="button" data-class="progressBar pb-dumpling">団子</button>
            <a href="https://codepen.io/Mryoo/pen/xxbrvGq" class="a-focHovAct">サンプル</a>
          </li>
          <li class="listE">
            <button type="button" data-class="progressBar pb-bottom pb-car">車</button>
            <a href="https://codepen.io/Mryoo/pen/vYEZoOR" class="a-focHovAct">サンプル</a>
          </li>
        </ul>
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
  <script nonce="<?=$parts['nonce']; ?>">
    const pbE = document.querySelector('.progressBar');
    const btnE = document.querySelectorAll('[data-class]');
    let currentProgressBar = 0;
    for (let i = 0; i < btnE.length; i++) {
      btnE[i].addEventListener('click', () => {
        pbE.className = btnE[i].getAttribute('data-class');
        console.log(btnE[i].getAttribute('data-class'));
        btnE[currentProgressBar].removeAttribute('class');
        currentProgressBar = i;
        btnE[i].classList.add('btn-active');
      });
    }
  </script>
</body>
</html>
