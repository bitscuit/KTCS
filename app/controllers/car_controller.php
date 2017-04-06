<?php
// controller to handle car data
class CarController {

	public $car;

	// shows all comments for a specified car
	public function getViewComment() {
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
        require_once("views/comment/view_comment.php");
    }

	// shows all KTCS locations
    public function getViewLocation() {
		require_once('views/location/location.php');
        $list = Location::all();
        foreach ($list as $row) {
            echo "<tr>";
            echo "<td class='tableData'><a href='?controller=car&action=getViewLocationCars&location=" . $row['parking_address'] . "'>" . $row['parking_address'] . "</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    }

	// shows all available cars for reservation on specified date
    public function getViewAvailableCars() {
		$make = Car::getMake();
		$model = Car::getModel();
		$year = Car::getYear();
		$rentalFee = Car::getDailyRentalFee();
		$location = Car::getLocation();

		$startDate = "";
		$endDate = "";
		$loc = "";
		$locVal = "";
		$mk = "";
		$mkVal = "";
		$mdl = "";
		$mdlVal = "";
		$mkYear = "";
		$mkYearVal = "";

		// If the start date is the blank option, make the value the current date
		if (isset($_POST["startDate"])) {
			$startDate = $_POST["startDate"];
		} else {
			$startDate = date('Y-m-d');
		}

		// If the start date is the blank option, make a blank query "loc" and value "locVal"
		if (isset($_POST["endDate"])) {
			$endDate = $_POST["endDate"];
		} else {
			$tempDate = strtotime($startDate . " +1 days");
			$endDate = date('Y-m-d', $tempDate);
		}

		// If the location is the blank option, make a blank query "loc" and value "locVal"
		if (isset($_POST["location"])) {
			if ($_POST["location"][0] != "") {
				$loc = "AND parking_address = :location";
				$locVal = $_POST["location"][0];
			} else {
				$loc = "";
				$locVal = "";
			}
		}

		// If the make is the blank option, make a blank query "mk" and value "mkVal"
		if (isset($_POST["make"])) {
			if ($_POST["make"][0] != "") {
				$mk = "AND make = :make";
				$mkVal = $_POST["make"][0];
			} else {
				$mkVal = "";
				$mk = "";
			}
		}

		// If the model is the blank option, make a blank query "mdl" and value "mdlVal"
		if (isset($_POST["model"])) {
			if ($_POST["model"][0] != "") {
				$mdl = "AND model = :model";
				$mdlVal = $_POST["model"][0];
			} else {
				$mdl = "";
				$mdlVal = "";
			}
		}

		// If the year is the blank option, make a blank query "mkYear" and value "mkYearVal"
		if (isset($_POST["year"])) {
			if ($_POST["year"][0] != "") {
				$mkYear = "AND make_year = :year";
				$mkYearVal = $_POST["year"][0];
			} else {
				$mkYear = "";
				$mkYearVal = "";
			}
		}

		// get view to show list of available cars
		$list = Car::getAvailableCars($startDate, $endDate, $mk, $mkVal, $mdl, $mdlVal, $mkYear, $mkYearVal, $loc, $locVal);
		require_once("views/car/available_cars.php");
    }

	// show all currently available cars in the specified location
    public function getViewLocationCars() {
		// require_once("views/car/available_cars.php");
        if (isset($_GET["location"])) {
            $location = $_GET["location"];
            $list = Car::getLocationCars($location);
			echo $location;
			echo "<table>";
            if (!empty($list)) {
                foreach ($list as $row) {
                    echo "<tr>";
                    echo "<td>" . $row['make'] . "</td>";
                    echo "<td>" . $row['model'] . "</td>";
                    echo "<td>" . $row['make_year'] . "</td>";
                    echo "</tr>";
                }
            } else {
				echo "test";
			}
            echo "</table>";
        } else {
            echo "No available cars on this date";
        }
    }

	// Admin function
	// show rental history for specified car
    public function getViewRentalHistory() {
        if (isset($_SESSION["signIn"]) && $_SESSION["signIn"] == 1) {
            $history = RentalHistory::selectHistory($_SESSION["memberNum"]);
    		require_once('views/rental_history/rental_history.php');
        } else {
            header("Location: ?controller=error&action=getViewError");
			exit;
        }
    }

	public function getViewCar() {
		if (isset($_SESSION["signIn"]) && $_SESSION["signIn"] == 1) {
            $carInfo = Car::selectInfo($_GET["vin"]);
			$carComment = Car::selectCarComments($_GET["vin"]);
			if (isset($_POST["rating"]) && isset($_POST["comment"])) {
				$result = Comment::insertComment($_POST["rating"], $_POST["comment"], $_GET["vin"]);
				if ($result) {
					echo "Comment submitted!";
				} else {
					echo "Error";
				}
			}
    		require_once('views/car/car_profile.php');
        } else {
            header("Location: ?controller=error&action=getViewError");
			exit;
        }
	}

} // end CarController class
?>
