<h1>Reservation Information</h1>
<h2>Car Information</h2>
    <table class="table">
        <tr>
            <th>Vin</th>
            <th>Parking Address</th>
            <th>Make</th>
            <th>Model</th>
            <th>Model Year</th>
            <th>Daily Fee</th>
			<th>Total Fee</th>
        </tr>
        <?php
			echo "start: " . $_POST["startDate"] . " end: " . $_POST["endDate"];
            if (!empty($reservationData)) {
                foreach ($reservationData as $row) {
                    echo "<tr>";
                    echo "<td>" . $_POST['vin'] . "</td>";
                    echo "<td>" . $row['parking_address'] . "</td>";
                    echo "<td>" . $row['make'] . "</td>";
                    echo "<td>" . $row['model'] . "</td>";
                    echo "<td>" . $row['make_year'] . "</td>";
                    echo "<td>" . $row['daily_rental_fee'] . "</td>";
                    echo "<td>" . $_POST['totalDays'] * $row['daily_rental_fee'] . "</td>";
                    echo "</tr>";
                }
            }
        ?>
    </table>
