<table>
    <tr>
        <th>Vin</th>
        <th>Member Number</th>
        <th>Pick Up Odometer Reading</th>
        <th>Drop Off Odometer Reading</th>
        <th>Status</th>
        <th>Rent Date</th>
        <th>Pick Up Time</th>
        <th>Drop Off Time</th>
    </tr>
    <?php
        if (!empty($result)) {
            foreach ($result as $row) {
                echo "<tr>";
                echo "<td>" . $row['vin'] . "</td>";
                echo "<td>" . $row['member_num'] . "</td>";
                echo "<td>" . $row['pick_up_odometer_reading'] . "</td>";
                echo "<td>" . $row['drop_off_odometer_reading'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                echo "<td>" . $row['rent_date'] . "</td>";
                echo "<td>" . $row['pick_up_time'] . "</td>";
                echo "<td>" . $row['drop_off_time'] . "</td>";
                echo "</tr>";
            }
        }
    ?>
</table>
