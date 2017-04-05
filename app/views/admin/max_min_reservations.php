<table>
    <tr>
        <th>Vin</th>
        <th>Maximum Reservations</th>
    </tr>
    <?php
        if (!empty($result1)) {
            foreach ($result1 as $row) {
                echo "<tr>";
                echo "<td>" . $row['vin_max'] . "</td>";
                echo "<td>" . $row['max_reservations'] . "</td>";
                echo "</tr>";
            }
        }
    ?>
</table>
<table>
    <tr>
        <th>Vin</th>
        <th>Minimum Reservations</th>
    </tr>
    <?php
        if (!empty($result2)) {
            foreach ($result2 as $row) {
                echo "<tr>";
                echo "<td>" . $row['vin_min'] . "</td>";
                echo "<td>" . $row['min_reservations'] . "</td>";
                echo "</tr>";
            }
        }
    ?>
</table>
