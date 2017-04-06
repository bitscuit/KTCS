<?php
	echo "<h1>Car Description</h1>";
	echo "<h2>Car Information</h2>";
	if (!empty($carInfo)) {
		$table = "<table class='table table-bordered>";
		$table .= "<thead class='thead-inverse'>";
        $table .= "<tr>";
        $table .= "<th>Vin</th>";
        $table .= "<th>Parking Address</th>";
		$table .= "<th>Make</th>";
		$table .= "<th>Model</th>";
		$table .= "<th>Model Year</th>";
		$table .= "<th>Daily Fee</th>";
        $table .= "</tr>";
        $table .= "</thead>";
		$table .= "<tbody>";
		foreach ($carInfo as $row) {
			$table .= "<tr>";
			$table .= "<td>" . $row['vin'] . "</td>";
			$table .= "<td>" . $row['parking_address'] . "</td>";
			$table .= "<td>" . $row['make'] . "</td>";
			$table .= "<td>" . $row['model'] . "</td>";
			$table .= "<td>" . $row['make_year'] . "</td>";
			$table .= "<td>" . $row['daily_rental_fee'] . "</td>";
			$table .= "</tr>";
		}
		$table .= "</tbody>";
		$table .= "</table>";
		echo $table;
	} else {
		echo "No available cars";
	}
?>
<h2>Post Comment</h2>
    <form id="registerform" class="form-horizontal" role="form" action="" method="POST">
       <div class="row">
           <label for="rating" class="col-md-1 control-label">Rating</label>
           <div class="col-md-2">
               <select name="rating">
                   <option value="4">4</option>
                   <option value="3">3</option>
                   <option value="2">2</option>
                   <option value="1">1</option>
               </select>
           </div>

            <label for="comment" class="col-md-1 control-label">Comment</label>
            <div class="col-md-2">
                <input type="text" name="comment">
            </div>

            <div class="row" style="text-align:center;">
        		<input type="submit" class="btn btn-info" id="btn-login">
        	</div>
        </div>
    </form>
<?php
	echo "<h2>Car Comments</h2>";
    echo "<table class='table table-bordered'>";
	echo "<thead class='thead-inverse'>";
    echo "<th>Rating</th>";
    echo "<th>Comment</th>";
    echo "<th>Time</th>";
	echo "<th>Response</th>";
    echo "</tr>";
	echo "</thead>";
	echo "</tbody>";
	if (!empty($carComment)) {
		foreach ($carComment as $row) {
			echo "<tr>";
			echo "<td>" . $row['rating'] . "</td>";
			echo "<td>" . $row['comment_text'] . "</td>";
			echo "<td>" . $row['comment_time'] . "</td>";
			echo "<td>" . $row['reply'] . "</td>";
			echo "</tr>";
		}
		echo "</body>";
		echo "</table>";
	}
?>
