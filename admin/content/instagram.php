<?php
include "../library/instagram/Instagram.php";

$instagram = new Instagram;

$token = $instagram->getAccessToken(); //get from DB

if (!$instagram->validToken($token)) {
    $instagram->getLoginUrlIg();    
}

$igCode = isset($_GET['ig_code']) ? $_GET['ig_code'] : '';

if ($igCode) { //Refresh Token
    $token = $instagram->setOauthAccessToken($igCode); //get from API then save to DB
} 

$instagram->setAccessToken($token);

$profile = $instagram->getUserProfile();

$status = ($profile ? "Berjalan Normal" : "Sedang Mengalami Gangguan, Hubungi Administrator");

$token_display =  str_repeat("*", strlen($token)-10) . substr($token, -10);
?>

<table class="table table-striped">
    <thead><tr><th colspan="2"><h3><b>Instagram</b></h3></th></tr></thead>
    <tbody>
    <?php if($profile) : ?>
    <tr><td><b>Akun</b></td>	<td>: <?=  $profile->username ?></td></tr>
    <tr><td><b>Tipe Akun</b></td>	<td>: <?=  $profile->account_type ?></td></tr>
    <tr><td><b>Jumlah Gambar</b></td>	<td>: <?=  $profile->media_count ?></td></tr>
    <?php endif; ?>
    <tr><td><b>Token</b></td>	<td>: <?=  $token_display ?></td></tr>
    <tr><td><b>Tanggal Kadaluarsa Token</b></td>	<td>: <?=  strftime("%d %B %Y", strtotime($instagram->token_expiration)); ?></td></tr>
    <tr><td><b>Status</b></td>	<td>: <?=  $status ?></td></tr>
    </tbody>
</table>