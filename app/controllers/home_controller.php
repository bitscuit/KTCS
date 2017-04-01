<?php
	class HomeController {
		public function getViewHome() {
			if (isset($_SESSION["signIn"]) && $_SESSION["signIn"] == 1) {
				echo "Welcome " . $_SESSION["username"];
				echo '<a href="?controller=user&action=getViewLogout">Logout</a>';
				echo '<a href="?controller=user&action=getViewLocation">Location</a>';
				echo '<a href="?controller=user&action=getViewRentalHistory">Rental History</a>';
				echo '<a href="?controller=user&action=getViewPostComment">Post Comment</a>';
				echo '<a href="?controller=user&action=getViewComment">View Comment</a>';
				echo '<a href="?controller=user&action=getViewAvailableCars">Available Cars</a>';
				echo '<a href="?controller=user&action=getViewPickUp">Pick Up</a>';
				echo '<a href="?controller=user&action=getViewDropOff">Drop Off</a>';
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
