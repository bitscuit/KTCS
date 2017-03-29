<?php
class LocationController {
    public function getViewLocation() {
        require_once('views/location/location.php');
        $list = Location::all();
        foreach ($list as $row) {
            echo "<tr>";
            echo "<td class='tableData'>" . $row['parking_address'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
}
?>
