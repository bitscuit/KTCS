<?php
	echo "<h1>Invoice</h1>";

	if (!empty($info) && !empty($total)) {
		$table = "<table class='table table-bordered'>";
		$table .= "<thead class='thead-inverse'>";
		$table .= "<tr>";
		$table .= "<th>Vin</th>";
		$table .= "<th>Start Date</th>";
		$table .= "<th>End Data</th>";
		$table .= "<th>Fee</th>";
        $table .= "<th>Total</th>";
		$table .= "</tr>";
		$table .= "</thead>";
		$table .= "<tbody>";
		foreach ($info as $row) {
			$table .= "<tr>";
			$table .= "<td>" . $row['vin'] . "</td>";
			$table .= "<td>" . $row['rent_date'] . "</td>";
			$table .= "<td>" . $row['end_date'] . "</td>";
			$table .= "<td>" . $row['rent_fee'] . "</td>";
            $table .= "<td></td>";
			$table .= "</tr>";
		}
        $table .= "<tr>";
        $table .= "<td></td>";
        $table .= "<td></td>";
        $table .= "<td></td>";
        $table .= "<td></td>";
        $table .= "<td>" . $total[0]["rent_total"] . "</td>";
        $table .= "</tr>";
		$table .= "</tbody>";
		$table .= "</table>";
		echo $table;
	}
?>
