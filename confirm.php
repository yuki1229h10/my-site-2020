<?php
session_start();

if (!isset($_SESSION['form'])) {
  header('Location: index.php');
  exit();
} else {
  $post = $_SESSION['form'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $to = 'yuki1229.h10@i.softbank.jp';
  $from = $post['email'];
  $subject = 'お問い合わせが届きました';
  $body = <<<EOT
名前： {$post['name']}
メールアドレス： {$post['email']}
内容：
{$post['contact']}
EOT;
  mb_send_mail($to, $subject, $body, "From: {$from}");
  unset($_SESSION['form']);
  header('Location: thanks.html');
  exit();
}
?>

<!DOCTYPE html>
<html lang="ja" prefix="og: サイトURL#">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width">
  <title>Yuki - ポートフォリオ -</title>
  <meta name="description" content="Yukiの過去に作成した模写や保有スキルを掲載しています。">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <link rel="stylesheet" href="css/style.css" media="all">
</head>

<body>
  <main>

    <section class="confirm jumbotron">
      <div class="confirm__inner jumbotron__inner">
        <div class="confirm__body">
          <form action="" method="POST">
            <h2 class="confirm__title">お問い合わせ</h2>
            <dl class="confirm__list">
              <dt class="confirm__item">お名前：</dt>
              <dd class="confirm__detail"><?php echo htmlspecialchars($post['name']); ?></dd>
            </dl>
            <dl class="confirm__list">
              <dt class="confirm__item">メールアドレス：</dt>
              <dd class="confirm__detail"><?php echo htmlspecialchars($post['email']); ?></dd>
            </dl>
            <dl class="confirm__list confirm__list-contact">
              <dt class="confirm__item-contact">内容</dt>
              <dd class="confirm__detail"><?php echo nl2br(htmlspecialchars($post['contact'])); ?></dd>
            </dl>
            <div class="confirm__buttons">
              <!-- <button href="index.php" class="confirm__btn btn">戻る</button> -->
              <button type="submit" class="confirm__btn btn">送信する</button>
            </div>
          </form>
        </div>
      </div>
    </section>
    <!-- confirm close -->

  </main>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="js/main.js"></script>
  <script src="js/hero-slider.js"></script>
  <script src="js/script.js"></script>
</body>

</html>