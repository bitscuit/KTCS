<?php
    if (!empty($reservations)) {
        echo "<table class='table table-bordered'>";
		echo "<thead>";
		echo "<tr>";
        echo "<th>Vin</th>";
        echo "<th>Reservation Start Date</th>";
        echo "<th>Reservation End Date</th>";
        echo "<th>Access Code</th>";
		echo "</tr>";
		echo "</thead>";
		echo "<tbody>";
		foreach ($reservations as $row) {
            echo "<tr>";
            echo "<td>" . $row["vin"] . "</td>";
            echo "<td>" . $row["reservation_start_date"] . "</td>";
            echo "<td>" . $row["reservation_end_date"] . "</td>";
            echo "<td>" . $row["access_code"] . "</td>";
            echo "</tr>";
        }
		echo "</tbody>";
		echo "</table>";
    }
    ?>
