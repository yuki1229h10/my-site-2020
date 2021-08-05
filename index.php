<?php
session_start();
$error = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

  if ($post['name'] === '') {
    $error['name'] = 'blank';
  }
  if ($post['email'] === '') {
    $error['email'] = 'blank';
  } else if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
    $error['email'] = 'email';
  }
  if ($post['contact'] === '') {
    $error['contact'] = 'blank';
  }

  if (count($error) === 0) {
    $_SESSION['form'] = $post;
    header('Location: confirm.php');
    exit();
  }
} else {
  if (isset($_SESSION['form'])) {
    $post = $_SESSION['form'];
  }
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

    <!-- header -->
    <header class="header">
      <a class="header__hm-btn" id="header__hm-btn">
        <div></div>
        <div></div>
        <div></div>
      </a>
      <nav class="header__hm-menu" id="header__hm-menu">
        <ul class="header__hm-list">
          <li class="header__hm-item">
            <ul class="header__hm-icons">
              <li class="header__hm-icon"><a href="https://twitter.com/555_yuki_prog" class="twitter"><i class="fab fa-twitter-square"></i></a></li>
              <li class="header__hm-icon"><a href="https://www.facebook.com/yukizemba.12" class="facebook"><i class="fab fa-facebook-square"></i></a></li>
            </ul>
          </li>
          <li class="header__hm-item"><a href="#about" class="header__hm-link">ABOUT</a></li>
          <li class="header__hm-item"><a href="#works" class="header__hm-link">WORKS</a></li>
          <li class="header__hm-item"><a href="#skill" class="header__hm-link">SKILL</a></li>
          <li class="header__hm-item"><a href="#contact" class="header__hm-link">CONTACT</a></li>
        </ul>
      </nav>
      <nav class="header__inner">
        <p class="header__name">Yuki</p>
        <div class="header__nav-wrapper">
          <ul class="header__nav-left">
            <li class="header__nav-item"><a href="#about" class="header__nav-link">ABOUT</a></li>
            <li class="header__nav-item"><a href="#works" class="header__nav-link">WORKS</a></li>
            <li class="header__nav-item"><a href="#skill" class="header__nav-link">SKILL</a></li>
          </ul>
          <ul class="header__nav-right">
            <li class="header__nav-item"><a href="#contact" class="header__nav-link">CONTACT</a></li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- header close -->

    <!-- mv -->
    <section class="jumbotron">
      <div class="jumbotron__inner">
        <h1 class="jumbotron__title">
          Hi, Welcome to my Website<br>Please tell me what you want to the Internet.
        </h1>
        <a href="#contact" class="btn jumbotron__btn">Contact</a>
      </div>
    </section>
    <!-- mv close -->

    <!-- about -->
    <section class="about" id="about">
      <div class="cap">
        <h2 class="cap__title">ABOUT</h2>
      </div>
      <div class="about__wrapper wrapper">
        <div class="about__body">
          <div class="about__col2 about__col2-mg-right">
            <hgroup>
              <h2 class="about__name">Yuki Zemba</h2>
              <h3 class="about__job">Web designer</h3>
            </hgroup>
            <figure class="about__img-wrapper">
              <img src="img/Yuki.jpg" alt="Yukiの写真">
            </figure>
            <p class="about__text">
              着実な成果を出せるエンジニアに。
            </p>
          </div>
          <div class="about__col2">
            <dl class="about__list">
              <dt class="about__item">出身&nbsp;&nbsp;</dt>
              <div class="about__column">
                <dd class="about__detail">
                  <span class="about__detail-text">神奈川県</span>
                </dd>
              </div>
            </dl>
            <dl class="about__list">
              <dt class="about__item">経歴&nbsp;&nbsp;</dt>
              <div class="about__column">
                <dd class="about__detail">
                  2014.3
                  <span class="about__detail-text">伊勢原中学校 卒業</span>
                </dd>
                <dd class="about__detail">
                  2017.3
                  <span class="about__detail-text">立花学園高等学校 卒業</span>
                </dd>
                <dd class="about__detail">
                  2021.3
                  <span class="about__detail-text">桜美林大学 卒業予定</span>
                </dd>
              </div>
            </dl>
            <dl class="about__list">
              <dt class="about__item">資格&nbsp;&nbsp;</dt>
              <div class="about__column">
                <dd class="about__detail">
                  2016.3
                  <span class="about__detail-text">英検準二級</span>
                </dd>
                <dd class="about__detail">
                  2019.3
                  <span class="about__detail-text">TOEFL ITP 500</span>
                </dd>
                <dd class="about__detail">
                  2019.10
                  <span class="about__detail-text">普通自動車運転免許</span>
                </dd>
                <dd class="about__detail">
                  2020.10
                  <span class="about__detail-text">公認コーチングアシスタント</span>
                </dd>
              </div>
            </dl>
            <dl class="about__list">
              <dt class="about__item">趣味&nbsp;&nbsp;</dt>
              <div class="about__column">
                <dd class="about__detail">
                  <span class="about__detail-text">読書・音楽・ゲーム</span>
                </dd>
                <dd class="about__detail">
                  <span class="about__detail-text">バレーボール・スノーボード</span>
                </dd>
                <dd class="about__detail">
                  <span class="about__detail-text">トレーニング</span>
                </dd>
              </div>
            </dl>
          </div>
        </div>
      </div>
    </section>
    <!-- about close -->

    <!-- works -->
    <section class="works" id="works">
      <div class="cap">
        <h2 class="cap__title">WORKS</h2>
      </div>
      <div class="works__global-container" id="global-container">
        <div class="works__container" id="container">
          <div class="works__content" id="content">
            <div class="works__hero hero">
              <div class="works__swiper-container swiper-container">
                <div class="works__swiper-wrapper swiper-wrapper">
                  <div class="works__swiper-slide swiper-slide js-modal-open" data-target="modal01">
                    <div class="works__hero-title hero__title">Write 模写</div>
                    <img class="works__img" src="img/Write.jpg" alt="Writeの模写">
                  </div>
                  <div class="works__swiper-slide swiper-slide js-modal-open" data-target="modal02">
                    <div class="works__hero-title hero__title">Isara 模写</div>
                    <img class="works__img" src="img/Isara.jpg" alt="Isaraの模写">
                  </div>
                  <div class="works__swiper-slide swiper-slide js-modal-open" data-target="modal03">
                    <div class="works__hero-title hero__title">Airbnb 模写</div>
                    <img class="works__img" src="img/Airbnb.png" alt="Airbnbの模写">
                  </div>
                </div>
                <div class="works__hero-footer hero__footer">
                  <img class="works__hero-downarrow hero__downarrow" src="img/arrow.svg" alt="">
                  <span class="works__hero-scrolltext hero__scrolltext">scroll</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="works__wrapper wrapper">
        <div class="works__card js-fadein">
          <div class="works__card-left">
            <h2 class="works__card-title">Wordpress</h2>
            <b class="works__card-sub-title">Corporate site</b>
            <p class="works__card-text">Topの事例部分と料金部分はカスタムフィールドでクライアント様からも変更しやすくしており、お知らせ部分はカスタム投稿タイプで対応しました。
              <br>
              また、記事ページでは関連記事やおすすめ記事を実装しており、記事をSNSでも共有できるようにしております。
              <br>
              お問い合わせフォームでは自動返信メールの設定なども行っています。
            </p>
            <div class="works__card-link-wrapper">
              <a href="https://engress.yuki-effort.com/copy/" class="works__card-link">Wordpressサイトへ</a>
              <p class="works__error" style="color: silver; font-weight: bold;">ユーザー名・パスワード:yyy</p>
            </div>
          </div>
          <figure class="works__card-img-wrapper">
            <img class="works__card-img" src="img/mv.png" alt="Wordpressの成果">
          </figure>
        </div>
        <div class="works__card works__card-reverse js-fadein">
          <div class="works__card-left">
            <h2 class="works__card-title">Design</h2>
            <b class="works__card-sub-title">Original site</b>
            <p class="works__card-text">この作品のテーマは宇宙です。
              <br>
              それを体現する言葉と四つの太陽系の惑星から宇宙を表現できるようにしました。
              <br>
              flexboxを用いてバランスの取れたデザインに仕上げました。
            </p>
          </div>
          <figure class="works__card-img-wrapper">
            <img class="works__card-img" src="img/Planet.png" alt="自己制作サイトの成果">
          </figure>
        </div>
      </div>
    </section>
    <!-- works close -->

    <!-- skill -->
    <section class="skill" id="skill">
      <div class="cap">
        <h2 class="cap__title">SKILL</h2>
      </div>
      <div class="skill__wrapper wrapper">
        <div class="skill__card-col2">
          <div class="skill__card js-fadein">
            <div class="skill__flex">
              <p class="skill__icon"><i class="fab fa-html5"></i></p>
              <hgroup class="skill__column">
                <h2 class="skill__name">HTML</h2>
                <h3 class="skill__stars skill__stars-yellow">★★★<span class="skill__stars skill__stars-silver"></span>
                </h3>
              </hgroup>
            </div>
            <p class="skill__text">BEM手法を使用して保守性に優れたサイト制作を心がけております。</p>
          </div>
          <div class="skill__card js-fadein">
            <div class="skill__flex">
              <p class="skill__icon"><i class="fab fa-sass"></i></p>
              <hgroup class="skill__column">
                <h2 class="skill__name">SASS</h2>
                <h3 class="skill__stars skill__stars-yellow">★★★<span class="skill__stars skill__stars-silver"></span>
                </h3>
              </hgroup>
            </div>
            <p class="skill__text">BEMとセットで使うことで追加修正に強いスタイリングを可能にしました。</p>
          </div>
          <div class="skill__card js-fadein">
            <div class="skill__flex">
              <p class="skill__icon"><i class="fab fa-js"></i></p>
              <hgroup class="skill__column">
                <h2 class="skill__name">JavaScript</h2>
                <h3 class="skill__stars skill__stars-yellow">★<span class="skill__stars skill__stars-silver">★★</span>
                </h3>
              </hgroup>
            </div>
            <p class="skill__text">jQuery、ライブラリを使用したアニメーションをサイトに付加させます。</p>
          </div>
          <div class="skill__card js-fadein">
            <div class="skill__flex">
              <p class="skill__icon"><i class="fab fa-wordpress"></i></p>
              <hgroup class="skill__column">
                <h2 class="skill__name">WordPress</h2>
                <h3 class="skill__stars skill__stars-black">★★<span class="skill__stars skill__stars-silver">★</span>
                </h3>
              </hgroup>
            </div>
            <p class="skill__text">静的サイトを誰でも運用可能な動的サイトに仕上げます。</p>
          </div>
        </div>
      </div>
    </section>
    <!-- skill close -->

    <!-- contact -->
    <section class="contact" id="contact">
      <div class="cap">
        <h2 class="cap__title">CONTACT</h2>
      </div>
      <div class="contact__wrapper wrapper">
        <div class="contact__cta-area js-fadein">
          <h2 class="contact__cta-title">お問い合わせ</h2>
          <p class="contact__cta-text">気になることがございましたら、お気軽にご連絡ください。</p>
        </div>
        <form action="" method="POST" novalidate>
          <ul class="contact__list js-fadein">
            <li class="contact__item">
              <label for="name">Name</label>
              <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($post['name']); ?>" placeholder="お名前" required autofocus>
              <?php if ($error['name'] === 'blank') : ?>
                <p class="contact__error">※お名前をご記入下さい</p>
              <?php endif; ?>
            </li>
            <li class="contact__item">
              <label for="email">Email</label>
              <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($post['email']); ?>" placeholder="メールアドレス" required>
              <?php if ($error['email'] === 'blank') : ?>
                <p class="contact__error">※メールアドレスをご記入下さい</p>
              <?php endif; ?>
              <?php if ($error['email'] === 'email') : ?>
                <p class="contact__error">※メールアドレスを正しくご記入ください</p>
              <?php endif; ?>
            </li>
            <li class="contact__item">
              <label for="contact">Message</label>
              <textarea name="contact" id="contact" placeholder="お問い合わせ" required><?php echo htmlspecialchars($post['contact']); ?></textarea>
              <?php if ($error['contact'] === 'blank') : ?>
                <p class="contact__error">※お問い合わせ内容をご記入下さい</p>
              <?php endif; ?>
            </li>
            <li class="contact__item contact__item-button">
              <button type="submit" class="btn contact__btn">Send</button>
            </li>
          </ul>
        </form>
      </div>
    </section>
    <!-- contact close -->

    <!-- footer -->
    <footer class="footer">
      <div class="footer__wrapper">
        <nav class="footer__inner">
          <div class="footer__nav-wrapper">
            <ul class="footer__nav-left">
              <li class="footer__nav-item"><a href="#about" class="footer__nav-link">ABOUT</a></li>
              <li class="footer__nav-item"><a href="#works" class="footer__nav-link">WORKS</a></li>
              <li class="footer__nav-item"><a href="#skill" class="footer__nav-link">SKILL</a></li>
            </ul>ï
          </div>
          <small class="footer__copyright">© 2021 Yuki</small>
        </nav>
      </div>
    </footer>
    <!-- footer close -->

    <!-- modal -->
    <div id="modal01" class="modal js-modal">
      <div class="modal__bg js-modal-close"></div>
      <div class="modal__content">
        <figure class="modal__img-wrapper">
          <img class="modal__img" src="img/Write_content.png" alt="Write模写の全体像">
        </figure>
        <a class="js-modal-close btn modal__btn" href="">Close</a>
      </div>
    </div>
    <div id="modal02" class="modal js-modal">
      <div class="modal__bg js-modal-close"></div>
      <div class="modal__content">
        <figure class="modal__img-wrapper">
          <img class="modal__img" src="img/Isara_content.png" alt="Isara模写の全体像">
        </figure>
        <a class="js-modal-close btn modal__btn" href="">Close</a>
      </div>
    </div>
    <div id="modal03" class="modal js-modal">
      <div class="modal__bg js-modal-close"></div>
      <div class="modal__content">
        <figure class="modal__img-wrapper">
          <img class="modal__img" src="img/Airbnb_content.png" alt="Airbnb模写の全体像">
        </figure>
        <a class="js-modal-close btn modal__btn" href="">Close</a>
      </div>
    </div>
    <!-- modal close -->

  </main>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="js/main.js"></script>
  <script src="js/hero-slider.js"></script>
  <script src="js/script.js"></script>
</body>

</html>