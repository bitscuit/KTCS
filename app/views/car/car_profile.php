<h1>Car Description</h1>
<h2>Car Information</h2>
    <table>
        <tr>
            <th>Vin</th>
            <th>Parking Address</th>
            <th>Make</th>
            <th>Model</th>
            <th>Model Year</th>
            <th>Daily Fee</th>
        </tr>
        <?php
            if (!empty($carInfo)) {
                foreach ($carInfo as $row) {
                    echo "<tr>";
                    echo "<td>" . $row['vin'] . "</td>";
                    echo "<td>" . $row['parking_address'] . "</td>";
                    echo "<td>" . $row['make'] . "</td>";
                    echo "<td>" . $row['model'] . "</td>";
                    echo "<td>" . $row['make_year'] . "</td>";
                    echo "<td>" . $row['daily_rental_fee'] . "</td>";
                    echo "</tr>";
                }
            }
        ?>
    </table>
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
<h2>Car Comments</h2>
    <table>
        <tr>
            <th>Rating</th>
            <th>Comment</th>
            <th>Time</th>
        </tr>
        <?php
            if (!empty($carComment)) {
                foreach ($carComment as $row) {
                    echo "<tr>";
                    echo "<td>" . $row['rating'] . "</td>";
                    echo "<td>" . $row['comment_text'] . "</td>";
                    echo "<td>" . $row['comment_time'] . "</td>";
                    echo "</tr>";
                }
            }
        ?>
    </table>
