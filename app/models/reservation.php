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

		public static function insertReservation($vin, $start_date, $access_code, $end_date) {
			$list = [];
			$db = Db::getInstance();
			$sql = 	"INSERT INTO reservation";
			$sql .= " (reservation_num, member_num, vin, reservation_start_date, access_code, reservation_end_date)";
			$sql .= " VALUES (DEFAULT, :member_num, :vin, :start_date, :access_code, :end_date)";
			$req = $db->prepare($sql);
			$req->bindParam(":member_num", 	$_SESSION["memberNum"]);
			$req->bindParam(":vin", 		$vin);
			$req->bindParam(":start_date", 	$start_date);
			$req->bindParam(":access_code", $access_code);
			$req->bindParam(":end_date", 	$end_date);
			$req->execute();
			$member = $req->fetch();
		} // end insertReservation function

		public static function listReservations($memberNum) {
			$db = Db::getInstance();
			$sql = 	"SELECT vin, reservation_start_date, reservation_end_date, access_code FROM reservation WHERE member_num = :member_num";
			$req = $db->prepare($sql);
			$req->bindParam(":member_num", 	$_SESSION["memberNum"]);
			$req->execute();
			$reservations = $req->fetchAll(PDO::FETCH_ASSOC);
			return $reservations;
		}

		public static function reservationsToday() {
			$db = Db::getInstance();
			$sql = 	"SELECT vin, reservation_start_date, reservation_end_date, access_code FROM reservation WHERE reservation_start_date = CURDATE()";
			$req = $db->prepare($sql);
			$req->execute();
			$reservations = $req->fetchAll(PDO::FETCH_ASSOC);
			return $reservations;
		}

		public static function maxMinReservations($flag) {
			$db = Db::getInstance();
			if ($flag) {
				$sql = 	"SELECT vin AS vin_max, MAX(a) AS max_reservations
					 FROM (
						 SELECT vin, COUNT(*) AS a
						 FROM rental_history
						 GROUP BY vin
					 ) AS countTable
					 WHERE a = (
						 SELECT MAX(a)
						 FROM (
							 SELECT vin, COUNT(*) AS a
							 FROM rental_history
							 GROUP BY vin
						 ) countTable
					 )";
			} else {
				$sql = 	"SELECT vin AS vin_min, MIN(a) AS min_reservations
					 FROM (
						 SELECT vin, COUNT(*) AS a
						 FROM rental_history
						 GROUP BY vin
					 ) AS countTable
					 WHERE a = (
						 SELECT MIN(a)
						 FROM (
							 SELECT vin, COUNT(*) AS a
							 FROM rental_history
							 GROUP BY vin
						 ) countTable
					 )";
			}
			$req = $db->prepare($sql);
			$req->execute();
			$reservations = $req->fetchAll(PDO::FETCH_ASSOC);
			return $reservations;
		}
	} // end Reservation class
?>
