<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Nuit de l'info 2013">

	<title><?= !is_null($layoutTitle) ? $layoutTitle : ''; ?></title>

	<link rel="shortcut icon" href="<?= img_url('favicon.png'); ?>" />

<?php foreach ($layoutCss as $css) { ?>
	<link rel="stylesheet" href="<?= css_url($css); ?>">
<?php } ?>

</head>
<body>
