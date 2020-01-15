<!doctype html>
<html>
<head>
	<?php 
		$folder_template = web_info('url').'/'.folder_template();
		meta_header(); 
	?>
</head>
<body>
	<header id="header">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-xs-8">
					<img src="<?= $folder_template; ?>/images/logo.png" width="100%">
				</div>
				<div class="col-md-4 col-xs-1"></div>
				<div class="col-md-4 hidden-xs">
					<?php form_pencarian('Go'); ?>
				</div>
			</div>
		</div>
	</header>
	<nav id="nav">
		<div class="container">
			<div class="navbar navbar-default">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<?php template_menu("main"); ?>
					</ul>
				</div>
			</div>
		</div>
	</nav>