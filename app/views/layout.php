<DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>KTCS</title>

		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"/>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
		<!-- Latest compiled JavaScript -->
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</head>

	<body>
		<header>
		<!-- header should have a script to determine which header to show -->
		<h1>Kingston Town Car Share</h1>
		<a href="/KTCS/app">Home</a>
		<a href="?controller=sign_in&action=getViewSignIn">Sign In</a>
		<a href="?controller=location&action=getViewLocation">Location</a>
		<?php require_once("views/header/header.html");?>
		</header>

		<!-- route to the appropriate controller and action to display the proper view -->
		<?php require_once("routes.php"); ?>

		<footer>
		<!-- footer will have script to determine which footer to show -->
		Copyright
		</footer>
	<body>
<html>
