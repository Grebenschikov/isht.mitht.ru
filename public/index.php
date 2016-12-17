<?php

date_default_timezone_set("Europe/Moscow");

if (isset($_SERVER["REMOTE_ADDR"]) && $_SERVER["REMOTE_ADDR"] == "127.0.0.1") {
  ini_set("display_errors", "on");
  error_reporting(E_ALL);
} else {
  ini_set("display_errors", "off");
}

$pages = array(
  "" => "О кафедре",
  "history" => "История кафедры",
  "partners" => "Предприятия партнеры",
  "tech" => "Материально-техническое обеспечение кафедры",
  "study" => "Учебные дисциплины",
  "science" => "Научная работа",
  "people" => "Сотрудники",
  "docs" => "Учебные материалы"
);

$page = "404";
$title = "Страница не найдена";

if (preg_match("/^\/([^?]*)/", $_SERVER["REQUEST_URI"], $matches)) {
  $path = $matches[1];
  if (array_key_exists($path, $pages)) {
    $page = $path;
    $title = $pages[$path];
  }
}

$params = array(
  "title" => $title,
  "page" => $page,
  "content" => tpl(empty($page) ? "index" : $page)
);

if (array_key_exists("HTTP_X_REQUESTED_WITH", $_SERVER)) {
  header("Content-Type: application/json");
  echo json_encode($params);
} else {
  $params["pages"] = $pages;
  echo tpl("layout", $params);
}

function tpl($tpl, array $vars = []) {
  $dir = dirname(__FILE__) . "/..";
  ob_start();
  extract($vars);
  require("{$dir}/pages/{$tpl}.php");
  return ob_get_clean();
}