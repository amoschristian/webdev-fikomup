<?php
error_reporting();
ob_start();

include "library/config.php";
include "library/function_date.php";
include "library/function_antiinjection.php";
include "library/function_template.php";
include "library/function_image.php";

GLOBAL $module;

setlocale(LC_TIME, 'ID'); //set tanggal ke Indonesia

$content = (isset($_GET['content'])) ? str_replace('-', '_', $_GET['content']) : "home";
$page    = array('home', 'about_us', 'news', 'event', 'contact', 'event_detail', 'news_detail');

$module = $content;

$not_found_file = folder_template() . '/404.php';
if (in_array($content, $page)) {
    $template_file = folder_template() . '/' . $content . '.php';
    if (file_exists($template_file)) {
        include $template_file;
        exit;
    }
}

include $not_found_file;

?>