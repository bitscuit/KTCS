<?php
class AdminController {
    public function getViewAddCar() {
        $parking = Location::all();
        if (isset($_POST["vin"]) && isset($_POST["parkingAddress"]) && isset($_POST["make"]) && isset($_POST["model"])
                && isset($_POST["makeYear"]) && isset($_POST["dailyRentalFee"])) {
            $result = Car::addCar($_POST["vin"], $_POST["parkingAddress"][0], $_POST["make"], $_POST["model"], $_POST["makeYear"], $_POST["dailyRentalFee"]);
            if ($result) {
                echo "Car added!";
            } else {
                echo "Failed!";
            }
        }
        require_once("views/admin/add_car.php");
    }

    public function getViewRentalHistory() {
        $vin = Comment::selectVin();
        if (isset($_POST["vin"])) {
            $result = RentalHistory::selectCarHistory($_POST["vin"][0]);
            if (!$result) {
                echo "No rental history";
            }
        }
        require_once("views/admin/rental_history.php");
    }

    public function getViewDamaged() {
        $result = RentalHistory::selectDamaged();
        if (!$result) {
            echo "No cars damaged";
        }
        require_once("views/admin/damaged.php");
    }

    public function getViewReservations() {
        $result = Reservation::reservationsToday();
        if (!$result) {
            echo "No reservations today!";
        }
        require_once("views/admin/reservations.php");
    }

    public function getViewMaxMinReservations() {
        $result1 = Reservation::maxMinReservations(true);
        $result2 = Reservation::maxMinReservations(false);
        require_once("views/admin/max_min_reservations.php");
    }

	// Reply to a member comment
	public function getViewReplyComment() {
        $cars = Car::selectAllCars();
        // $result2 = Reservation::maxMinReservations(false);
        require_once("views/admin/reservation.php");
    }

    public function getViewNeedsMaintenance() {
        $result = RentalHistory::needsMaintenance();
        if (!$result) {
            echo "No cars need maintenance!";
        }
        require_once("views/admin/maintenance.php");
    }

    public function getViewAvailableLocationCars() {
        $location = Location::all();
        if (isset($_POST["parking_address"])) {
            $result = Car::getAvailableLocationCars($_POST["parking_address"][0]);
            if (!$result) {
                echo "No available cars";
            }
        }
        require_once("views/admin/available_cars.php");
    }

	public function getViewCar() {
		if (isset($_SESSION["adminSignIn"]) && $_SESSION["adminSignIn"] == 1) {
			$carComment = Car::selectCarCommentsWithReply($_GET["vin"]);
    		require_once('views/admin/car_profile.php');
        } else {
            header("Location: ?controller=error&action=getViewError");
			exit;
        }
	}

	public function replyToComment() {
		if (!($_POST["reply"] == null || $_POST["reply"] == "")) {
            if (Comment::insertReply($_POST["vin"], $_POST["reply"], $_POST["memberNum"], $_POST["commentTime"])) {
                echo "Reply submitted!";
            } else {
                echo "Error";
            }
		}
	}

	public function getViewAllCars() {
		$allCars = Car::selectAllCars();
		require_once("views/admin/reservation.php");
	}

    public function getViewAdmin() {
        require_once("views/admin/home.php");
        echo "Welcome " . $_SESSION["username"] . "!";
    }

    public function getViewAllMembers() {
        $cars = User::all();
        require_once("views/admin/members.php");
    }

    public function getViewMemberInvoice() {
        $info = RentalHistory::getInvoice($_POST["member_num"]);
        $total = RentalHistory::getInvoiceTotoal($_POST["member_num"]);
        if (empty($total)) {
            $total = 0;
        }
        require_once("views/admin/invoice.php");
    }
}
?>
