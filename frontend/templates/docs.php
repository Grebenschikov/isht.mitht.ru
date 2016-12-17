<div class="content__title">Учебные материалы</div>
<div class="content__text docs">
  <?php 
    $tessie = @file_get_contents('http://tessie.mitht.rssi.ru/it/it.html');
    if (!$tessie || !preg_match('|<body>(.*)</body>|sUS', $tessie, $data)) {
      echo 'Не удалось получить данные';
    } else {
      $res = str_replace(array('<a href="pdf', '<img src="ris', '<hr>'), array('<a target="_blank" href="http://tessie.mitht.rssi.ru/it/pdf', '<img src="http://tessie.mitht.rssi.ru/it/ris', ''), $data[0]);
      echo $res;
    }
  ?>
</div>