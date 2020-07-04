<?php

include $_SERVER['DOCUMENT_ROOT'] . "/library/config.php";
include $_SERVER['DOCUMENT_ROOT'] . "/library/instagram/InstagramBasicDisplay.php";
include $_SERVER['DOCUMENT_ROOT'] . "/library/instagram/InstagramBasicDisplayException.php";
use EspressoDev\InstagramBasicDisplay\InstagramBasicDisplay;

class Instagram {
    const REDIRECT_URI_LOCAL = 'https://fikom.test/admin/';
    const REDIRECT_URI_LIVE = 'https://fikomup.com/admin/';

    public $instagram;
    public $token;
    public $token_expiration;

    public function __construct() {
        $this->instagram = new InstagramBasicDisplay([
            'appId' => '291060278548687',
            'appSecret' => 'd6c0c2de66b281f811105743ff7d6854',
            'redirectUri' => self::REDIRECT_URI_LIVE
        ]);

        $token = $this->getAccessToken();
        
        if ($token) {
            $this->setAccessToken($token);
        }
    }

    //TOKEN RELATED METHOD
    function setAccessToken($token) {
        // Set user access token
        $this->instagram->setAccessToken($token);
    }

    function setOauthAccessToken($code) {
        // Get the short lived access token (valid for 1 hour)
        $token = $this->instagram->getOAuthToken($code, true);

        // Exchange this token for a long lived token (valid for 60 days)
        $token = $this->instagram->getLongLivedToken($token);

        // Set user access token
        $this->instagram->setAccessToken($token);

        //save into DB
        return $this->saveAccessToken($token->access_token, $token->expires_in);
    }   

    function getAccessToken() {
        global $mysqli;
        $query = "SELECT * FROM access_token ORDER BY expired DESC LIMIT 1";

        $result = $mysqli->query($query);
        while($data = $result->fetch_array()){
            $this->token = $data['token'];
            $this->token_expiration = $data['expired'];
        }

        return $this->token;
    }

    function saveAccessToken($token, $expired) {
        global $mysqli;

        $expired = date('Y-m-d', strtotime(date('Y-m-d')) + $expired);
        $query = "INSERT INTO access_token SET
            token = '$token',
            expired = '$expired'
        ";

        $result = $mysqli->query($query);

        return $token;
    }

    function refreshToken($token) {
        return $this->instagram->refreshToken($token);
    }
    
    function validToken($token) {
        global $mysqli;

        $result = $mysqli->query("SELECT * FROM access_token WHERE token = '$token'");
        $result = $result->fetch_array();

        $expired_date = $result['expired'];

        return date('Y-m-d') < $expired_date;
    }

    function getLoginUrlIg() {
        echo "<a href='{$this->instagram->getLoginUrl()}'>Login with Instagram</a>";
    }

    //MEDIA RELATED METHOD
    function getUserProfile(){
        return $this->instagram->getUserProfile();
    }

    function getUserMedia($limit){
        return $this->instagram->getUserMedia('me', $limit);
    }
}
?>