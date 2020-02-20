<?php
$js_array = [
    "styles/bootstrap4/popper.js",
    "js/jquery-3.2.1.min.js",
    "styles/bootstrap4/bootstrap.min.js",
    "plugins/greensock/TweenMax.min.js",
    "plugins/greensock/TimelineMax.min.js",
    "plugins/scrollmagic/ScrollMagic.min.js",
    "plugins/greensock/animation.gsap.min.js",
    "plugins/greensock/ScrollToPlugin.min.js",
    "plugins/OwlCarousel2-2.2.1/owl.carousel.js",
    "plugins/scrollTo/jquery.scrollTo.min.js",
    "plugins/easing/easing.js",
    "js/custom.js",
    
];

$extra_js = [];
switch ($module) {
    case 'news':
        $extra_css = [
            "js/news_custom.js"
        ];
        break;

    default:
        # code...
        break;
}

$js_array = array_merge($js_array, $extra_js);

foreach ($js_array as $js) {
    $js_link = $folder_template . '/' . $js;
    echo "<script src='$js_link'></script>";
}
?>

<?php include('back.php'); ?>