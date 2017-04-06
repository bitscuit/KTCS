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
			$table .= "<tr>";
			$table .= "<td><a href=?controller=admin&action=getViewMemberInvoice&memberNum=" . $row['member_num'] . ">" . $row['member_num'] . "</a></td>";
			$table .= "</tr>";
		}
		$table .= "</tbody>";
		$table .= "</table>";
		echo $table;
	}
?>
