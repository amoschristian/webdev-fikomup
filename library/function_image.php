<?php

function print_image($file_name) {
    $image = "/media/source/$file_name";
    if(file_exists($image)) {
        return $image;
    } 
    return "/media/source/not_found.png";
}

?>