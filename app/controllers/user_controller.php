<?php
class UserController {

	public $member;

    public function getViewPickUp() {
        if (isset($_SESSION["signIn"]) && $_SESSION["signIn"] == 1) {
            $vin = Comment::selectVin();
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

    public function getViewDropOff() {
        if (isset($_SESSION["signIn"]) && $_SESSION["signIn"] == 1) {
            $vin = Comment::selectVin();
    		if(isset($_POST["vin"]) && isset($_POST["odometer_reading"]) && isset($_POST["car_status"]) && isset($_POST["rental_date"])) {
                echo "hello";
                $vin = $_POST["vin"][0];
                $odometer_reading = $_POST["odometer_reading"];
                $car_status = $_POST["car_status"][0];
                $date = $_POST["rental_date"];
                if (PickUpDropOff::insertDropOff($vin, $_SESSION["memberNum"], $odometer_reading, $car_status, $date)) {
                    echo "bye";
                    header("Location: ?controller=home&action=getViewHome");
                    exit;
                }
            }
            require_once("views/pick_up_drop_off/drop_off.php");
        } else {
            header("Location: ?controller=error&action=getViewError");
			exit;
        }
    }

    public function getViewPostComment() {
        if (isset($_SESSION["signIn"]) && $_SESSION["signIn"] == 1) {
            $list = Comment::selectVin();
            if(isset($_POST["rating"]) && isset($_POST["commentText"])) {
                $rating = $_POST["rating"][0];
                $commentText = $_POST["commentText"];
                $vin = $_POST["vin"][0];
                echo $rating . $commentText . $_POST["vin"][0] . $_SESSION["memberNum"];
                if (Comment::insertComment($rating, $commentText, $vin)) {
                    header("Location: ?controller=home&action=getViewHome");
                    exit;
                }
            }
            require_once("views/comment/post_comment.php");
        } else {
            header("Location: ?controller=error&action=getViewError");
			exit;
        }
    }

    // Get the members comments
    public function getViewComment() {

    }

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
                echo "932244444444587859824935734275";
                header("Location: ?controller=home&action=getViewHome");
                exit;
            }
        } else {
            echo "Not registered";
        }
        require_once("views/register/register.php");
    }

    public function getViewRentalHistory() {
        if (isset($_SESSION["signIn"]) && $_SESSION["signIn"] == 1) {
            $history = RentalHistory::selectHistory($_SESSION["memberNum"]);
    		require_once('views/rental_history/rental_history.php');
        } else {
            header("Location: ?controller=error&action=getViewError");
			exit;
        }
    }

	// Sign in
    public function getViewSignIn() {
        if(isset($_POST["username"]) && isset($_POST["password"])) {
            $uname = $_POST["username"];
            $pass = $_POST["password"];
			$member = User::signIn($uname, $pass);
			$_SESSION["username"] = $member->username;
			$_SESSION["member_num"] = $member->member_num;
            if ($member != null) {
                $_SESSION["signIn"] = 1;
				header("Location: ?controller=home&action=getViewHome");
				print_r($_SESSION);
                exit;
            } else {
				$_SESSION["signIn"] = 0;
			}
        }
        require_once("views/sign_in/sign_in.php");
    }

	// Log out of session
    public function getViewLogout() {
        session_unset();
        session_destroy();
        header("Location: ?controller=home&action=getViewHome");
        exit;
    }
} // end UserController class
?>
