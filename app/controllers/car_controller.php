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
		if (isset($_POST["startDate"]) && isset($_POST["endDate"])) {
			$startDate = $_POST["startDate"];
			$endDate = $_POST["endDate"];
			$list = Car::getAvailableCars($startDate, $endDate);
			$make = Car::getMake();
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
    		require_once('views/car/car_profile.php');
        } else {
            header("Location: ?controller=error&action=getViewError");
			exit;
        }
	}

} // end CarController class
?>
