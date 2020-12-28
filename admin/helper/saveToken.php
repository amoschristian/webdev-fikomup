<?php
include $_SERVER['DOCUMENT_ROOT'] . "/library/instagram/Instagram.php";

    if ($_POST) {
        $instagram = new Instagram;
        $token = $_POST['token'];
        $expired = $_POST['expired'];

        if ($instagram->saveTokenManual($token, $expired)) {
            return true;
        }

        return false;
    }
    
?>