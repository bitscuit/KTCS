<table>
    <tr>
        <th>Vin</th>
        <th>Reservation Start Date</th>
        <th>Reservation End Date</th>
        <th>Access Code</th>
    </tr>
    <?php
    if (!empty($reservations)) {
        foreach ($reservations as $row) {
            echo "<tr>";
            echo "<td>" . $row["vin"] . "</td>";
            echo "<td>" . $row["reservation_start_date"] . "</td>";
            echo "<td>" . $row["reservation_end_date"] . "</td>";
            echo "<td>" . $row["access_code"] . "</td>";
            echo "</tr>";
        }
    }
    ?>
</table>
