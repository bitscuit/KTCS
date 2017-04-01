<?php
class CarController {

	public $car;
	
	// Returns all comments for a specific car.
    public function getViewComment() {
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
            require_once("views/comment/view_comment.php");
        } else {
            header("Location: ?controller=error&action=getViewError");
			exit;
        }
    }

	// TODO filter by car
	// Get available cars on specified date.
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

	// Shows available cars on the current date in a specific location.
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

	// Admin function
	// Gets the rental history for a specific car.
	// TODO query based on time range
    public function getViewRentalHistory() {
        if (isset($_SESSION["signIn"]) && $_SESSION["signIn"] == 1) {
            $history = RentalHistory::selectHistory($_SESSION["memberNum"]);
    		require_once('views/rental_history/rental_history.php');
        } else {
            header("Location: ?controller=error&action=getViewError");
			exit;
        }
    }
	
} // end CarController class
?>
