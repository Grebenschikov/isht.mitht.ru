<div class="content__title">Учебные материалы</div>
<div class="content__text">
  <?php 
    $tessie = @file_get_contents('http://tessie.mitht.rssi.ru/it/it.html');
    if (!$tessie || !preg_match('|<body>(.*)</body>|sUS', $tessie, $data)) {
      echo 'Не удалось получить данные';
    } else {
      $res = str_replace(array('<a href="pdf', '<img src="ris', '<hr>'), array('<a target="_blank" href="/files/pdf', '<img src="/files/ris', ''), $data[0]);
      $res = preg_replace('/[\ \t\r\n]+/', ' ', $res);
      echo $res;
    }
  ?>
</div>