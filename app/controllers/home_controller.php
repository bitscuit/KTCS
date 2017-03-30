<?php
	class HomeController {
		public function getViewHome() {
			if ($_SESSION["signIn"] == 1) {
				echo "signed in!!";
			} else {
				echo "not signed in!!";
			}
			$first_name = "Oprah";
			$last_name  = "Winfrey";
			require_once("views/home/home.php");
			echo $GLOBALS["temp"];
		}
	}
?>