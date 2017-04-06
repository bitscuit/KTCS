<?php
    if (!empty($result)) {
        echo "
        <table class='table table-bordered'>
            <thead>
            <tr>
                <th>Vin</th>
                <th>Last Maintenance Date</th>
                <th>Odometer Reader At Last Maintenance</th>
                <th>Odometer Reading Now</th>
            </tr>
            </thead>
            <tbody>";
        foreach ($result as $row) {
            echo "<tr>";
            echo "<td>" . $row['vin'] . "</td>";
            echo "<td>" . $row['maintenance_date'] . "</td>";
            echo "<td>" . $row['odometer_reading'] . "</td>";
            echo "<td>" . $row['pick_up_odometer_reading'] . "</td>";
            echo "</tr>";
        }
        echo "
        </tbody>
        </table>";
    }
?>
