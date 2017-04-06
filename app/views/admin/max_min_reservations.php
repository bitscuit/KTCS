<?php
    if (!empty($result1)) {
        echo "
        <table class='table table-bordered'>
        <thead>
        <tr>
            <th>Vin</th>
            <th>Maximum Reservations</th>
        </tr>
        </thead>
        <tbody>";
        foreach ($result1 as $row) {
            echo "<tr>";
            echo "<td>" . $row['vin_max'] . "</td>";
            echo "<td>" . $row['max_reservations'] . "</td>";
            echo "</tr>";
        }
        echo "
        </tbody>
        </table>";
    }
    if (!empty($result2)) {
        echo "
        <table class='table table-bordered'>
        <thead>
        <tr>
            <th>Vin</th>
            <th>Minimum Reservations</th>
        </tr>
        </thead>
        <tbody>";
        foreach ($result2 as $row) {
            echo "<tr>";
            echo "<td>" . $row['vin_min'] . "</td>";
            echo "<td>" . $row['min_reservations'] . "</td>";
            echo "</tr>";
        }
    }
    echo "
    </tbody>
    </table>";
?>
