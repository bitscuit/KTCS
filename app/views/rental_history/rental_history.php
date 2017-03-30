<!-- view for the sign-in form -->
<div class="container">
	<?php
		$table = "<table border=1><tr>";
		$table .= "<th>Vin</th>";
		$table .= "<th>Rent Date</th>";
		$table .= "<th>Pick Up Reading</th>";
		$table .= "<th>Drop Off Reading</th>";
		$table .= "<th>Status</th>";
		$table .= "<th>Pick Up Time</th>";
		$table .= "<th>Drop Off Time</th>";
		$table .= "</tr>";
		// Data still being returned, builds a table as a string
		foreach ($history as $row) {
				$table .= "<tr>";
				$table .= "<td> " . $row["vin"] . " </td>";
				$table .= "<td> " . $row["rent_date"] . " </td>";
				$table .= "<td> " . $row["pick_up_odometer_reading"] . " </td>";
				$table .= "<td> " . $row["drop_off_odometer_reading"] . " </td>";
				$table .= "<td> " . $row["status"] . " </td>";
				$table .= "<td> " . $row["pick_up_time"] . " </td>";
				$table .= "<td> " . $row["drop_off_time"] . " </td>";
				$table .= "</tr>";
		}
		$table .= "</table>";
		echo $table;
	?>
</div>