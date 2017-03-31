<?php
class CarController {
    public function getViewAvailableCars() {
		if (isset($_SESSION["signIn"]) && $_SESSION["signIn"] == 1) {

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
		} else {
			header("Location: ?controller=error&action=getViewError");
			exit;
		}
    }

    public function getViewLocationCars() {
        if (isset($_SESSION["signIn"]) && $_SESSION["signIn"] == 1) {
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
        } else {
			header("Location: ?controller=error&action=getViewError");
			exit;
        }
    }
}
?>
