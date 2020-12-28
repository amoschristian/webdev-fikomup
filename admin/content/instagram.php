<?php
include "../library/instagram/Instagram.php";

$instagram = new Instagram;

$token = $instagram->getAccessToken(); //get from DB

$igCode = isset($_GET['ig_code']) ? $_GET['ig_code'] : '';

if ($igCode) { //Refresh Token
    $token = $instagram->setOauthAccessToken($igCode); //get from API then save to DB
}

$instagram->setAccessToken($token);

$profile = $instagram->getUserProfile();

$status = ($profile ? "Berjalan Normal" : "Sedang Mengalami Gangguan, Hubungi Administrator");

$token_display =  str_repeat("*", strlen($token) - 10) . substr($token, -10);
?>

<table class="table table-striped">
    <thead>
        <tr>
            <th colspan="2">
                <h3><b>Instagram</b></h3>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php if ($profile) : ?>
            <tr>
                <td><b>Akun</b></td>
                <td>: <?= (isset($profile->username) ? $profile->username : "-") ?></td>
            </tr>
            <tr>
                <td><b>Tipe Akun</b></td>
                <td>: <?= (isset($profile->account_type) ? $profile->account_type : "-") ?></td>
            </tr>
            <tr>
                <td><b>Jumlah Gambar</b></td>
                <td>: <?= (isset($profile->media_count) ? $profile->media_count : "-") ?></td>
            </tr>
        <?php endif; ?>
        <tr>
            <td><b>Token</b></td>
            <td>: <?= $token_display ?></td>
        </tr>
        <tr>
            <td><b>Tanggal Kadaluarsa Token</b></td>
            <td>: <?= strftime("%d %B %Y", strtotime($instagram->token_expiration)); ?></td>
        </tr>
        <tr>
            <td><b>Status</b></td>
            <td>: <?= $status ?></td>
        </tr>
    </tbody>
</table>

<h3><b>Token Renewal</b></h3>
<div class="ig-token-btn">
    <?php $instagram->getLoginUrlIg(); ?>
</div>
<br>

<h4>Atau dengan memasukan manual dengan form dibawah ini</h4>

<form action="post" id="form">
    <table class="table table-striped">
        <tbody>
            <tr>
                <td class="col-md-2"><b>Token</b></td>
                <td class="cold-md-10">: <input type="text" name="token" size="100"></td>
            </tr>
            <tr>
                <td class="col-md-2"><b>Tanggal Kadaluarsa Token</b></td>
                <td class="cold-md-10">: <input type="text" name="expired"> <span class="expired-help">(contoh: <?= date("Y-m-d") ?>)</span></td>
            </tr>
            <tr>
                <td><a class="btn btn-primary" id="save-token">Simpan</a></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</form>

<script>
    $('#save-token').off().on('click', function(e) {
        e.preventDefault();

        var form = $('#form').serializeArray();

        $.ajax({
            type: "POST",
            url: "/admin/helper/saveToken.php",
            data: form,
            success: function(data) {
                location.reload();
            }
        });
    });
</script>