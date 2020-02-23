<?php

function print_image($file_name) {
    $image = "/media/source/$file_name";
    $relative_path_image = $_SERVER['DOCUMENT_ROOT']."/media/source/$file_name";
    if(file_exists($relative_path_image) && $file_name != "") {
        return $image;
    }
    return "/media/source/not_found.png";
}

?>