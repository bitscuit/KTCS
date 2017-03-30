<!-- this needs more comments -->

<div class="container">
	<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
		<div class="panel panel-info" >
			<div class="panel-heading">
				<div class="panel-title">Comment</div>
			</div>

			<div style="padding-top:30px" class="panel-body" >

				<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

				<form id="registerform" class="form-horizontal" role="form" action="" method="POST">

                    <div class="form-group">
						<label for="vin" class="col-md-3 control-label">Vin</label>
						<div class="col-md-9">
							<select name="vin[]">
                                <?php
                                    foreach ($list as $row) {
                                        echo "<option value=" . $row["vin"] . ">" . $row['vin'] . "</option>";
                                    }
                                ?>
                            </select>
						</div>
					</div>

                    <div class="form-group">
						<label for="rating" class="col-md-3 control-label">Rating</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="rating">
						</div>
					</div>


					<div class="form-group">
						<label for="commentText" class="col-md-3 control-label">Comment</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="commentText" placeholder="Let us know how we did...">
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
