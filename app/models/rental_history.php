<?php
class RentalHistory {
    // we define 3 attributes
    // they are public so that we can access them using $post->author directly
	public $vin;
	public $member_num;
	public $pick_up_odometer_reading;
	public $drop_off_odometer_reading;
	public $status;
	public $rent_date;
	public $pick_up_time;
	public $drop_off_time;

    public function __construct($vin, $member_num, $pick_up_odometer_reading, $drop_off_odometer_reading, $status, $rent_date, $pick_up_time, $drop_off_time) {
		$this->vin = $vin;
		$this->member_num = $member_num;
		$this->pick_up_odometer_reading = $pick_up_odometer_reading;
		$this->drop_off_odometer_reading = $drop_off_odometer_reading;
		$this->status = $status;
		$this->rent_date = $rent_date;
		$this->pick_up_time = $pick_up_time;
		$this->drop_off_time = $drop_off_time;
	}

	// Select specific car's rental history.
    public static function selectCarHistory($vin) {
        $list = [];
        $db = Db::getInstance();
		$sql = "SELECT * FROM rental_history WHERE vin = :vin";
        $req = $db->prepare($sql);
        $req->bindParam(':vin', $vin);
        $req->execute();
        $history = $req->fetchAll(PDO::FETCH_ASSOC);

        //returns list of history
        return $history;
    }

	// Select specific member's rental history.
    public static function selectHistory() {
        $list = [];
        $db = Db::getInstance();
		$sql = "SELECT vin, rent_date, pick_up_odometer_reading, drop_off_odometer_reading, pick_up_time, drop_off_time, status FROM rental_history";
        $sql .= ' WHERE member_num = :member_num';
        $req = $db->prepare($sql);
        $req->bindParam(':member_num', $_SESSION["memberNum"]);

        $req->execute();
        $history = $req->fetchAll(PDO::FETCH_ASSOC);

        // Checks to see that user exists. Returns true if so. False otherwise.
        return $history;
    }
} // end User class
?>
