<?php
	echo "<h1>Reservation Information</h1>";
	echo "<h2>Car Information</h2>";
	echo "start: " . $_POST["startDate"] . " end: " . $_POST["endDate"];
	
	if (!empty($reservationData)) {
		$table = "<table class='table table-bordered'>";
		$table .= "<thead class='thead-inverse'>";
		$table .= "<tr>";
		$table .= "<th>Vin</th>";
		$table .= "<th>Parking Address</th>";
		$table .= "<th>Make</th>";
		$table .= "<th>Model</th>";
		$table .= "<th>Model Year</th>";
		$table .= "<th>Daily Fee</th>";
		$table .= "<th>Total Fee</th>";
		$table .= "</tr>";
		$table .= "</thead>";
		$table .= "<tbody>";
		foreach ($reservationData as $row) {
			$table .= "<form id='registerform' class='form-horizontal' role='form' action='?controller=user&action=confirmReservation' method='POST'>";
			$table .= "<tr>";
			$table .= "<td>" . $_POST['vin'] . "</td>";
			$table .= "<input type='hidden' value='" . $_POST["vin"] . "' name='vin'/>";
			$table .= "<input type='hidden' value='" . $_POST["startDate"] . "' name='startDate'/>";

			$table .= "<td>" . $row['parking_address'] . "</td>";
			$table .= "<td>" . $row['make'] . "</td>";
			$table .= "<td>" . $row['model'] . "</td>";
			$table .= "<td>" . $row['make_year'] . "</td>";
			$table .= "<td>" . $row['daily_rental_fee'] . "</td>";
			$table .= "<td>" . $_POST['totalDays'] * $row['daily_rental_fee'] . "</td>";
			$table .= "<input type='hidden' value='" . $_POST["startDate"] . "' name='startDate'/>";
			$table .= "<input type='hidden' value='" . $_POST["endDate"] . "' name='endDate'/>";
			$table .= "<td><input type='submit' class='btn btn-info' id='btn-login'></td>";
			$table .= "</tr>";
			$table .= "</form>";
		}
		$table .= "</tbody>";
		$table .= "</table>";
		echo $table;
	}
?>
