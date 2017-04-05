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

    public function getViewRentalHistory() {
        $vin = Comment::selectVin();
        if (isset($_POST["vin"])) {
            $result = RentalHistory::selectCarHistory($_POST["vin"][0]);
            if (!$result) {
                echo "No rental history";
            }
        }
        require_once("views/admin/rental_history.php");
    }

    public function getViewDamaged() {
        $result = RentalHistory::selectDamaged();
        if (!$result) {
            echo "No cars damaged";
        }
        require_once("views/admin/damaged.php");
    }

    public function getViewReservations() {
        $result = Reservation::reservationsToday();
        if (!$result) {
            echo "No reservations today!";
        }
        require_once("views/admin/reservations.php");
    }

    public function getViewMaxMinReservations() {
        $result1 = Reservation::maxMinReservations(true);
        $result2 = Reservation::maxMinReservations(false);
        require_once("views/admin/max_min_reservations.php");
    }

    public function getViewNeedsMaintenance() {
        $result = RentalHistory::needsMaintenance();
        if (!$result) {
            echo "No cars need maintenance!";
        }
        require_once("views/admin/maintenance.php");
    }
}
?>
