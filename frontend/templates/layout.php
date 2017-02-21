<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title><?=$title?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="robots" content="index, follow">
  <meta name="keywords" content="МИТХТ, ИСХТ, Кафедра информационых систем в химической технологии, Московский технологический университет">
  <meta name="description" content="Официальный сайт кафедры информационых систем в химической технологии МИТХТ.">
  <meta name="yandex-verification" content="4cbc78b86d3340b9">
  <meta name="google-site-verification" content="EppwdkGzOUtHU1ZdYJ3TblVV1o2HI12ebE-ymTDs0wk" />

  <link rel="apple-touch-icon" sizes="57x57" href="/icons/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="/icons/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="/icons/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="/icons/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="/icons/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="/icons/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="/icons/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="/icons/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="/icons/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192"  href="/icons/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/icons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="/icons/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/icons/favicon-16x16.png">
  <link rel="manifest" href="/icons/manifest.json">
  <meta name="msapplication-TileColor" content="#9869b1">
  <meta name="msapplication-TileImage" content="/icons/ms-icon-144x144.png">
  <meta name="theme-color" content="#9869b1">
</head>
<body>
<div class="header">
  <div class="header__wrapper">
    <img class="header__menu-icon" src="/images/menu.svg">
    <div class="header__logo-container">
      <a href="/" class="header__logo"></a>
    </div>
    <div class="header__title-container">
      <div class="header__short-title">
        <a href="/" class="header__anchor">
          Кафедра ИСХТ
        </a>
      </div>
      <div class="header__title">
        <a href="/" class="header__anchor">
          Кафедра информационых систем в химической технологии
        </a>
      </div>
      <div class="header__subtitle">
        Московский технологический университет
      </div>
    </div>
  </div>
</div>
<div class="body">
  <div class="body__wrapper">
    <div class="menu menu_hidden">
      <ul class="menu__container">
        <?php foreach($pages as $link => $title):?>
          <li class="menu__item">
            <a class="menu__anchor <?php if ($link == $page):?>menu__anchor_active<?php endif;?>" href="/<?=$link?>">
              <?=$title?>
            </a>
          </li>
        <?php endforeach;?>
      </ul>
    </div>
    <div class="content">
      <?=$content?>
    </div>
  </div>
</div>
<div class="footer">
  <div class="footer__wrapper">
    <a href="/" class="footer__title">
      Кафедра информационных систем в химической технологии
    </a>
    <span class="footer__copyright">
      Московский технологический университет &copy; <?=date('Y')?>
    </span>
  </div>
</div>
<link href="/app.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600&subset=cyrillic-ext" rel="stylesheet">
<!--[if lte IE 8]>
  <link rel="stylesheet" type="text/css" href="/ie.css" />
<![endif]-->
<script type="text/javascript" src="/app.js"></script>
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
  (function (d, w, c) {
    (w[c] = w[c] || []).push(function() {
      try {
        w.yaCounter41514014 = new Ya.Metrika({
          id:41514014,
          clickmap:true,
          trackLinks:true,
          accurateTrackBounce:true
        });
      } catch(e) { }
    });

    var n = d.getElementsByTagName("script")[0],
      s = d.createElement("script"),
      f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src = "https://mc.yandex.ru/metrika/watch.js";

    if (w.opera == "[object Opera]") {
      d.addEventListener("DOMContentLoaded", f, false);
    } else { f(); }
  })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/41514014" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</body>
</html>
