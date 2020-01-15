<?php
if(!defined("INDEX")) header('location: index.php');
?>
<div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">ADMINISTRATOR</a>
</div>

<div id="navbar" class="navbar-collapse collapse">
	<ul class="nav navbar-nav visible-xs">
<?php
	include("menu_template.php");
?>		
	</ul>
	<ul class="nav navbar-nav navbar-right">
		<li><a target='_blank' href="../"><i class="glyphicon glyphicon-eye-open"></i> Lihat Web</a></li>
		<li><a href="logout.php"><i class="glyphicon glyphicon-log-out"></i> Keluar</a></li>
	</ul>
</div>