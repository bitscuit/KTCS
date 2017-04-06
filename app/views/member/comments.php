<?php
    if (!empty($comments)) {
        echo "<table class='table table-bordered'>";
		echo "<thead class='thead-inverse'>";
		echo "<tr>";
        echo "<th>Vin</th>";
        echo "<th>Rating</th>";
        echo "<th>Comment</th>";
        echo "<th>Time</th>";
		echo "</tr>";
		echo "</thead>";
		echo "<tbody>";
		foreach ($comments as $row) {
            echo "<tr>";
            echo "<td>" . $row["vin"] . "</td>";
            echo "<td>" . $row["rating"] . "</td>";
            echo "<td>" . $row["comment_text"] . "</td>";
            echo "<td>" . $row["comment_time"] . "</td>";
            echo "</tr>";
        }
		echo "</tbody>";
		echo "</table>";
    }
    ?>
