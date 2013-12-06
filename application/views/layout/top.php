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
    <link rel="stylesheet" href="<?= lib_url('bootstrap/css/bootstrap-multiselect.css'); ?>">

<?php foreach ($layoutLess as $less) { ?>
	<link rel="stylesheet/less" type="text/css" href="<?= less_url($less); ?>" />
<?php } ?>

	<script type="text/javascript" src="<?= lib_url("less/less-1.5.1.min.js"); ?>"></script>

</head>
<body>
	<div id="site-container">
		<nav id="navbar" class="navbar navbar-default navbar-static-top" role="navigation">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?= site_url(); ?>">Merge your ideas</a>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li<?= (isset($layoutSelectedTab) && $layoutSelectedTab == 'question') ? ' class="active"' : ''; ?>><a href="<?= site_url('module/question'); ?>">Posez votre question</a></li>
					<li<?= (isset($layoutSelectedTab) && $layoutSelectedTab == 'notifications') ? ' class="active"' : ''; ?>><a href="<?= site_url('module/notifications'); ?>">Vos notifications</a></li>
				</ul>
				<!--<ul class="nav navbar-nav navbar-right">
					<li><button class="btn btn-link navbar-btn"><span class="glyphicon glyphicon-cog"></span></button></li>
				</ul>-->
			</div>
		</nav>
		<div id="page-container">
