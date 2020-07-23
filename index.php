<?php
error_reporting();
ob_start();

include "library/config.php";
include "library/function_date.php";
include "library/function_antiinjection.php";
include "library/function_template.php";
include "library/function_image.php";
include "library/translate/Lang.php";

session_start();

GLOBAL $module;
GLOBAL $default_language;
GLOBAL $language;

global $mapBoxToken;
$mapBoxToken = 'pk.eyJ1IjoiYW1vc2NocmlzdGlhbiIsImEiOiJjazdvN2t1MGswNm13M3RwMHU4Y245M2IwIn0.CCTCS5dyJEhkFcz5dE4G1A';

if (!isset($_SESSION['translate'])) {
    $_SESSION['translate'] = new Lang;
}

$lang = $_SESSION['translate'];
$default_language = $lang::DEFAULT_LANGUAGE;

$new_language = (isset($_GET['lang'])) ? $_GET['lang']: "";

$_SESSION['language'] = $lang->language;
setlocale(LC_TIME, strtoupper($lang->language));

if ($new_language) {
    $_SESSION['translate'] = new Lang($new_language); //when switch language init it again
    $_SESSION['language'] = $lang->language;
    setlocale(LC_TIME, strtoupper($lang->language));
    header("Location: /"); 
}

$content = (isset($_GET['content'])) ? str_replace('-', '_', $_GET['content']) : "home";
$page    = array('home', 'about_us', 'news', 'event', 'contact', 'event_detail', 'news_detail', 'admission', 'course', 'sitemap', 'partners', 'devotion', 'devotion_detail', 'research', 'research_detail');

$module = $content;

$not_found_file = folder_template() . '/404.php';

GLOBAL $sub_page;
GLOBAL $halaman;

$halaman = (isset($_GET['hal'])) ? $_GET['hal'] : "1";

$default_page = [
    'about_us' => 'history',
    'admission' => 'information',
    'course' => 'elearning',
    'partners' => ''
];

if (in_array($content, ['about_us', 'admission', 'course', 'partners'])) { //if about us, use special case
    $sub_page =  (isset($_GET['tag'])) ? str_replace('-', '_', $_GET['tag']) : $default_page[$content];
}

if (in_array($content, $page)) {
    $template_file = folder_template() . '/' . $content . '.php';
    if (file_exists($template_file)) {
        include $template_file;
        exit;
    }
}

include $not_found_file;

?>