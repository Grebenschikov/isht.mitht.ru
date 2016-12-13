<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?=$title?></title>
	<link rel="stylesheet" type="text/css" href="/app.css">
	<meta name="yandex-verification" content="4cbc78b86d3340b9" />
</head>
<body>
<div class="header">
	<div class="header__wrapper">
		<div class="header__logo-container">
			<a href="/"><img src="/images/logo.png"></a>
		</div>
		<div class="header__title-container">
			<div class="header__title"><a href="/" class="header__anchor">Кафедра информационых систем в химической технологии</a></div>
			<div class="header__subtitle">Московский технологический университет</div>
		</div>
	</div>
</div>
<div class="body">
	<div class="body__wrapper">
		<div class="body__left">
			<ul class="menu">
				<?php foreach($pages as $link => $title):?>
					<li class="menu__item">
						<?php if ($link == $page): ?>
							<a class="menu__anchor menu__anchor_active" href="/<?=$link == 'index' ? '' : $link?>">
								<?=$title?>
							</a>
						<?php else: ?>
							<a class="menu__anchor" href="/<?=$link == 'index' ? '' : $link?>"><?=$title?></a>
						<?php endif;?>
					</li>
				<?php endforeach;?>
			</ul>
		</div>
		<div class="body__right content">
			<?=$content?>
		</div>
	</div>
</div>
<div class="footer">
	<div class="footer__wrapper">
		<a href="/" class="footer__title">Кафедра информационных систем в химической технологии</a>
		<span class="footer__copyright">Московский технологический университет &copy; 2016</span>
	</div>
</div>
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
