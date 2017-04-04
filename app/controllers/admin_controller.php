<?php
class AdminController {
    public function getViewAddCar() {
        $parking = Location::all();
        if (isset($_POST["vin"]) && isset($_POST["parkingAddress"]) && isset($_POST["make"]) && isset($_POST["model"])
                && isset($_POST["makeYear"]) && isset($_POST["dailyRentalFee"])) {
            $result = Car::addCar($_POST["vin"], $_POST["parkingAddress"][0], $_POST["make"], $_POST["model"], $_POST["makeYear"], $_POST["dailyRentalFee"]);
            if ($result) {
                echo "Car added!";
            } else {
                echo "Failed!";
            }
        }
        require_once("views/admin/add_car.php");
    }
}
?>
