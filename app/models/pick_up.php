<?php
	class PickUp {
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

		public static function insertPickUp($vin, $member_num, $pick_up_reading, $status, $rent_date, $pick_up_time) {
			$list = [];
			$db = Db::getInstance();
			$sql = "INSERT INTO rental_history (vin, member_num, pick_up_odometer_reading, status, rent_date, pick_up_time)";
			$sql .= " VALUES (:vin, :member_num, :pick_up_reading, :status, :rent_date, :pick_up_time)";
			$req = $db->prepare($sql);
			$req->bindParam(":vin", $vin);
			$req->bindParam(":member_num", $member_num);
			$req->bindParam(":pick_up_reading", $pick_up_reading);
			$req->bindParam(":status", $status);
			$req->bindParam(":rent_date", $rent_date);
			$req->bindParam(":pick_up_time", $pick_up_time);
			$req->execute();
			$member = $req->fetch();
			
			return $member;
		}
	} // end PickUp class
?>
