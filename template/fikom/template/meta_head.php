<?php
$folder_template = web_info('url') . '/' . folder_template();

$css_array = [
    "styles/bootstrap4/bootstrap.min.css",
    "plugins/fontawesome-free-5.0.1/css/fontawesome-all.css",
    "plugins/OwlCarousel2-2.2.1/owl.carousel.css",
    "plugins/OwlCarousel2-2.2.1/owl.theme.default.css",
    "plugins/OwlCarousel2-2.2.1/animate.css",
    "styles/main_styles.css",
    "styles/responsive.css",
];

$extra_css = [];
switch ($module) {
    case 'news':
    case 'news_detail':
        $extra_css = [
            "styles/news_styles.css",
            "styles/news_responsive.css"
        ];
        break;

    case 'event':
        $extra_css = [
            "styles/news_styles.css",
            "styles/news_responsive.css"
        ];
        break;
    
    default:
        # code...
        break;
}

$css_array = array_merge($css_array, $extra_css);
?>

<head>
    <title>Fikom UP</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Fikom UP">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    foreach ($css_array as $css) {
        $css_link = $folder_template . '/' . $css;
        echo "<link rel='stylesheet' type='text/css' href='$css_link'>";
    }
    ?>
</head>