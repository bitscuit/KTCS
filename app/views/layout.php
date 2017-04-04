<?php session_start(); ?>
<!DOCTYPE html>
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
		<!-- Link to CSS file -->
		<link rel="stylesheet" type="text/css" href="views/CSS/stylesheet.css"/>
	</head>

	<body>
		<div class="container-fluid">
			<?php
				if (isset($_SESSION["signIn"]) && $_SESSION["signIn"] == 1) {
					require_once("views/header/member_header.html");
				} else if (isset($_SESSION["adminSignIn"]) && $_SESSION["adminSignIn"] == 1)  {
					require_once("views/header/admin_header.html");
				} else {
					require_once("views/header/user_header.html");
				}
			?>

			<!-- route to the appropriate controller and action to display the proper view -->
			<?php require_once("routes.php"); ?>

			<footer>
			<!-- footer will have script to determine which footer to show -->
			Copyright
			</footer>
		</div>
	<body>
<html>
