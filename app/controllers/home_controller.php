<?php
	class HomeController {
		public function getViewHome() {
			if (isset($_SESSION["signIn"]) && $_SESSION["signIn"] == 1) {
				echo "Welcome " . $_SESSION["memberNum"];
				echo '<a href="?controller=sign_in&action=getViewLogout">Logout</a>';
				echo '<a href="?controller=location&action=getViewLocation">Location</a>';
				echo '<a href="?controller=rental_history&action=getViewRentalHistory">Rental History</a>';
				echo '<a href="?controller=comment&action=getViewPostComment">Post Comment</a>';
				echo '<a href="?controller=comment&action=getViewComment">View Comment</a>';
				echo '<a href="?controller=car&action=getViewAvailableCars">Available Cars</a>';
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
