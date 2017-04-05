<?php
	class HomeController {
		public function getViewHome() {
			if (isset($_SESSION["signIn"]) && $_SESSION["signIn"] == 1 ) {
				header("Location: ?controller=user&action=getViewMember");
				exit;
			} else if (isset($_SESSION["adminSignIn"]) && $_SESSION["adminSignIn"] == 1 ) {
				header("Location: ?controller=admin&action=getViewAdmin");
				exit;
			} else {
				$first_name = "Oprah";
				$last_name  = "Winfrey";
				require_once("views/home/home.php");
			}
		}
	}
?>
