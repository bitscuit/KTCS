<?php
class CarController {

	public $car;

	// Returns all comments for a specific car.
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
            require_once("views/comment/view_comment.php");
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
