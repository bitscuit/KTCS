<?php
class LocationController {
    public function getViewLocation() {
        if (isset($_SESSION["signIn"]) && $_SESSION["signIn"] == 1) {
            $list = Location::all();
            foreach ($list as $row) {
                echo "<tr>";
                echo "<td class='tableData'><a href='?controller=car&action=getViewLocationCars&location=" . $row['parking_address'] . "'>" . $row['parking_address'] . "</a></td>";
                echo "</tr>";
            }
            echo "</table>";
            require_once('views/location/location.php');
        } else {
            header("Location: ?controller=error&action=getViewError");
			exit;
        }
    }
}
?>
