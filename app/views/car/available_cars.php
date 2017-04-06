<!-- view to show user the list of available cars on a given date -->
<form id="registerform" class="form-horizontal" role="form" action="" method="POST">

	<div class="row">
		<!-- pick  start date -->
		<label for="startDate" class="col-md-1 control-label">Start Date</label>
		<div class="col-md-2">
			<input type="date" value="<?php echo date('Y-m-d'); ?>" name="startDate">
		</div>

		<!-- pick end date -->
		<label for="endDate" class="col-md-1 control-label">End Date</label>
		<div class="col-md-2">
			<input type="date" value="<?php echo $endDate; ?>" name="endDate">
		</div>

		<label for="make" class="col-md-1 control-label">Make</label>
		<div class="col-md-2">
			<select name="make[]">
				<?php
				echo "<option value=''>";
					foreach ($make as $row) {
						echo "<option value=" . $row["make"] . ">" . $row["make"] . "</option>";
					}
				?>
			</select>
		</div>

		<label for="model" class="col-md-1 control-label">Model</label>
		<div class="col-md-2">
			<select name="model[]">
				<?php
					echo "<option value=''>";
					foreach ($model as $row) {
						echo "<option value=" . $row["model"] . ">" . $row["model"] . "</option>";
					}
				?>
			</select>
		</div>
	</div>

	<div class="row">
		<label for="year" class="col-md-1 control-label">Year</label>
		<div class="col-md-2">
			<select name="year[]">
				<?php
					echo "<option value=''>";
					foreach ($year as $row) {
						echo "<option value=" . $row["make_year"] . ">" . $row["make_year"] . "</option>";
					}
				?>
			</select>
		</div>

		<label for="rentalFee" class="col-md-1 control-label">Daily Fee</label>
		<div class="col-md-2">
			<select name="rentalFee[]">
				<?php
					echo "<option value=''>";
					foreach ($rentalFee as $row) {
						echo "<option value=" . $row["daily_rental_fee"] . ">" . $row["daily_rental_fee"] . "</option>";
					}
				?>
			</select>
		</div>

		<label for="location" class="col-md-1 control-label">Location</label>
		<div class="col-md-2">
			<select name="location[]">
				<?php
					echo "<option value=''>";
					foreach ($location as $row) {
						echo "<option value='" . $row["parking_address"] . "'>" . $row["parking_address"] . "</option>";
					}
				?>
			</select>
		</div>
	</div>

	<div class="row" style="text-align:center;">
		<input type="submit" class="btn btn-info" id="btn-login">
	</div>
</form>

<?php
	echo "Start: " . $startDate . " End: " . $endDate;

	if (!empty($list)) {
		$table = "<table class='table table-bordered'>";
		$table .= "<thead class='thead-inverse'>";
		$table .= "<tr>";
		$table .= "<th>Make</th>";
		$table .= "<th>Model</th>";
		$table .= "<th>Year</th>";
		$table .= "<th>Reserve</th>";
		$table .= "</tr>";
		$table .= "</thead>";
		$table .= "<tbody>";
		
		// Hidden inputs used for POST request
		foreach ($list as $row) {
			$table .= "<form id='registerform' class='form-horizontal' role='form' action='?controller=user&action=getViewReservation' method='POST'>";
			$table .= "<tr>";			
			$table .= "<td><a href='?controller=car&action=getViewCar&vin=" . $row["vin"] . "'>" . $row["make"] . "</td>";
			$table .= "<td>" . $row["model"] . "</td>";
			$table .= "<td>" . $row["make_year"] . "</td>";
			$table .= "<input type='hidden' value='" . $row["vin"] . "' name='vin'/>";
			$table .= "<input type='hidden' value='" . $startDate . "' name='startDate'/>";
			$table .= "<input type='hidden' value='" . $endDate . 	"' name='endDate'/>";
			$date1 = new DateTime($startDate);
			$date2 = new DateTime($endDate);
			$interval = $date1->diff($date2);
			$totalDays = $interval->days;
			$table .= "<input type='hidden' value='" . $totalDays . "' name='totalDays'/>";
			$table .= "<td><input type='submit' class='btn btn-info' id='btn-login'></td>";
			$table .= "</tr>";
			$table .= "</form>";
		}
		$table .= "</tbody>";
		$table .= "</table>";
		echo $table;
	} else {
		echo "No available cars on this date";
	}
?>