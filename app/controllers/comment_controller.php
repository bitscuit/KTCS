<?php
class CommentController {
    public function getViewComment() {
        $list = Comment::selectVin();
        if(isset($_POST["rating"]) && isset($_POST["commentText"])) {
            $rating = $_POST["rating"];
            $commentText = $_POST["commentText"];
            $vin = $_POST["vin"][0];
            echo $rating . $commentText . $_POST["vin"][0] . $_SESSION["memberNum"];
            if (Comment::insertComment($rating, $commentText, $vin)) {
                header("Location: ?controller=home&action=getViewHome");
                exit;
            }
        }
        require_once("views/comment/comment.php");
    }
}
?>
