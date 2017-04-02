<h1>Car Description</h1>
<h2>Car Information</h2>
    <table>
        <tr>
            <th>Vin</th>
            <th>Parking Address</th>
            <th>Make</th>
            <th>Model</th>
            <th>Model Year</th>
            <th>Daily Fee</th>
        </tr>
        <?php
            if (!empty($carInfo)) {
                foreach ($carInfo as $row) {
                    echo "<tr>";
                    echo "<td>" . $row['vin'] . "</td>";
                    echo "<td>" . $row['parking_address'] . "</td>";
                    echo "<td>" . $row['make'] . "</td>";
                    echo "<td>" . $row['model'] . "</td>";
                    echo "<td>" . $row['make_year'] . "</td>";
                    echo "<td>" . $row['daily_rental_fee'] . "</td>";
                    echo "</tr>";
                }
            }
        ?>
    </table>
<h2>Car Comments</h2>
    <table>
        <tr>
            <th>Rating</th>
            <th>Comment</th>
            <th>Time</th>
        </tr>
        <?php
            if (!empty($carComment)) {
                foreach ($carComment as $row) {
                    echo "<tr>";
                    echo "<td>" . $row['rating'] . "</td>";
                    echo "<td>" . $row['comment_text'] . "</td>";
                    echo "<td>" . $row['comment_time'] . "</td>";
                    echo "</tr>";
                }
            }
        ?>
    </table>
