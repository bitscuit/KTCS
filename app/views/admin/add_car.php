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
						<label for="vin" class="col-md-3 control-label">Vin</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="vin">
						</div>
					</div>

					<div class="form-group">
						<label for="parkingAddress" class="col-md-3 control-label">Parking Address</label>
						<div class="col-md-9">
							<select name="parkingAddress[]">
                                <?php
                                    foreach ($parking as $row) {
                                        echo "<option value='" . $row["parking_address"] . "'>" . $row['parking_address'] . "</option>";
                                    }
                                ?>
                            </select>
						</div>
					</div>

                    <div class="form-group">
						<label for="make" class="col-md-3 control-label">Make</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="make">
						</div>
					</div>

                    <div class="form-group">
						<label for="model" class="col-md-3 control-label">Model</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="model">
						</div>
					</div>

                    <div class="form-group">
						<label for="makeYear" class="col-md-3 control-label">Make Year</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="makeYear">
						</div>
					</div>

                    <div class="form-group">
						<label for="dailyRentalFee" class="col-md-3 control-label">Daily Rental Fee</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="dailyRentalFee">
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
