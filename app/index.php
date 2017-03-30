<?php
	// This is the parent page of the website
	require_once("connection.php");
	// set the controller and action variables to the values in the URL
	if (isset($_GET["controller"]) && isset($_GET["action"])) {
		$controller = $_GET["controller"];
		$action     = $_GET["action"];
	} else {
		$controller = "home";
		$action     = "getViewHome";
	}
	$temp = "";
	// show the view
	require_once("views/layout.php");
?>