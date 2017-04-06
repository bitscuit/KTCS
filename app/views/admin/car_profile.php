<?php
	echo "<h2>Car Comments</h2>";
    echo "<table class='table table-bordered'>";
	echo "<thead class='thead-inverse'>";
    echo "<th>Rating</th>";
    echo "<th>Member #</th>";
    echo "<th>Comment</th>";
    echo "<th>Time</th>";
    echo "<th>Reply</th>";
    echo "</tr>";
	echo "</thead>";
	echo "</tbody>";
	if (!empty($carComment)) {
		foreach ($carComment as $row) {
			echo "<form id='registerform' class='form-horizontal' role='form' action='?controller=admin&action=replyToComment' method='POST'>";
			echo "<tr>";
			echo "<td>" . $row['rating'] . "</td>";
			echo "<td>" . $row['member_num'] . "</td>";
			echo "<input type='hidden' value='" . $_GET["vin"] . "' name='vin'/>";
			echo "<input type='hidden' value='" . $row["member_num"] . "' name='memberNum'/>";
			echo "<input type='hidden' value='" . $row["comment_time"] . "' name='commentTime'/>";
			echo "<td>" . $row['comment_text'] . "</td>";
			echo "<td>" . $row['comment_time'] . "</td>";
			if ($row['reply'] == null || $row['reply'] == "") {
				echo "<td><input type='text' class='form-control' name='reply'></td>";
				echo "<td><input type='submit' class='btn btn-info' id='btn-login'></td>";
			} else {
				echo "<td>" . $row['reply'] . "</td>";
			}
			echo "</tr>";
			echo "</form>";
		}
		echo "</body>";
		echo "</table>";
	}
?>
