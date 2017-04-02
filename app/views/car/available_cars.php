<!-- view to show user the list of available cars on a given date -->
<form id="registerform" class="form-horizontal" role="form" action="" method="POST">

	<!-- pick  start date -->
	<div class="row">
		<label for="startDate" class="col-md-1 control-label">Start Date</label>
		<div class="col-md-2">
			<input type="date" name="startDate">
		</div>

		<!-- pick end date -->
		<label for="endDate" class="col-md-1 control-label">End Date</label>
		<div class="col-md-2">
			<input type="date" name="endDate">
		</div>

		<!-- pick  start date -->
		<label for="make" class="col-md-1 control-label">Make</label>
		<div class="col-md-2">
			<input type="date" name="make">
		</div>

		<!-- pick end date -->
		<label for="model" class="col-md-1 control-label">Model</label>
		<div class="col-md-2">
			<input type="date" name="model">
		</div>
	</div>
	
	<div class="row">
		<!-- pick  start date -->
		<label for="year" class="col-md-1 control-label">Year</label>
		<div class="col-md-2">
			<input type="date" name="year">
		</div>

		<!-- pick end date -->
		<label for="rentalFee" class="col-md-1 control-label">Rental Fee</label>
		<div class="col-md-2">
			<input type="date" name="rentalFee">
		</div>

		<!-- pick  start date -->
		<label for="location" class="col-md-1 control-label">Location</label>
		<div class="col-md-2">
			<input type="date" name="location">
		</div>
	</div>
	
	<div class="row" style="text-align:center;">
		<input type="submit" class="btn btn-info" id="btn-login">
	</div>
</form>
