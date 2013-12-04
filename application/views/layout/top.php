<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Nuit de l'info 2013">
	<meta name="author" content="NameNotFoundException Team">

	<title><?= !is_null($layoutTitle) ? $layoutTitle : ''; ?></title>

	<link rel="shortcut icon" href="<?= img_url('favicon.png'); ?>" />
	<link rel="stylesheet" href="<?= lib_url('bootstrap/css/bootstrap.min.css'); ?>">
<?php foreach ($layoutLess as $less) { ?>
	<link rel="stylesheet/less" type="text/css" href="<?= less_url($less); ?>" />
<?php } ?>

	<script type="text/javascript" src="<?= lib_url("less/less-1.5.1.min.js"); ?>"></script>

</head>
<body>
	<div id="site-container">
		<nav class="navbar navbar-default navbar-inverse navbar-static-top" role="navigation">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?= site_url(); ?>">NameNotFoundException</a>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="active"><a href="<?= site_url(); ?>">Accueil</a></li>
					<li><a href="#">Page 1</a></li>
					<li><a href="#">Page 2</a></li>
					<li><a href="#">Page 3</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="#">Action</a></li>
							<li><a href="#">Another action</a></li>
							<li><a href="#">Something else here</a></li>
							<li class="divider"></li>
							<li><a href="#">Separated link</a></li>
							<li class="divider"></li>
							<li><a href="#">One more separated link</a></li>
						</ul>
					</li>
				</ul>
				<form class="navbar-form navbar-right" role="search">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Rechercher">
					</div>
					<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
				</form>
			</div>
		</nav>
		<div id="page-container" class="container">
