<!-- this needs more comments -->

<div class="container">
	<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
		<div class="panel panel-info" >
			<div class="panel-heading">
				<div class="panel-title">Find Rental History</div>
			</div>

			<div style="padding-top:30px" class="panel-body" >

				<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

				<form id="registerform" class="form-horizontal" role="form" action="" method="POST">

					<div class="form-group">
						<label for="vin" class="col-md-3 control-label">Parking Address</label>
						<div class="col-md-9">
							<select name="vin[]">
                                <?php
                                    foreach ($vin as $row) {
                                        echo "<option value='" . $row["vin"] . "'>" . $row['vin'] . "</option>";
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
<table>
    <tr>
        <th>Vin</th>
        <th>Member Number</th>
        <th>Pick Up Odometer Reading</th>
        <th>Drop Off Odometer Reading</th>
        <th>Status</th>
        <th>Rent Date</th>
        <th>Pick Up Time</th>
        <th>Drop Off Time</th>
    </tr>
    <?php
        if (!empty($result)) {
            foreach ($result as $row) {
                echo "<tr>";
                echo "<td>" . $row['vin'] . "</td>";
                echo "<td>" . $row['member_num'] . "</td>";
                echo "<td>" . $row['pick_up_odometer_reading'] . "</td>";
                echo "<td>" . $row['drop_off_odometer_reading'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                echo "<td>" . $row['rent_date'] . "</td>";
                echo "<td>" . $row['pick_up_time'] . "</td>";
                echo "<td>" . $row['drop_off_time'] . "</td>";
                echo "</tr>";
            }
        }
    ?>
</table>
