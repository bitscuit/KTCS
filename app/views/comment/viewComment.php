<!-- this needs more comments -->

<div class="container">
	<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
		<div class="panel panel-info" >
			<div class="panel-heading">
				<div class="panel-title">View Comment</div>
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
						<label for="rating" class="col-md-3 control-label">Rating</label>
						<div class="col-md-9">
							<select name="rating[]">
                                <option value=""></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
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
