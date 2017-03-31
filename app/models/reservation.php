<?php
	class Reservation {
		public $reservation_num;
		public $member_num;
		public $vin;
		public $start_date;
		public $access_code;
		public $end_date;

		public function __construct($reservation_num, $member_num, $vin, $reservation_start_date,
		$access_code, $reservation_end_date) {
			$this->reservation_num  = $reservation_num;
			$this->member_num     	= $member_num;
			$this->vin      		= $vin;
			$this->start_date       = $start_date;
			$this->access_code    	= $access_code;
			$this->end_date 		= $end_date;
		}

		public static function insertReservation($reservation_num, $vin, $start_date, $access_code, $end_date) {
			$list = [];
			$db = Db::getInstance();
			$sql = 	"INSERT INTO reservation";
			$sql .= " (member_num, vin, reservation_start_date, access_code, reservation_end_date)";
			$sql .= " VALUES (:member_num, :vin, :start_date, :access_code, :end_date)";
			$req = $db->prepare($sql);
			$req->bindParam(":member_num", 	$_SESSION["memberNum"]);
			$req->bindParam(":vin", 		$vin);
			$req->bindParam(":start_date", 	$start_date);
			$req->bindParam(":access_code", $access_code);
			$req->bindParam(":end_date", 	$end_date);
			$req->execute();
			$member = $req->fetch();
		} // end insertReservation function
	} // end User class
?>