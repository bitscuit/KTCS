<?php
class CarController {
    public function getViewAvailableCars() {
		if (isset($_SESSION["signIn"]) && $_SESSION["signIn"] == 1) {
			
			if (isset($_POST["carsOnDate"])) {
				$date = $_POST["carsOnDate"];
				$list = Car::getAvailableCars($date);
				if (!empty($list)) {
					foreach ($list as $row) {
						print_r($row);
					}
				} else {
					echo "No available cars on this date";
				}
			}
			// get view to show list of available cars
			require_once("views/car/available_cars.php");
		} else {
			header("Location: ?controller=error&action=getViewError");
			exit;
		}
    }
}
?>
