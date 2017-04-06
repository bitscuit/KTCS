<?php
	echo "<h1>Reservation Information</h1>";
	echo "<h2>Car Information</h2>";

	if (!empty($cars)) {
		$table = "<table class='table table-bordered'>";
		$table .= "<thead class='thead-inverse'>";
		$table .= "<tr>";
		$table .= "<th>Vin</th>";
		$table .= "<th>Parking Address</th>";
		$table .= "<th>Make</th>";
		$table .= "<th>Model</th>";
		$table .= "<th>Model Year</th>";
		$table .= "<th>Daily Fee</th>";
		$table .= "</tr>";
		$table .= "</thead>";
		$table .= "<tbody>";
		foreach ($cars as $row) {
			$table .= "<tr>";
			$table .= "<td><a href=?controller=admin&action=getViewCar&vin=" . $row['vin'] . ">" . $row['vin'] . "</a></td>";
			$table .= "<td>" . $row['parking_address'] . "</td>";
			$table .= "<td>" . $row['make'] . "</td>";
			$table .= "<td>" . $row['model'] . "</td>";
			$table .= "<td>" . $row['make_year'] . "</td>";
			$table .= "<td>" . $row['daily_rental_fee'] . "</td>";
			$table .= "</tr>";
		}
		$table .= "</tbody>";
		$table .= "</table>";
		echo $table;
	}
?>
