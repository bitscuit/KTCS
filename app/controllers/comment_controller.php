<?php
class CommentController {
    public function getViewPostComment() {
        $list = Comment::selectVin();
        if(isset($_POST["rating"]) && isset($_POST["commentText"])) {
            $rating = $_POST["rating"][0];
            $commentText = $_POST["commentText"];
            $vin = $_POST["vin"][0];
            echo $rating . $commentText . $_POST["vin"][0] . $_SESSION["memberNum"];
            if (Comment::insertComment($rating, $commentText, $vin)) {
                header("Location: ?controller=home&action=getViewHome");
                exit;
            }
        }
        require_once("views/comment/postComment.php");
    }

    public function getViewComment() {
        $vin = Comment::selectVin();
        echo "<table>
            <tr>
                <th>Vin</th>
                <th>Rating</th>
                <th>Comment Text</th>
                <th>Comment Time</th>
            </tr>";
        if(isset($_POST["rating"]) && isset($_POST["vin"])) {
            $list = Comment::selectComment($_POST["vin"][0], $_POST["rating"][0]);
            if ($list != null) {
                foreach ($list as $row) {
                    echo "<tr>";
                    echo "<td>" . $row["vin"] . "</td>";
                    echo "<td>" . $row["rating"] . "</td>";
                    echo "<td>" . $row["comment_text"] . "</td>";
                    echo "<td>" . $row["comment_time"] . "</td>";
                    echo "</tr>";
                }
            }
        }
        echo "</table>";
        require_once("views/comment/ViewComment.php");
    }
}
?>
