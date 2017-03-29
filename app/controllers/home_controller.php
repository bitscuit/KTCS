<?php
	class HomeController {
		public function getViewHome() {
			$first_name = "Oprah";
			$last_name  = "Winfrey";
			require_once("views/home/home.php");
			echo $GLOBALS["temp"];
		}
	}
?>