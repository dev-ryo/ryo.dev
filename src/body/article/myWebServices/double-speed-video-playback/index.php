<?php
  require_once($_SERVER['DOCUMENT_ROOT'].'/../BNHG7nx88aBa/article6.php');

  $page = new Page();
  $me = $page->me;

  $url = "https://ryo.dev/article/myWebServices/double-speed-video-playback/";
  $title = "【概要】動画倍速再生";
  $desc = "サービス最終更新日：2020.05.23　動画をドラッグ＆ドロップするだけでブラウザ上で好みの速さで再生できます。会員登録不要。";
  $page->twCard = 'summary_large_image';
  $page->twImg = 'https://ryo.dev/article/myWebServices/double-speed-video-playback/img/play.jpg';
  $originalCSS = "/article/myWebServices/double-speed-video-playback/style_min.css";
  $datePublished = '2020-05-22';
  $dateModified = '2020-06-10';
  $breadcrumbList = [
    ["name" => "HOME", "item" => $me['hp']],
    ["name" => "記事", "item" => $me['articleCategory']['all']['link']],
    ["name" => $me['articleCategory']['myWebServices']['name'], "item" => $me['articleCategory']['myWebServices']['link']]
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
          <?php forEach($breadcrumbList as $ePage): ?>
            <li class="breadcrumbs-list">
              <a href="<?= $ePage["item"]; ?>" class="breadcrumbs-list-link"><?= $ePage["name"]; ?></a>
            </li>
          <?php endforeach; ?>
        </ul>
        <p class="lastUpdated">最終更新日：<time datetime="<?= $dateModified; ?>"><?= str_replace('-', '.', $dateModified); ?></time></p>
        <h1><?=$title; ?></h1>

        <ol class="tableOfContents" aria-label="目次">
          <li class="toc-li"><a href="#about" class="toc-a">動画を倍速で再生するサービスを作りました！</a></li>
          <li class="toc-li"><a href="#reason" class="toc-a">きっかけ</a></li>
          <li class="toc-li"><a href="#feature" class="toc-a">特徴</a></li>
          <li class="toc-li"><a href="#item" class="toc-a">画像・アイコン・コード</a></li>
          <li class="toc-li"><a href="#thanks" class="toc-a">謝辞</a></li>
          <li class="toc-li"><a href="#contact" class="toc-a">最後に</a></li>
        </ol>
      </div>

      <section id="about">
        <h2>動画を倍速で再生するサービスを作りました！</h2>
        <div class="p1">
          <p class="p2">動画をドラッグ＆ドロップしてください。もしくは、画面をクリックするとデバイスのストレージが開くので、動画を選択してください。</p>
          <picture class="p2">
            <source srcset="img/top.webp" type="image/webp">
            <source srcset="img/top.jpg" type="image/jpg">
            <img src="img/top.jpg" alt="動画倍速サービスのトップページ" class="fullWidthImg">
          </picture>
        </div>
        <div class="p1">
          <p class="p2">その動画をブラウザ上で再生できます。しかも、<strong>再生速度を変えられます</strong>！</p>
          <picture class="p2">
            <source srcset="img/play.webp" type="image/webp">
            <source srcset="img/play.jpg" type="image/jpg">
            <img src="img/play.jpg" alt="動画倍速サービスの動画再生画面" class="fullWidthImg">
          </picture>
        </div>
        <p class="p1">作ったきっかけやサービスの特徴などを紹介します。</p>
        <p class="p1"><a href="https://ryo.dev/service/double-speed-video-playback/" class="toService">使ってみる</a></p>
      </section>

      <section id="reason">
        <h2>きっかけ</h2>
        <p class="p1">僕には大学生の弟がいます。新型コロナウイルスの影響で弟はオンライン授業を受講しています。教授から送られてくる講義動画を見て勉強しているのですが、先生の話スピードが遅いことに不満を感じていました。</p>
        <p class="p1">自分でもいろいろ試行錯誤していたようです。動画を飛ばし飛ばししてみたものの内容が理解できない。音声をスマホで録音して倍速再生してみたものの講義動画は数十分の長さがあるので手間がかかりすぎるし映像とマッチさせるのが面倒。</p>
        <p class="p1">僕がパッと思いついたのはYouTubeにアップロードすることでした。YouTubeなら倍速再生できますからね。ただ、一般公開するのは問題ありそうなので、自分だけしか見れないように設定する必要がありますが。これも手間がかかりますね。じゃあ動画を倍速再生するWebサービスはないのだろうか。検索してみた。1分くらい探しましたが、ソフトインストール型のものしか見つかりませんでした。</p>
        <p class="p1">「じゃあ作るか」</p>
        <p class="p1">もしかしたら弟と同じ悩みを持つ学生がいるかもしれません。そんな彼らにはきっと需要があるはずだと考え、作ることにしました。</p>
      </section>

      <section id="feature">
        <h2>特徴</h2>
        <ul class="p1">
          <li>会員登録不要。</li>
          <li>トリセツ不要。秒で使いこなせます。</li>
          <li>動画はどこにも保存されません。</li>
          <li>再生速度は0.1刻みで自由に指定できます。</li>
        </ul>
      </section>

      <section id="item">
        <h2>画像・アイコン・コード</h2>
        <p class="p1">トップページの文字上の画像は<a href="https://undraw.co/illustrations">unDraw</a>さんから拝借しました。</p>
        <p class="p1">メーターアイコンと左矢印アイコンは<a href="https://fontawesome.com/">Font Awesome</a>さんから拝借しました。</p>
        <p class="p1">ドラッグ＆ドロップのコードは<a href="https://web.dev/read-files/#select-dnd">Read files in JavaScript</a>の記事を参考にしました。</p>
        <p class="p1">ファイルを読み込んで表示させるためのコードは<a href="https://developer.mozilla.org/ja/docs/Web/HTML/Element/Input/file">&lt;input type="file"&gt; - HTML: HyperText Markup Language | MDN</a>の記事を参考にしました。</p>
        <p class="p1">本サービスの機能を作るコードはすべてJavaScriptなので、デベロッパーツールからコードを確認できます。</p>
      </section>

      <section id="thanks">
        <h2>謝辞</h2>
        <figure>
          <figcaption class="p2">このサービスについて<a href="https://twitter.com/ryoo_s_s/status/1263746576096415751">Twitterで紹介</a>したところ、明治大学で教鞭をとっておられる水田周平先生（<a href="https://twitter.com/Johnevang">@Johnevang</a>）にリツイートしていただきました！</figcaption>
          <picture class="p2">
            <source srcset="img/retweet.webp" type="image/webp">
            <source srcset="img/retweet.jpg" type="image/jpg">
            <img src="img/retweet.jpg" alt="このサービスの紹介ツイートを水田先生がリツイート" class="fullWidthImg">
          </picture>
        </figure>
        <p class="p2 rtDate">RT日時：2020.06.10</p>
        <p class="p2">ありがとうございましたm(__)m</p>
      </section>

      <section id="contact">
        <h2>最後に</h2>
        <p>誤った情報を見つけたり、お聞きしたいことがあったり、動画倍速再生サービスのバグを見つけたりしましたら、<a href="<?=$me["contact"]["tw2"]; ?>">TwitterのDM</a>か<a href="mailto:<?=$me["contact"]["mail"]; ?>">メール</a>までご連絡ください。</p>
      </section>
    </main>

    <?php include($page->root.$page->html["footer"]); ?>
</body>
</html>
