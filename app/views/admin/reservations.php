<?php
    echo "<table class='table table-bordered'>
    <thead>
    <tr>
        <th>Vin</th>
        <th>Reservation Start Date</th>
        <th>Reservation End Date</th>
        <th>Access Code</th>
    </tr>
    </thead>
    <tbody>";
    if (!empty($result)) {
        foreach ($result as $row) {
            echo "<tr>";
            echo "<td>" . $row['vin'] . "</td>";
            echo "<td>" . $row['reservation_start_date'] . "</td>";
            echo "<td>" . $row['reservation_end_date'] . "</td>";
            echo "<td>" . $row['access_code'] . "</td>";
            echo "</tr>";
        }
    }
    echo "
    </tbody>
    </table>";
?>
