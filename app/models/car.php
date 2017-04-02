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

		// retrieves list of all cars
		public static function getAllCars() {

		}

		// retrieves list of avaiable cars available for rental on specified date
		public static function getAvailableCars($startDate, $endDate) {
			$db = Db::getInstance();
			$sql = "SELECT make, model, make_year";
			$sql .= " FROM car NATURAL JOIN reservation";
			$sql .= " WHERE NOT (reservation_start_date < :startDate AND reservation_end_date > :startDate)";
			$sql .= " AND NOT (reservation_start_date < :endDate AND reservation_end_date > :endDate)";
			$req = $db->prepare($sql);
			$startDate = new DateTime($startDate);
			$req->bindParam(":startDate", $startDate->format('Y-m-d'));
			$endDate = new DateTime($endDate);
			$req->bindParam(":endDate", $endDate->format('Y-m-d'));
			$req->execute();
			$list = $req->fetchAll(PDO::FETCH_ASSOC);
			return $list;
		}

		public static function getLocationCars($location) {
			$list = [];
			$db = Db::getInstance();
			$sql = "SELECT make, model, make_year";
			$sql .= " FROM car NATURAL JOIN reservation";
			$sql .= " WHERE NOT (reservation_start_date < CURDATE() AND CURDATE()";
			$sql .= " < reservation_end_date) AND parking_address = :location";
			$req = $db->prepare($sql);
			$req->bindParam(":location", $location);
			$req->execute();
			$list = $req->fetchAll(PDO::FETCH_ASSOC);
			return $list;
		}
	}
?>
