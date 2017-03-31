<?php
class UserController {
    public function getViewPickUp() {
		$list = Comment::selectVin();
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
    }
} // end UserController class
?>
