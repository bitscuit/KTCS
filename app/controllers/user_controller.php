<?php
// controller to handle user specific actions
class UserController {

	// object that is returned when the user has signed in
	public $member;

	// show the pick form and send pick up form data to database
    public function getViewPickUp() {
        if (isset($_SESSION["signIn"]) && $_SESSION["signIn"] == 1) {
            $vin = Comment::selectVinPickUp();
    		if(isset($_POST["vin"])  && isset($_POST["odometer_reading"])) {
    			$vin = $_POST["vin"][0];
                $odometer_reading = $_POST["odometer_reading"];
                if (PickUpDropOff::insertPickUp($vin, $_SESSION["memberNum"], $odometer_reading)) {
                    header("Location: ?controller=home&action=getViewHome");
                    exit;
                }
            }
            require_once("views/pick_up_drop_off/pick_up.php");
        } else {
            header("Location: ?controller=error&action=getViewError");
			exit;
        }
    }

	// show the drop off form and send drop off form data to database
    public function getViewDropOff() {
        if (isset($_SESSION["signIn"]) && $_SESSION["signIn"] == 1) {
            $vin = Comment::selectVinPickUp();
    		if(isset($_POST["vin"]) && isset($_POST["odometer_reading"]) && isset($_POST["car_status"]) && isset($_POST["rental_date"])) {
                echo "hello";
                $vin = $_POST["vin"][0];
                $odometer_reading = $_POST["odometer_reading"];
                $car_status = $_POST["car_status"][0];
                $date = $_POST["rental_date"];
                if (PickUpDropOff::insertDropOff($vin, $_SESSION["memberNum"], $odometer_reading, $car_status, $date)) {
					$dailyRentalFee = Car::getCarDailyRentalFee($vin);
					$temp = $dailyRentalFee[0]["daily_rental_fee"];
					PickUpDropOff::removeReservation($_SESSION["memberNum"], $vin, $date);
					if (PickUpDropOff::insertRentFee($vin, $_SESSION["memberNum"], $date, $temp)) {
	                    header("Location: ?controller=home&action=getViewHome");
	                    exit;
					} else {
						header("Location: ?controller=error&action=getViewError");
						exit;
					}
                }
            }
            require_once("views/pick_up_drop_off/drop_off.php");
        } else {
            header("Location: ?controller=error&action=getViewError");
			exit;
        }
    }

    // Get the members comments
    public function getViewComment() {

    }

	// show the register view and send registration data to database
    public function getViewRegister() {
        if(isset($_POST["username"]) && isset($_POST["password"]) &&
            isset($_POST["first_name"]) && isset($_POST["last_name"]) &&
            isset($_POST["phone_num"]) && isset($_POST["license_num"])) {
            $username = $_POST["username"];
            $password = $_POST["password"];
            $fName = $_POST["first_name"];
            $lName = $_POST["last_name"];
            $phoneNum = $_POST["phone_num"];
            $email = $_POST["email"];
            $license_num = $_POST["license_num"];
            if (User::register($fName, $lName, $phoneNum, $email, $license_num,
                    $username, $password)) {
                header("Location: ?controller=home&action=getViewHome");
                exit;
            }
        } else {
            echo "Not registered";
        }
        require_once("views/register/register.php");
    }

	// show the member's rental history
    public function getViewReservation() {
        if (isset($_SESSION["signIn"]) && $_SESSION["signIn"] == 1) {
            // $history = Reservation::insertReservation($_SESSION["memberNum"]);
			$reservationData = Car::selectInfo($_POST["vin"]);
    		require_once('views/reservation/reservation.php');
        } else {
            header("Location: ?controller=error&action=getViewError");
			exit;
        }
    }

	// show the member's rental history
    public function getViewRentalHistory() {
        if (isset($_SESSION["signIn"]) && $_SESSION["signIn"] == 1) {
            $history = RentalHistory::selectHistory($_SESSION["memberNum"]);
    		require_once('views/rental_history/rental_history.php');
        } else {
            header("Location: ?controller=error&action=getViewError");
			exit;
        }
    }

	// show the sign in form and send sign in data to database
    public function getViewSignIn() {
        if(isset($_POST["username"]) && isset($_POST["password"])) {
            $uname = $_POST["username"];
            $pass = $_POST["password"];
			$member = User::signIn($uname, $pass);
			$_SESSION["username"] = $member->username;
			$_SESSION["member_num"] = $member->member_num;
            if ($member != null) {
				if ($member->role == "User") {
					$_SESSION["signIn"] = 1;
					header("Location: ?controller=user&action=getViewMember");
				} else if ($member->role == "Admin") {
					$_SESSION["adminSignIn"] = 1;
					header("Location: ?controller=admin&action=getViewAdmin");
				} else {
					$_SESSION["signIn"] = 0;
					$_SESSION["adminSignIn"] = 0;
				}
                exit;
            } else {
				$_SESSION["signIn"] = 0;
				$_SESSION["adminSignIn"] = 0;
			}
        }
        require_once("views/sign_in/sign_in.php");
    }

	// log out of session
    public function getViewLogout() {
        session_unset();
        session_destroy();
        header("Location: ?controller=home&action=getViewHome");
        exit;
    }

	public function confirmReservation() {
		Reservation::insertReservation($_POST["vin"], $_POST["startDate"], $_POST["endDate"]);
		header("Location: ?controller=user&action=getViewMember");
		exit;
	}

	public function getViewMember() {
		if(isset($_SESSION["signIn"]) && $_SESSION["signIn"] == 1) {
			$memberNum = $_SESSION["memberNum"];
			echo "<h1>Member Home</h1>";
			echo "<h3>Welcome " . $_SESSION["username"] . "!</h3>";
			$reservations = Reservation::listReservations($memberNum);
		} else {
			header("Location: ?controller=error&action=error");
			exit;
		}
		require_once("views/member/member.php");
	}

	public function getViewUserComments() {
		if(isset($_SESSION["signIn"]) && $_SESSION["signIn"] == 1) {
			$memberNum = $_SESSION["memberNum"];
			$comments = User::listComments($memberNum);
		} else {
			header("Location: ?controller=error&action=error");
			exit;
		}
		require_once("views/member/comments.php");
	}
} // end UserController class
?>
