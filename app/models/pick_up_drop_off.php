<?php
	class PickUpDropOff {
		public $vin;
		public $member_num;
		public $pick_up_reading;
		public $status;
		public $rent_date;
		public $pick_up_time;

		public function __construct($vin, $member_num, $pick_up_reading, $status,
		$rent_date, $pick_up_time) {
			$this->vin     = $vin;
			$this->member_num       = $member_num;
			$this->pick_up_reading  = $pick_up_reading;
			$this->status      		= $status;
			$this->rent_date        = $rent_date;
			$this->pick_up_time    	= $pick_up_time;
		}

		public static function insertPickUp($vin, $member_num, $pick_up_reading) {
			$list = [];
			$db = Db::getInstance();
			$sql = "INSERT INTO rental_history (vin, member_num, pick_up_odometer_reading, rent_date, pick_up_time)";
			$sql .= " VALUES (:vin, :member_num, :pick_up_reading, CURDATE(), CURTIME())";
			$req = $db->prepare($sql);
			$req->bindParam(":vin", $vin);
			$req->bindParam(":member_num", $member_num);
			$req->bindParam(":pick_up_reading", $pick_up_reading);
			$member = $req->execute();

			return $member;
		}

		public static function insertDropOff($vin, $member_num, $drop_off_reading, $status, $rent_date) {
			$db = Db::getInstance();
			$sql = "UPDATE rental_history SET drop_off_odometer_reading = :drop_off_reading, status = :status, drop_off_time = CURTIME()
				WHERE vin = :vin AND member_num = :member_num AND rent_date = :rent_date";
			$req = $db->prepare($sql);
			$rent_date = new DateTime($rent_date);
			$req->bindParam(":rent_date", $rent_date->format('Y-m-d'));
			$req->bindParam(":vin", $vin);
			$req->bindParam(":member_num", $member_num);
			$req->bindParam(":drop_off_reading", $drop_off_reading);
			$req->bindParam(":status", $status);
			$member = $req->execute();

			return $member;
		}

		public static function insertRentFee($vin, $member_num, $rent_date, $dailyRentalFee) {
			$db = Db::getInstance();
			$sql = "UPDATE rental_history SET rent_fee = DATEDIFF(CURDATE(), :rent_date) * :daily_rental_fee
				WHERE vin = :vin AND member_num = :member_num AND rent_date = :rent_date";
			$req = $db->prepare($sql);
			$rent_date = new DateTime($rent_date);
			$req->bindParam(":rent_date", $rent_date->format('Y-m-d'));
			$req->bindParam(":vin", $vin);
			$req->bindParam(":member_num", $member_num);
			$req->bindParam(":daily_rental_fee", $dailyRentalFee);
			$req->bindParam(":status", $status);
			$member = $req->execute();

			return $member;
		}
	} // end PickUp class
?>
