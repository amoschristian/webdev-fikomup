<?php
$folder_template = web_info('url') . '/' . folder_template();

//prepare the data to be displayed
$query = "SELECT * FROM artikel ";
if (isset($_GET['tag'])) {
	$tag = $_GET['tag'];
	$query .= "WHERE tag LIKE '%$tag%' ";
}
$query .= "ORDER BY tanggal DESC LIMIT 10"; //show 10 per page

$result = $mysqli->query($query);
$detail_berita = [];

while ($data = $result->fetch_array(MYSQLI_ASSOC)) {
	$sentences = 2;
	$text_pendek =  implode('. ', array_slice(explode('.', strip_tags($data['isi'])), 0, $sentences)) . '.';

	$detail_berita[$data['id_artikel']] = $data;
	$detail_berita[$data['id_artikel']]['desc'] = $text_pendek;
}
?>

<!DOCTYPE html>
<html lang="en">

<?php include('template/meta_head.php'); ?>

<body>

	<div class="super_container">

		<!-- Header -->

		<?php include('template/header.php') ?>

		<!-- Home -->

		<div class="home">
			<div class="home_background_container prlx_parent">
				<div class="home_background prlx" style="background-image:url(<?= $folder_template . '/images/news_background.jpg' ?>)"></div>
			</div>
			<div class="home_content">
				<h1>News</h1>
			</div>
		</div>

		<!-- News -->

		<div class="news">
			<div class="container">
				<div class="row">

					<!-- News Column -->

					<div class="col-lg-8">

						<div class="news_posts">

							<?php if ($detail_berita) : ?>
								<?php foreach ($detail_berita as $berita) : ?>
									<!-- News Post -->
									<div class="news_post">
										<div class="news_post_top d-flex flex-column flex-sm-row">
											<div class="news_post_date_container">
												<div class="news_post_date d-flex flex-column align-items-center justify-content-center">
													<div><?= date('d', strtotime($berita['tanggal'])) ?></div>
													<div><?= print_tanggal($berita['tanggal'], "%b") ?></div>
												</div>
											</div>
											<div class="news_post_title_container">
												<div class="news_post_title">
													<a href="<?= "/news/id/{$berita['id_artikel']}/{$berita['judul_seo']}"; ?>"><?= $berita['judul'] ?></a>
												</div>
												<!-- <div class="news_post_meta">
												<span class="news_post_author"><a href="#">Admin</a></span>
												<span>|</span>
												<span class="news_post_comments"><a href="#">2019-05-04</a></span>
											</div> -->
											</div>
										</div>
										<div class="news_post_image">
											<img src="<?= "/media/source/" . $berita['gambar'] ?>">
										</div>
										<div class="news_post_text">
											<p><?= $berita['desc'] ?></p>
										</div>
										<div class="news_post_button text-center trans_200">
											<a href="<?= "/news/id/{$berita['id_artikel']}/{$berita['judul_seo']}"; ?>">Read More</a>
										</div>
									</div>
								<?php endforeach; ?>

								<!-- Page Nav -->

								<div class="news_page_nav">
									<ul>
										<li class="active text-center trans_200"><a href="#">01</a></li>
										<li class="text-center trans_200"><a href="#">02</a></li>
										<li class="text-center trans_200"><a href="#">03</a></li>
									</ul>
								</div>
							<?php else : ?>
								<h3>News not found</h3>
							<?php endif; ?>

						</div>

					</div>

					<!-- Sidebar Column -->

					<div class="col-lg-4">
						<div class="sidebar">

							<!-- Tags -->

							<?php include("template/tags.php"); ?>

							<!-- Latest Posts -->

							<?php include("template/news_latest.php"); ?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Footer -->

		<?php include('template/footer.php'); ?>

	</div>

	<?php include('template/meta_footer.php'); ?>

</body>

</html>