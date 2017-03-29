<!-- this needs more comments -->

<div class="container">
	<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
		<div class="panel panel-info">
			<div class="panel-heading">
				<div class="panel-title">Sign In</div>
			</div>

			<div style="padding-top:30px" class="panel-body">

				<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

				<form id="loginform" class="form-horizontal" role="form" action="" method="POST">

					<div style="margin-bottom: 25px" class="input-group col-sm-12 controls">
						<input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username or email">
					</div>

					<div style="margin-bottom: 25px" class="input-group col-sm-12 controls">
						<input id="login-password" type="password" class="form-control" name="password" placeholder="password">
					</div>

					<div style="margin-top:10px" class="form-group">
						<!-- Button -->

						<div class="col-sm-12 controls">
							<input type="submit" class="btn btn-info btn-block" id="btn-login">
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-12 control">
							<div style="border-top: 1px solid#888; padding-top:15px; font-size:85%">
								Don't have an account?
								<a href="?controller=register&action=getViewRegister">
									Register Here
								</a>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>