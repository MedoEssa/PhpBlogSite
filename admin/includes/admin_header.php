<?php include "../includes/config.php"; ?>
<?php include "functions.php"; ?>
<?php session_start(); ?>
<?php ob_start(); ?>




<?php

if (isset($_SESSION['user_role'])) {
    
    if ($_SESSION['user_role'] !== 'admin') {
        
        header("Location: ../index");
    }
} else {
    header("Location: ../index");
}


?>



<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from usman.it/themes/charisma/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Jul 2019 11:45:04 GMT -->
<head>

<meta charset="utf-8">
<title>Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Magazine, a fully featured, responsive, HTML5, Bootstrap, JQUERY, PHP5, MYSQLI, admin template.">
<meta name="author" content="Mohammad Essakhi">

<link id="bs-css" href="css/bootstrap-cerulean.min.css" rel="stylesheet">
<link href="css/charisma-app.css" rel="stylesheet">
<link href='bower_components/fullcalendar/dist/fullcalendar.css' rel='stylesheet'>
<link href='bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print'>
<link href='bower_components/chosen/chosen.min.css' rel='stylesheet'>
<link href='bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>
<link href='bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
<link href='bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'>
<link href='css/jquery.noty.css' rel='stylesheet'>
<link href='css/noty_theme_default.css' rel='stylesheet'>
<link href='css/elfinder.min.css' rel='stylesheet'>
<link href='css/elfinder.theme.css' rel='stylesheet'>
<link href='css/jquery.iphone.toggle.css' rel='stylesheet'>
<link href='css/uploadify.css' rel='stylesheet'>
<link href='css/animate.min.css' rel='stylesheet'>


<style type="text/css">

.card-user {
	text-align: center;
}

	.card-user .avatar.border-gray {
    border-color: #EEEEEE;
}
.card-user .avatar {
    width: 200px;
    height: 200px;
    border: 5px solid #FFFFFF;
    position: relative;
    margin-bottom: 15px;
}

.card .avatar {

    overflow: hidden;
    border-radius: 50%;
    margin-right: 5px;
}
</style>

<script src="bower_components/jquery/jquery.min.js"></script>

<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

<link rel="shortcut icon" href="img/favicon.ico">

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
</head>
<body>