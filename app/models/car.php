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

		// retrieves list of the car makes
		public static function getMake() {
			$db = Db::getInstance();
			$sql = "SELECT make FROM car ";
			$sql .= "ORDER BY make";
			$req = $db->prepare($sql);
			$req->execute();
			$make = $req->fetchAll(PDO::FETCH_ASSOC);
			return $make;
		}
		
		public static function getModel() {
			$db = Db::getInstance();
			$sql = "SELECT model FROM car ";
			$sql .= "ORDER BY model";
			$req = $db->prepare($sql);
			$req->execute();
			$model = $req->fetchAll(PDO::FETCH_ASSOC);
			return $model;
		}
		
		// Get make year of car
		public static function getYear() {
			$db = Db::getInstance();
			$sql = "SELECT make_year FROM car ";
			$sql .= "ORDER BY make_year";
			$req = $db->prepare($sql);
			$req->execute();
			$year = $req->fetchAll(PDO::FETCH_ASSOC);
			return $year;
		}
		
		// Returns all possible daily rental fees
		public static function getDailyRentalFee() {
			$db = Db::getInstance();
			$sql = "SELECT daily_rental_fee FROM car ";
			$sql .= "ORDER BY daily_rental_fee";
			$req = $db->prepare($sql);
			$req->execute();
			$rentalFee = $req->fetchAll(PDO::FETCH_ASSOC);
			return $rentalFee;
		}
		
		// Returns all possible parking addresses
		public static function getLocation() {
			$db = Db::getInstance();
			$sql = "SELECT parking_address FROM car ";
			$sql .= "ORDER BY parking_address";
			$req = $db->prepare($sql);
			$req->execute();
			$location = $req->fetchAll(PDO::FETCH_ASSOC);
			return $location;
		}
		
		// retrieves list of avaiable cars available for rental on specified date
		// public static function getAvailableCars($startDate, $endDate, $location, $make, $model, $year, $rentalFee) {
		public static function getAvailableCars($startDate, $endDate, $mk, $mkVal, $mdl, $mdlVal, $mkYear, $mkYearVal, $loc, $locVal) {
			$mk = str_replace("'", "", $mk);
			$db = Db::getInstance();
			$sql = "SELECT make, model, make_year, vin";
			$sql .= " FROM car c";
			$sql .= " WHERE NOT EXISTS (SELECT vin FROM reservation r";
			$sql .= " WHERE (reservation_start_date <= :startDate AND reservation_end_date >= :startDate)";
			$sql .= " AND (reservation_start_date <= :endDate AND reservation_end_date >= :endDate)";
			$sql .= " AND c.vin = r.vin)";
			$sql .= " " . $mk;
			$sql .= " " . $mdl;
			$sql .= " " . $mkYear;
			$sql .= " " . $loc;
			// $sql .= " " . $dailyRentFee;
			$req = $db->prepare($sql);
			$startDate = new DateTime($startDate);
			$req->bindParam(":startDate", $startDate->format('Y-m-d'));
			$endDate = new DateTime($endDate);
			$req->bindParam(":endDate", $endDate->format('Y-m-d'));
			
			// If the user didn't select a location
			if ($locVal != "") {
				$req->bindParam(":location", $locVal);
			}
			
			// If the user didn't select a make
			if ($mkVal != "") {
				$req->bindParam(":make", $mkVal);
			}
			
			// If the user didn't select a make
			if ($mdlVal != "") {
				$req->bindParam(":model", $mdlVal);
			}
			
			// If the user didn't select a year
			if ($mkYearVal != "") {
				$req->bindParam(":year", $mkYearVal);
			}
			
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

		public static function getAvailableLocationCars($location) {
			$db = Db::getInstance();
			$sql = "SELECT car.vin, make, model, make_year, daily_rental_fee,
					parking_address, reservation_num, member_num, reservation_start_date,
					reservation_end_date, access_code
			 		FROM car LEFT JOIN reservation ON car.vin = reservation.vin
					WHERE parking_address = :parking_address";
			$req = $db->prepare($sql);
			$req->bindParam(":parking_address", $location);
			$req->execute();
			$list = $req->fetchAll(PDO::FETCH_ASSOC);
			return $list;
		}

		public static function selectInfo($vin) {
			$list = [];
			$db = Db::getInstance();
			$sql = "SELECT * FROM car WHERE vin = :vin";
			$req = $db->prepare($sql);
			$req->bindParam(":vin", $vin);
			$req->execute();
			$list = $req->fetchAll(PDO::FETCH_ASSOC);
			return $list;
		}

		public static function selectCarComments($vin) {
			$list = [];
			$db = Db::getInstance();
			$sql = "SELECT rating, comment_text, comment_time FROM comment WHERE vin = :vin";
			$req = $db->prepare($sql);
			$req->bindParam(":vin", $vin);
			$req->execute();
			$list = $req->fetchAll(PDO::FETCH_ASSOC);
			return $list;
		}

		public static function addCar($vin, $parkingAddress, $make, $model, $makeYear, $dailyRentalFee) {
			$db = Db::getInstance();
			$sql = "INSERT INTO car (vin, parking_address, make, model, make_year, daily_rental_fee) VALUES (:vin, :parking_address, :make, :model, :make_year, :daily_rental_fee)";
			$req = $db->prepare($sql);
			$req->bindParam(":vin", $vin);
			$req->bindParam(":parking_address", $parkingAddress);
			$req->bindParam(":make", $make);
			$req->bindParam(":model", $model);
			$req->bindParam(":make_year", $makeYear);
			$req->bindParam(":daily_rental_fee", $dailyRentalFee);
			$success = $req->execute();
			return $success;
		}
	}
?>
