<!-- view to show user the list of available cars on a given date -->

<div class="container">
	<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
		<div class="panel panel-info" >
			<div class="panel-heading">
				<div class="panel-title">Available Cars</div>
			</div>

			<div style="padding-top:30px" class="panel-body" >

				<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

				<form id="registerform" class="form-horizontal" role="form" action="" method="POST">

					<!-- pick date -->
                    <div class="form-group">
						<label for="carsOnDate" class="col-md-3 control-label">End Date</label>
						<div class="col-md-9">
							<input type="date" name="carsOnDate">
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
