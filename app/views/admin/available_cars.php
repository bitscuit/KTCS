<!-- this needs more comments -->

<div class="container">
	<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
		<div class="panel panel-info" >
			<div class="panel-heading">
				<div class="panel-title">Add Car</div>
			</div>

			<div style="padding-top:30px" class="panel-body" >

				<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

				<form id="registerform" class="form-horizontal" role="form" action="" method="POST">

					<div class="form-group">
						<label for="parking_address" class="col-md-3 control-label">Location</label>
						<div class="col-md-9">
							<select name="parking_address[]">
                                <?php
                                    foreach ($location as $row) {
                                        echo "<option value='" . $row["parking_address"] . "'>" . $row['parking_address'] . "</option>";
                                    }
                                ?>
                            </select>
						</div>
					</div>

					<div style="margin-top:10px" class="form-group">
						<div class="col-sm-12 controls">
							<input type="submit" class="btn btn-info btn-block" id="btn-login">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
    <?php
        if (!empty($result)) {
			echo "<table class='table table-bordered'>
			<thead>
			<tr>
		        <th>Vin</th>
		        <th>Make</th>
		        <th>Model</th>
		        <th>Make Year</th>
		        <th>Daily Rental Fee</th>
		        <th>Parking Location</th>
		        <th>Reservation Number</th>
		        <th>Member Number</th>
		        <th>Reservation start Date</th>
		        <th>Reservation End Date</th>
		        <th>Access Code</th>
		    </tr>
			</thead>
			<tbody>";
            foreach ($result as $row) {
                echo "<tr>";
                echo "<td>" . $row['vin'] . "</td>";
                echo "<td>" . $row['make'] . "</td>";
                echo "<td>" . $row['model'] . "</td>";
                echo "<td>" . $row['make_year'] . "</td>";
                echo "<td>" . $row['daily_rental_fee'] . "</td>";
                echo "<td>" . $row['parking_address'] . "</td>";
                echo "<td>" . $row['reservation_num'] . "</td>";
                echo "<td>" . $row['member_num'] . "</td>";
                echo "<td>" . $row['reservation_start_date'] . "</td>";
                echo "<td>" . $row['reservation_end_date'] . "</td>";
                echo "<td>" . $row['access_code'] . "</td>";
                echo "</tr>";
            }
			echo "
			</tbody>
			</table>";
        }
    ?>
