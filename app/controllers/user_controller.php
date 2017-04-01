<?php
class UserController {
    public function getViewPickUp() {
        if (isset($_SESSION["signIn"]) && $_SESSION["signIn"] == 1) {
            $vin = Comment::selectVin();
    		if(isset($_POST["vin"]) && isset($_POST["time"]) && isset($_POST["odometer_reading"]) && isset($_POST["car_status"])) {
    			$vin = $_POST["vin"][0];
    			$time = $_POST["time"];
                $odometer_reading = $_POST["odometer_reading"];
    			$date = date("Y-m-d");
                $car_status = $_POST["car_status"];
                if (PickUp::insertPickUp($vin, $_SESSION["memberNum"], $odometer_reading, $car_status, $date, $vin)) {
                    header("Location: ?controller=home&action=getViewHome");
                    exit;
                }
            }
            require_once("views/pick_up/pick_up.php");
        } else {
            header("Location: ?controller=error&action=getViewError");
			exit;
        }
    }

    public function getViewAvailableCars() {
		if (isset($_POST["carsOnDate"])) {
			$date = $_POST["carsOnDate"];
			echo $date;
			$list = Car::getAvailableCars($date);
				echo "<table>";
				echo "<tr>";
				echo "<th>Make</th>";
				echo "<th>Model</th>";
				echo "<th>Year</th>";
				echo "</tr>";
			if (!empty($list)) {
				foreach ($list as $row) {
					echo "<tr>";
					echo "<td>" . $row["make"] . "</td>";
					echo "<td>" . $row["model"] . "</td>";
					echo "<td>" . $row["make_year"] . "</td>";
					echo "</tr>";
				}
			} else {
				echo "No available cars on this date";
			}
			echo "</table>";
		}
		// get view to show list of available cars
		require_once("views/car/available_cars.php");
    }

    public function getViewLocationCars() {
        if (isset($_GET["location"])) {
            $location = $_GET["location"];
            $list = Car::getLocationCars($location);
            if (!empty($list)) {
                foreach ($list as $row) {
                    echo "<tr>";
                    echo "<td>" . $row['make'] . "</td>";
                    echo "<td>" . $row['model'] . "</td>";
                    echo "<td>" . $row['make_year'] . "</td>";
                    echo "</tr>";
                }
            }
            echo "</table>";
        } else {
            echo "No available cars on this date";
        }
        require_once("views/car/available_cars.php");
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
            require_once("views/comment/postComment.php");
        } else {
            header("Location: ?controller=error&action=getViewError");
			exit;
        }
    }

    public function getViewComment() {
        if (isset($_SESSION["signIn"]) && $_SESSION["signIn"] == 1) {
            $vin = Comment::selectVin();
            echo "<table>
                <tr>
                    <th>Vin</th>
                    <th>Rating</th>
                    <th>Comment Text</th>
                    <th>Comment Time</th>
                </tr>";
            if(isset($_POST["rating"]) && isset($_POST["vin"])) {
                $list = Comment::selectComment($_POST["vin"][0], $_POST["rating"][0]);
                if ($list != null) {
                    foreach ($list as $row) {
                        echo "<tr>";
                        echo "<td>" . $row["vin"] . "</td>";
                        echo "<td>" . $row["rating"] . "</td>";
                        echo "<td>" . $row["comment_text"] . "</td>";
                        echo "<td>" . $row["comment_time"] . "</td>";
                        echo "</tr>";
                    }
                }
            }
            echo "</table>";
            require_once("views/comment/ViewComment.php");
        } else {
            header("Location: ?controller=error&action=getViewError");
			exit;
        }
    }

    public function getViewLocation() {
        require_once('views/location/location.php');
        $list = Location::all();
        foreach ($list as $row) {
            echo "<tr>";
            echo "<td class='tableData'><a href='?controller=user&action=getViewLocationCars&location=" . $row['parking_address'] . "'>" . $row['parking_address'] . "</a></td>";
            echo "</tr>";
        }
        echo "</table>";
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

    public function getViewSignIn() {
        if(isset($_POST["username"]) && isset($_POST["password"])) {
            $uname = $_POST["username"];
            $pass = $_POST["password"];
            if (User::signIn($uname, $pass)) {
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

    public function getViewLogout() {
        session_unset();
        session_destroy();
        header("Location: ?controller=home&action=getViewHome");
        exit;
    }
} // end UserController class
?>
