<table>
    <tr>
        <th>Vin</th>
        <th>Rating</th>
        <th>Comment</th>
        <th>Time</th>
    </tr>
    <?php
    if (!empty($comments)) {
        foreach ($comments as $row) {
            echo "<tr>";
            echo "<td>" . $row["vin"] . "</td>";
            echo "<td>" . $row["rating"] . "</td>";
            echo "<td>" . $row["comment_text"] . "</td>";
            echo "<td>" . $row["comment_time"] . "</td>";
            echo "</tr>";
        }
    }
    ?>
</table>
