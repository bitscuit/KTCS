<!-- view to show user the list of available cars on a given date -->
				<form id="registerform" class="form-horizontal" role="form" action="" method="POST">

					<!-- pick  start date -->
                    <div class="form-group">
						<label for="startDate" class="col-md-3 control-label">Start Date</label>
						<div class="col-md-9">
							<input type="date" name="startDate">
						</div>
					</div>

					<!-- pick end date -->
					<div class="form-group">
						<label for="endDate" class="col-md-3 control-label">End Date</label>
						<div class="col-md-9">
							<input type="date" name="endDate">
						</div>
					</div>

					<div style="margin-top:10px" class="form-group">
                        <div class="col-sm-12 controls">
							<input type="submit" class="btn btn-info btn-block" id="btn-login">
						</div>
					</div>
				</form>
