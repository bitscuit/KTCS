<?php
    class Comment {
        public $memberNum;
        public $vin;
        public $rating;
        public $commentText;
        public $commentTime;

        public function __construct($memberN, $vinNum, $rat, $commentT,
                                     $commentTi) {
            $this->memberNum = $memberN;
            $this->vin = $vinNum;
            $this->rating = $rat;
            $this->commentText = $commentT;
            $this->commentTime = $commenTi;
        }

        public function insertComment($rating, $commentText, $vin) {
            $list = [];
			$db = Db::getInstance();
			$sql = "INSERT INTO comment (member_num, vin, rating, comment_text,
                comment_time) VALUES (:memberNum, :vin, :rating, :commentText,
                DEFAULT)";
			$req = $db->prepare($sql);
			$req->bindParam(":memberNum", $_SESSION["memberNum"]);
			$req->bindParam(":vin", $vin);
            $req->bindParam(":rating", $rating);
            $req->bindParam(":commentText", $commentText);
			$success = $req->execute();
			// Checks to see that user exists. Returns true if so. False otherwise.
			if ($success != null) {
				return true;
			} else {
				return false;
			}
        }

        public function selectVin() {
            $list = [];
            $db = Db::getInstance();
            $sql = "SELECT vin FROM car";
            $req = $db->prepare($sql);
            $req->execute();
            $list = $req->fetchAll(PDO::FETCH_ASSOC);
            return $list;
        }
    }
?>