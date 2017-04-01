<!-- this needs more comments -->

<div class="container">
	<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
		<div class="panel panel-info" >
			<div class="panel-heading">
				<div class="panel-title">Pick Up</div>
			</div>

			<div style="padding-top:30px" class="panel-body" >

				<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

				<form id="registerform" class="form-horizontal" role="form" action="" method="POST">

					<div class="form-group">
						<label for="vin" class="col-md-3 control-label">Vin</label>
						<div class="col-md-9">
							<select name="vin[]">
                                <?php
                                    foreach ($vin as $row) {
                                        echo "<option value=" . $row["vin"] . ">" . $row['vin'] . "</option>";
                                    }
                                ?>
                            </select>
						</div>
					</div>

					<div class="form-group">
						<label for="time" class="col-md-3 control-label">Time</label>
						<div class="col-md-9">
							<input type="time" class="form-control" name="time">
						</div>
					</div>

					<div class="form-group">
						<label for="odometer_reading" class="col-md-3 control-label">Odometer Reading</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="odometer_reading">
						</div>
					</div>

					<div class="form-group">
						<label for="car_status" class="col-md-3 control-label">Car Status</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="car_status">
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
