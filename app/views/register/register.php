<!-- this needs more comments -->

<div class="container">
	<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
		<div class="panel panel-info" >
			<div class="panel-heading">
				<div class="panel-title">Register</div>
			</div>

			<div style="padding-top:30px" class="panel-body" >

				<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

				<form id="loginform" class="form-horizontal" role="form">

					<div class="form-group">
						<label for="first_name" class="col-md-3 control-label">First Name</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="first_name" placeholder="First Name">
						</div>
					</div>
					
					<div class="form-group">
						<label for="last_name" class="col-md-3 control-label">Last Name</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="last_name" placeholder="Last Name">
						</div>
					</div>
					
					<div class="form-group">
						<label for="phone_num" class="col-md-3 control-label">Phone #</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="phone_num" placeholder="Phone #">
						</div>
					</div>
					
					<div class="form-group">
						<label for="email" class="col-md-3 control-label">Email</label>
						<div class="col-md-9">
							<input type="email" class="form-control" name="email" placeholder="Email Address">
						</div>
					</div>
					
					<div class="form-group">
						<label for="license_num" class="col-md-3 control-label">License #</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="license_num" placeholder="License Number">
						</div>
					</div>
					
					<div class="form-group">
						<label for="username" class="col-md-3 control-label">Username</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="username" placeholder="Username">
						</div>
					</div>

					<div class="form-group">
						<label for="password" class="col-md-3 control-label">Password</label>
						<div class="col-md-9">
							<input type="password" class="form-control" name="passwd" placeholder="Password">
						</div>
					</div>

					<div style="margin-top:10px" class="form-group">
							<!-- Button -->

						<div class="col-sm-12 controls">
							<a href="#"><button class="btn btn-info btn-block" id="btn-login">Register</button></a>
						</div>
					</div>

					<div class="form-group">
							<div class="col-md-12 control">
								<div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
									Have an account?
								<a href="?controller=sign_in&action=getViewSignIn">
									Sign-In here!
								</a>
								</div>
							</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
