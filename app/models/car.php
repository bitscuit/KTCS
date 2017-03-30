<?php
	class Car {
		// we define 3 attributes
		// they are public so that we can access them using $post->author directly
		public $vin;
		public $parking_address;
		public $make;
		public $model;
		public $make_year;
		public $daily_rental_fee;

		public function __construct($vin, $parking_address, $make, $model, $make_year, $daily_rental_fee) {
			$this->vin = $vin;
			$this->parking_address = $parking_address;
			$this->make = $make;
			$this->model = $model;
			$this->make_year = $make_year;
			$this->daily_rental_fee = $daily_rental_fee;
		}
		
		public static function getAvailableCars($date) {
			if (!isset($date)) {
				$date = date("y.m.d");
			}
			$db = Db::getInstance();
			$sql = "SELECT make, model, make_year";
			$sql .= " FROM car NATURAL JOIN reservation"
			$sql .= " reservation_end_date < :date";
			$req = $db->prepare($sql);
			$req-> bindParam(":date", $date);
			$req->execute();
			$list = $req->fetchAll(PDO::FETCH_ASSOC);
			return $list;
		}
	}
?>
