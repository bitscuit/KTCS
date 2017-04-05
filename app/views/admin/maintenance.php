<table>
    <tr>
        <th>Vin</th>
        <th>Last Maintenance Date</th>
        <th>Odometer Reader At Last Maintenance</th>
        <th>Odometer Reading Now</th>
    </tr>
    <?php
        if (!empty($result)) {
            foreach ($result as $row) {
                echo "<tr>";
                echo "<td>" . $row['vin'] . "</td>";
                echo "<td>" . $row['maintenance_date'] . "</td>";
                echo "<td>" . $row['odometer_reading'] . "</td>";
                echo "<td>" . $row['pick_up_odometer_reading'] . "</td>";
                echo "</tr>";
            }
        }
    ?>
</table>
