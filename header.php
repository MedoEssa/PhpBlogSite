<!-- INCLUDE DB -->
<?php include "includes/config.php"; ?>

<!-- INCLUDE FUNCTIONS -->
<?php include "admin/functions.php"; ?>

<?php session_start(); ?>

<!DOCTYPE html>
<html lang="En">
<head>
	<title>Durja</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="keyword" content="news,lifestyle,travel,fashion">
	<meta name="description" content="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do">
	<link rel="stylesheet" type="text/css" href="/burja/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="/burja/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="/burja/css/style.css">

	<link rel="stylesheet" type="text/css" href="/burja/css/slider-pro.min.css" media="screen"/>
<link rel="stylesheet" type="text/css" href="/burja/css/examples.css" media="screen"/>
<!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'> -->
<link href="https://fonts.googleapis.com/css?family=Lora&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=PT+Serif+Caption&display=swap" rel="stylesheet">

<script type="text/javascript" src="/burja/js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="/burja/js/jquery.sliderPro.min.js"></script>


<script type="text/javascript">
	$( document ).ready(function( $ ) {
		$( '#example5' ).sliderPro({
			width: 670,
			height: 500,
			orientation: 'vertical',
			loop: false,
			arrows: true,
			buttons: false,
			thumbnailsPosition: 'right',
			thumbnailPointer: true,
			thumbnailWidth: 290,
			breakpoints: {
				800: {
					thumbnailsPosition: 'bottom',
					thumbnailWidth: 270,
					thumbnailHeight: 100
				},
				500: {
					thumbnailsPosition: 'bottom',
					thumbnailWidth: 120,
					thumbnailHeight: 50
				}
			}
		});
	});
</script>

  
</head>

<!-- INCLUDE NAVIGATION -->
<?php include "includes/navigation.php"; ?>
