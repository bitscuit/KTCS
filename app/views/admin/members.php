<?php
	echo "<h1>Member Invoice</h1>";

	if (!empty($cars)) {
		$table = "<table class='table table-bordered'>";
		$table .= "<thead class='thead-inverse'>";
		$table .= "<tr>";
		$table .= "<th>Member</th>";
		$table .= "</tr>";
		$table .= "</thead>";
		$table .= "<tbody>";
		foreach ($cars as $row) {
			$table .= "<form id='registerform' class='form-horizontal' role='form' action='?controller=admin&action=getViewMemberInvoice' method='POST'>";
			$table .= "<tr>";
			$table .= "<td>" . $row['member_num'] . "</td>";
			$table .= "<input type='hidden' value='" . $row["member_num"] . "' name='member_num'/>";
			$table .= "<td><input type='submit' class='btn btn-info' id='btn-login'></td>";
			$table .= "</tr>";
			$table .= "</form>";
		}
		$table .= "</tbody>";
		$table .= "</table>";
		echo $table;
	}
?>
