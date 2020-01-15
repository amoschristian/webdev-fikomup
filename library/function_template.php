<?php
// Fungsi untuk mendapatkan data pada tabel setting
function web_info($parameter){
	global $mysqli;
	$query = $mysqli->query("SELECT * FROM setting WHERE parameter='$parameter'");
	$setting = $query->fetch_array();
	return $setting['nilai'];
}

// Fungsi untuk mendapatkan nama folder template yang aktif
function folder_template(){
	global $mysqli;
	$qtemplate = $mysqli->query("SELECT * FROM template WHERE aktif='Y'");
	$tpl = $qtemplate->fetch_array();
	return 'template/'.$tpl['folder'];
}

// Fungsi untuk memembuat meta header, judul website, memanggil bootstrap dan jquery
function meta_header(){
	global $mysqli;
		
	$content = (isset($_GET['content'])) ? $_GET['content'] : "home";
	if($content=="artikel"){
		$qartikel = $mysqli->query("SELECT * FROM artikel WHERE id_artikel='$_GET[id]'");
		$artikel = $qartikel->fetch_array();
		
		$judul = $artikel['judul'].' - '.web_info('judul');
		$deskripsi = $artikel['judul'];
		$keyword = $artikel['tag'];
	}else{
		$judul = web_info('judul');
		$deskripsi = web_info('deskripsi');
		$keyword = web_info('keyword');
	}	
		
	$icon = web_info('url')."/media/source/".web_info('ikon');
	
	echo'<title>'.$judul.'</title>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="robots" content="index, follow">
		<meta name="description" content="'.$deskripsi.'">
		<meta name="keywords" content="'.$keyword.'">
		<meta http-equiv="Copyright" content="'.web_info('url').'">
		<meta name="author" content="Rohi">
		<meta name="language" content="Indonesia">
		<meta name="revisit-after" content="7">
		<meta name="webcrawlers" content="all">
		<meta name="rating" content="general">
		<meta name="spiders" content="all">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		
		<link rel="shortcut icon" href="'.$icon.'" />		
		<link rel="stylesheet" type="text/css" href="'.web_info('url').'/plugin/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="'.web_info('url').'/'.folder_template().'/css/style.css">
		
		<script type="text/javascript" src="'.web_info('url').'/plugin/jquery/jquery-2.0.2.min.js"></script>
		<script src="https://www.google.com/recaptcha/api.js"></script>';	
}

// Fungsi untuk menampilkan template header pada folder template
function template_header(){
	include folder_template()."/header.php";
}

// Fungsi untuk menampilkan form pencarian
function form_pencarian($tombol = "Search", $placeholder = "Search here..."){
	echo'<form method="post" action="'.web_info('url').'/pencarian" class="form form-inline form-search">
			<input type="text" name="kata" class="form-control" placeholder="'.$placeholder.'">
			<button type="submit" class="btn btn-default">'.$tombol.'</button>
		</form>';
}

// Fungsi untuk menampilkan template footer pada folder template
function template_footer(){
	include folder_template()."/footer.php";
	echo '<script type="text/javascript" src="'.web_info('url').'/plugin/bootstrap/js/bootstrap.min.js"></script>';		
	
}

// Fungsi untuk menentukan link menu sesuai dengan jenis link (halaman, kategori atau URL)
function cari_link($rmenu){	
	global $mysqli;
	
	if($rmenu['jenis_link'] == "halaman"){
		$qhalaman = $mysqli->query("SELECT * FROM halaman WHERE id_halaman='$rmenu[link]'");
		$rhal = $qhalaman->fetch_array();
		$link = web_info('url')."/hal/$rmenu[link]/$rhal[judul_seo]";
	}elseif($rmenu['jenis_link'] == "kategori"){
		$qkategori = $mysqli->query("SELECT * FROM kategori WHERE id_kategori='$rmenu[link]'");
		$rkat = $qkategori->fetch_array();
		$link = web_info('url')."/kat/$rmenu[link]/$rkat[kategori_seo]";
	}else{
		$link = $rmenu['link'];
	}
	
	return $link;
}

// Fungsi untuk menampilkan menu
function template_menu($kategori='main'){
	global $mysqli;					
	$qmenu = $mysqli->query("SELECT * FROM menu WHERE kategori_menu='$kategori' AND induk='0' ORDER BY urut");
	while($menu = $qmenu->fetch_array()){
		$qsubmenu = $mysqli->query("SELECT * FROM menu WHERE induk='$menu[id_menu]' ORDER BY urut");
		if($qsubmenu->num_rows > 0){
			echo '<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">
					'.$menu['judul'].' <b class="caret"></b></a>
					<ul class="dropdown-menu">';
					while($sub = $qsubmenu->fetch_array()){
						echo'<li><a href="'.cari_link($sub).'">'.$sub['judul'].'</a></li>';			
					}
			echo'	</ul></li>';
		}else{
			echo'<li><a href="'.cari_link($menu).'">'.$menu['judul'].'</a></li>';
		}
	}
}

// Fungsi untuk membuat paginasi halaman
function buat_paging($link1, $link2, $batas, $jmldata, $halaktif){
	$link1 = web_info('url').'/'.$link1;
	$jmlhalaman = ceil($jmldata/$batas);
	$class = 'btn btn-sm btn-default';
	$link_halaman = '';	
	$link_halaman .= '<div style="text-align: center">';
	
	// Link ke halaman pertama (first) dan sebelumnya (prev)
	if($halaktif > 1){
		$prev = $halaktif-1;
		$link_halaman .= '<a href="'.$link1.'/1'.$link2.'" class="'.$class.'"><< First </a>  
						  <a href="'.$link1.'/'.$prev.$link2.'" class="'.$class.'">< Prev </a>';
	}
	else{ 
		$link_halaman .= '<a href="#" class="'.$class.' disabled"><< First </a>  
						  <a href="#" class="'.$class.' disabled">< Prev </a>';
	}

	// Link halaman 1,2,3, ...
	$angka = ($halaktif > 3 ? "...  " : " "); 
	for ($i=$halaktif-2; $i<$halaktif; $i++){
		if ($i < 1) continue;
		$angka .= '<a href="'.$link1.'/'.$i.$link2.'" class="'.$class.'">'.$i.'</a> ';
	}
	
	$angka .= '<a href="" class="btn btn-sm btn-primary disabled">'.$halaktif.'</a> ';
	  
    for($i=$halaktif+1; $i<($halaktif+3); $i++){
		if($i > $jmlhalaman) break;
		$angka .= '<a href="'.$link1.'/'.$i.$link2.'" class="'.$class.'">'.$i.'</a> ';
	}
	
	$angka .= ($halaktif+2<$jmlhalaman ? '... <a href="'.$link1.'/'.$jmlhalaman.$link2.'" class="'.$class.'">'.$jmlhalaman.'</a> ' : ' ');

	$link_halaman .= $angka;

	// Link ke halaman berikutnya (Next) dan terakhir (Last) 
	if($halaktif < $jmlhalaman){
		$next = $halaktif+1;
		$link_halaman .= '<a href="'.$link1.'/'.$next.$link2.'" class="'.$class.'"> Next > </a>  
						  <a href="'.$link1.'/'.$jmlhalaman.$link2.'" class="'.$class.'"> Last >> </a>';
	}
	else{
		$link_halaman .= '<a href="#" class="'.$class.' disabled"> Next > </a>  
						  <a href="#" class="'.$class.' disabled"> Last >> </a>';
	}
	
	$link_halaman .= '</div>';
	echo $link_halaman;
}

// Fungsi untuk menampilkan daftar artikel
function template_artikel($template, $limit=10, $panjang=300){	
	global $mysqli;
	
	$batas 	= $limit;	
	$hal 	= isset($_GET['hal']) ? $_GET['hal'] : 1;
	$posisi = isset($_GET['hal']) ? ($hal-1) * $batas : 0;
	
	$qartikel = $mysqli->query("SELECT * FROM artikel ORDER BY id_artikel DESC limit $posisi,$batas");
	while($r = $qartikel->fetch_array()){
		$template_artikel = $template;
		$link = web_info('url')."/artikel/$r[id_artikel]/$r[judul_seo]";
		$template_artikel = str_replace('{link}', $link, $template_artikel);
		
		if($r['gambar'] != "") $gambar = web_info('url')."/media/thumbs/".$r['gambar'];
		else $gambar = web_info('url')."/media/thumbs/blank.png";
		$template_artikel = str_replace('{gambar}',	$gambar, $template_artikel);
		
		
		$template_artikel = str_replace('{judul}', $r['judul'], $template_artikel);
		
		$quser = $mysqli->query("SELECT * FROM user WHERE id_user='$r[id_user]'");
		$u = $quser->fetch_array();			
		$meta= $u['nama_lengkap'].' | '.$r['hari'].', '.print_tanggal($r['tanggal']).' '.$r['jam'].' WIB'; 
		$template_artikel = str_replace('{meta}', $meta, $template_artikel);
		
		$konten = substr($r['isi'], 0, $panjang);
		$konten = substr($r['isi'], 0, strrpos($konten, " ") );
		$konten = str_replace("../media/", web_info('url')."/media/", $konten);
		$template_artikel = str_replace('{konten}', $konten, $template_artikel);
		
		echo $template_artikel;
	}
	
	$qartikel = $mysqli->query("SELECT * FROM artikel");
	$jmldata = $qartikel->num_rows;
	
	if($jmldata>$batas){
		echo buat_paging("home", "", $batas, $jmldata, $hal);
	}
}

// Fungsi untuk menampilkan daftar sidebar
function template_widget($tpl_judul, $awal_konten, $akhir_konten, $posisi = 1){
	global $mysqli;
	
	$qsidebar = $mysqli->query("SELECT * FROM widget WHERE posisi='$posisi' and aktif='Y' ORDER BY urut");
	while($r = $qsidebar->fetch_array()){
		echo '<div class="blok-widget">';
		$judul = $tpl_judul;
		$judul = str_replace('{judul}', $r['judul'], $judul);
		if($r['judul']!="") echo $judul;
		
		echo $awal_konten;
		if($r['tipe'] == "terbaru"){
			echo '<ul class="list-artikel">';
			$qartikel = $mysqli->query("SELECT * FROM artikel ORDER BY id_artikel DESC LIMIT 5");
			while($r = $qartikel->fetch_array()){
				echo '<li><a href="'.web_info('url').'/artikel/'.$r['id_artikel'].'/'.$r['judul_seo'].'">'.$r['judul'].'</a></li>';
			}
			echo '</ul>';
		}elseif($r['tipe'] == "populer"){
			echo '<ul class="list-artikel">';	
			$qartikel = $mysqli->query("SELECT * FROM artikel ORDER BY hits DESC LIMIT 5");	
			while($r = $qartikel->fetch_array()){
				echo '<li><a href="'.web_info('url').'/artikel/'.$r['id_artikel'].'/'.$r['judul_seo'].'">'.$r['judul'].'</a></li>';
			}
			echo '</ul>';
		}elseif($r['tipe'] == "kategori"){
			echo '<ul class="list-kategori">';
			$qartikel = $mysqli->query("SELECT * FROM kategori");
			while($r = $qartikel->fetch_array()){
				echo '<li><a href="'.web_info('url').'/kat/'.$r['id_kategori'].'/'.$r['kategori_seo'].'">'.$r['kategori'].'</a></li>';
			}
			echo '</ul>';
		}elseif($r['tipe'] == "menu"){
			echo '<ul class="menu-widget">';
			template_menu($r['id_widget']);
			echo '</ul>';
		}elseif($r['tipe'] == "skrip"){
			echo $r['konten'];
		}else{
			$qmodul = $mysqli->query("SELECT * FROM modul where id_modul='$r[konten]'");
			$mdl = $qmodul->fetch_array();
			$_FOLDER_MODUL = 'module/'.$mdl['folder'];
			include 'module/'.$mdl['folder'].'/widget.php';
		}
		
		echo $akhir_konten;		
		echo '</div>';
	}	
}

// Fungsi untuk menampilkan isi sebuah halaman
function template_halaman($template, $id){
	global $mysqli;
	
	$qhalaman = $mysqli->query("SELECT * FROM halaman WHERE id_halaman='$id'");
	$r = $qhalaman->fetch_array();
		$template_halaman = $template;
		
		$breadcrumb = '<ul class="breadcrumb">
						<li><a href="'.web_info('url').'">Home</a></li>
						<li class="active">'.$r['judul'].'</li>
					</ul>';
		$template_halaman = str_replace('{breadcrumb}', $breadcrumb, $template_halaman);
		
		
		$template_halaman = str_replace('{judul}', $r['judul'], $template_halaman);

		if($r['gambar'] != ""){
			$gambar = web_info('url')."/media/source/".$r['gambar'];
			$template_halaman = str_replace('{gambar}',	'<img src="'.$gambar.'">', $template_halaman);
		}else{
			$template_halaman = str_replace('{gambar}',	'', $template_halaman);
		}
		
		$konten = str_replace("../media/", web_info('url')."/media/", $r['isi']);
		$template_halaman= str_replace('{konten}', $konten, $template_halaman);
		
		echo $template_halaman;
	
	if($r['id_modul']!= 0){
		$qmodul = $mysqli->query("SELECT * FROM modul WHERE id_modul='$r[id_modul]'");
		$rmd = $qmodul->fetch_array();
		$_FOLDER_MODUL = 'module/'.$rmd['folder'];
		if(file_exists("module/$rmd[folder]/content.php")) include "module/$rmd[folder]/content.php";
	}
}


// Fungsi untuk menampilkan artikel detail
function template_artikel_detail($template){	
	global $mysqli;
	
	$qartikel = $mysqli->query("SELECT * FROM artikel WHERE id_artikel='$_GET[id]'");
	$r = $qartikel->fetch_array();
	
	//Menampilkan breadcrumb
	$qkategori = $mysqli->query("SELECT * FROM kategori WHERE id_kategori='$r[kategori]'");
	$rkat = $qkategori->fetch_array();
	echo'<ul class="breadcrumb">
			<li><a href="'.web_info('url').'">Home</a></li>
			<li><a href="'.web_info('url').'/kat/'.$rkat['id_kategori'].'/'.$rkat['kategori_seo'].'">'.$rkat['kategori'].'</a></li>
		</ul>';
		
	//Menampilkan artikel detail
		$template_artikel = $template;
		
		if($r['gambar'] != "") $gambar = web_info('url')."/media/source/".$r['gambar'];
		else $gambar = web_info('url')."/media/source/blank.png";
		$template_artikel = str_replace('{gambar}',	$gambar, $template_artikel);
		
		$template_artikel = str_replace('{judul}', $r['judul'], $template_artikel);
		
		$quser = $mysqli->query("SELECT * FROM user WHERE id_user='$r[id_user]'");
		$u = $quser->fetch_array();			
		$meta= $u['nama_lengkap'].' | '.$r['hari'].', '.print_tanggal($r['tanggal']).' '.$r['jam'].' WIB'; 
		$template_artikel = str_replace('{meta}', $meta, $template_artikel);
		
		$konten = str_replace("../media/", web_info('url')."/media/", $r['isi']);
		$template_artikel = str_replace('{konten}', $konten, $template_artikel);
		
		echo $template_artikel;
	
	//Menampilkan artikel terkait
	echo '<h4 class="page-header">Artikel Terkait:</h4>
			<div class="row">';
	$qkategori = $mysqli->query("SELECT * FROM artikel WHERE kategori='$r[kategori]' and id_artikel!='$r[id_artikel]' ORDER BY rand() LIMIT 4");
	while($rkat = $qkategori->fetch_array()){		
		$link = web_info('url')."/artikel/$rkat[id_artikel]/$rkat[judul_seo]";
		echo '<div class="col-md-3 col-xs-6">';
		
		if($rkat['gambar']!="") $gambar = web_info('url')."/media/thumbs/".$rkat['gambar'];
		else $gambar = web_info('url')."/media/thumbs/blak.png";
		
		echo '<img src="'.$gambar.'" width="100%">';
		echo '<br><a href="'.$link.'">'.$rkat['judul'].'</a></div>';
	}
	echo '</div>';
	
	//Update data kolom hits pada artikel
	$mysqli->query("UPDATE artikel set hits=hits+1 WHERE id_artikel='$r[id_artikel]'");
	
	//Menampilkan list komentar
	$qkomentar = $mysqli->query("SELECT * FROM komentar WHERE id_artikel='$r[id_artikel]' ORDER BY id_komentar DESC");
	$jmlkomentar = $qkomentar->num_rows;
	
	echo '<h4 class="page-header" id="header-komentar">'.$jmlkomentar.' Komentar: </h4>';
	while($rkom = $qkomentar->fetch_array()){
		$gravatar = 'http://www.gravatar.com/avatar.php?gravatar_id='.md5(strtolower($rkom['email']));
		echo '<div class="row">
				<div class="col-xs-3 col-md-2">
					<img src="'.$gravatar.'" class="gravatar">
				</div>
				<div class="col-xs-9 col-md-10">
				<b>'.$rkom['nama'].'</b><br>
				<small class="tex-muted">'.print_tanggal($rkom['tanggal']).'</small>
				<p>'.$rkom['komentar'].'</p>
				</div>
			</div><hr>';
	}

	echo '<h4 class="page-header">Isi Komentar: </h4>';
	
	//Mengatur validasi form komentar dan menyimpan komentar ke database
	if(isset($_POST['kirim-komentar'])){
		$msg = '';
		if(trim($_POST['nama'])=="") $msg .= '<li>Nama belum diisi</li>';
		if(trim($_POST['email'])=="") $msg .= '<li>Email belum diisi</li>';
		if(trim($_POST['komentar'])=="") $msg .= '<li>Komentar belum diisi</li>';
		 
		$email_pattern = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/';  
		if(!preg_match($email_pattern, $_POST['email'])) $msg .= '<li>Email tidak valid</li>';
		
		$captcha = isset($_POST['g-recaptcha-response']) ? $_POST['g-recaptcha-response'] : '';
		if($captcha == "") $msg .= '<li>Captcha belum diverifikasi</li>';
		
		$secret_key = '6Ldb7RYTAAAAANbdwAm25Ax8OiaKuF1zPqGEDpuu';
		$url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secret_key) . '&response=' . $captcha;   
	    $recaptcha = file_get_contents($url);
		$recaptcha = json_decode($recaptcha, true);
		if (!$recaptcha['success']) $msg .= '<li>Verifikasi cpatcha belum benar</li>';
	   
		if($msg==''){
			$nama = antiinjeksi($_POST['nama']);
			$email = antiinjeksi($_POST['email']);
			$komentar = addslashes($_POST['komentar']);
			$tgl = date("Y-m-d");
			
			
			$quser = $mysqli->query("SELECT * FROM user WHERE level='admin'");
			$rus = $quser->fetch_array();
			$pesan = "$nama mengirim pesan pada website ".web_info('judul');
			mail($rus['email'], "Komentar Website", $pesan);
			
			$mysqli->query("INSERT INTO komentar SET
				nama = '$nama',
				email = '$email',
				komentar = '$komentar',
				tanggal = '$tgl',
				id_artikel = '$r[id_artikel]'
			");
			
			//butuh di cek ulang $id dan $judul_seo
			// header('location: artikel/'.$id.'/'.$judul_seo.'#header-komentar');
		}else{
			echo'<div class="alert alert-warning"><ul>'.$msg.'</ul></div>
				<script> window.location.href="#form-komentar";</script>';
		}
	}
	
	//Menampilkan form komentar
	echo'<form method="post" class="form-horizontal form-komentar" id="form-komentar">';
	
	echo'<div class="form-group">
			<label for="nama" class="col-sm-2 control-label">Nama</label>
			<div class="col-sm-6">
			  <input type="text" class="form-control" name="nama" id="nama">
			</div>
		 </div>';
		 
	echo'<div class="form-group">
			<label for="email" class="col-sm-2 control-label">Email</label>
			<div class="col-sm-6">
			  <input type="text" class="form-control" name="email" id="email">
			</div>
		 </div>';
		 
	echo'<div class="form-group">
			<label for="komentar" class="col-sm-2 control-label">Komentar</label>
			<div class="col-sm-10">
			  <textarea class="form-control" name="komentar" id="komentar" cols="8"></textarea>
			</div>
		 </div>';
	echo'<div class="form-group">
			<div class="col-sm-10 col-md-offset-2">
			  <div class="g-recaptcha" data-sitekey="6Ldb7RYTAAAAAOIg65wh5cQuxzr3EsQRFBis9g3o"></div>
			</div>
		 </div>';
		 
	echo'<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-default" name="kirim-komentar">
					Kirim Komentar
				</button>
			</div>
		</div>
	</form>';
}


// Fungsi untuk menampilkan daftar artikel dalam sebuah kategori
function template_kategori($template, $limit=10, $panjang=300){
	global $mysqli;
	
	$qkategori = $mysqli->query("SELECT * FROM kategori WHERE id_kategori='$_GET[id]'");
	$rkat = $qkategori->fetch_array();
	echo'<ul class="breadcrumb">
			<li><a href="'.web_info('url').'">Home</a></li>
			<li class="active">'.$rkat['kategori'].'</li>
		</ul>';
	
	$batas 	= $limit;	
	$hal 	= isset($_GET['hal']) ? $_GET['hal'] : 1;
	$posisi = isset($_GET['hal']) ? ($hal-1) * $batas : 0;
			
	$qartikel = $mysqli->query("SELECT * FROM artikel WHERE kategori='$_GET[id]' ORDER BY id_artikel DESC  LIMIT $posisi, $batas");
	while($r = $qartikel->fetch_array()){
		$template_artikel = $template;
		$link = web_info('url')."/artikel/$r[id_artikel]/$r[judul_seo]";
		$template_artikel = str_replace('{link}', $link, $template_artikel);
		
		if($r['gambar'] != "") $gambar = web_info('url')."/media/thumbs/".$r['gambar'];
		else $gambar = web_info('url')."/media/thumbs/blank.png";
		$template_artikel = str_replace('{gambar}',	$gambar, $template_artikel);
		
		$template_artikel = str_replace('{judul}', $r['judul'], $template_artikel);
		
		$quser = $mysqli->query("SELECT * FROM user WHERE id_user='$r[id_user]'");
		$u = $quser->fetch_array();			
		$meta= $u['nama_lengkap'].' | '.$r['hari'].', '.print_tanggal($r['tanggal']).' '.$r['jam'].' WIB'; 
		$template_artikel = str_replace('{meta}', $meta, $template_artikel);
		
		$konten = substr($r['isi'], 0, $panjang);
		$konten = substr($r['isi'], 0, strrpos($konten, " ") );
		$konten = str_replace("../media/", web_info('url')."/media/", $konten);
		$template_artikel = str_replace('{konten}', $konten, $template_artikel);
		
		echo $template_artikel;
	}
	
	$qartikel = $mysqli->query("SELECT * FROM artikel WHERE kategori='$_GET[id]'");
	$jmldata = $qartikel->num_rows;
	
	if($jmldata>$batas){
		echo buat_paging('kat/'.$_GET['id'], '/'.$rkat['kategori_seo'], $batas, $jmldata, $hal);
	}
	
}

// Fungsi untuk menampilkan hasil pencarian artikel
function template_pencarian($template, $limit=20, $panjang=300){
	global $mysqli;
	
	echo'<ul class="breadcrumb">
			<li><a href="'.web_info('url').'">Home</a></li>
			<li class="active">Hasil Pencarian</li>
		</ul>';
	
	$batas 	= $limit;	
	$hal 	= isset($_GET['hal']) ? $_GET['hal'] : 1;
	$posisi = isset($_GET['hal']) ? ($hal-1) * $batas : 0;
	
	$kata = htmlentities(htmlspecialchars($_REQUEST['kata']), ENT_QUOTES);
	$arrkata = explode(" ", $kata);
	$sql = "SELECT * FROM artikel WHERE judul LIKE '%$kata%' OR isi LIKE '%$kata%'";
	
	foreach($arrkata as $rkata){
		$sql .= " OR judul LIKE '%$rkata%' OR isi LIKE '%$rkata%'";
	}

	$sql .= " ORDER BY id_artikel DESC";		
	$sql1 =  $sql." LIMIT $posisi, $batas";
	$qartikel = $mysqli->query($sql1);
	
	echo '<h3>Hasil pencarian dari kata <b style="color: blue">'.$kata.'</b></h3>';
	
	while($r = $qartikel->fetch_array()){
		$template_artikel = $template;
		
		$link = web_info('url')."/artikel/$r[id_artikel]/$r[judul_seo]";
		$template_artikel = str_replace('{link}', $link, $template_artikel);
		
		if($r['gambar'] != "") $gambar = web_info('url')."/media/thumbs/".$r['gambar'];
		else $gambar = web_info('url')."/media/thumbs/blank.png";
		$template_artikel = str_replace('{gambar}',	$gambar, $template_artikel);
		
		$template_artikel = str_replace('{judul}', $r['judul'], $template_artikel);
		
		$quser = $mysqli->query("SELECT * FROM user WHERE id_user='$r[id_user]'");
		$u = $quser->fetch_array();			
		$meta= $u['nama_lengkap'].' | '.$r['hari'].', '.print_tanggal($r['tanggal']).' '.$r['jam'].' WIB'; 
		$template_artikel = str_replace('{meta}', $meta, $template_artikel);
		
		$konten = substr($r['isi'], 0, $panjang);
		$konten = substr($r['isi'], 0, strrpos($konten, " ") );
		$konten = str_replace("../media/", web_info('url')."/media/", $konten);
		$template_artikel = str_replace('{konten}', $konten, $template_artikel);
		
		echo $template_artikel;
	}
	
	$qartikel = $mysqli->query($sql);
	$jmldata = $qartikel->num_rows;
	
	if($jmldata>$batas){
		echo buat_paging('pencarian', '/'.$_REQUEST['kata'], $batas, $jmldata, $hal);
	}
}
?>
