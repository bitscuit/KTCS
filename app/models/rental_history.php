<?php
class RentalHistory {
    // we define 3 attributes
    // they are public so that we can access them using $post->author directly
	public $vin;
	public $member_num;
	public $pick-up_odometer_reading;
	public $drop-off_odometer_reading;
	public $status;
	public $rent_date;
	public $pick-up_time;
	public $drop-off_time;
	
    public function __construct($vin, $member_num, $pick-up_odometer_reading, $drop-off_odometer_reading, $status, $rent_date, pick-up_time, drop-off_time) {
		$this->$vin = $vin;
		$this->$member_num = $member_num;
		$this->$pick-up_odometer_reading = $pick-up_odometer_reading;
		$this->$drop-off_odometer_reading = $drop-off_odometer_reading;
		$this->$status = $status;
		$this->$rent_date = $rent_date;
		$this->$pick-up_time = $pick-up_time;
		$this->$drop-off_time = $drop-off_time;
	}

	// Select specific member's rental history.
    public static function selectHistory($member_num) {
        $list = [];
        $db = Db::getInstance();
        $sql = 'SELECT vin, rent_date, pick-up_odometer_reading, drop-off_odometer_reading, pick-up_time, drop-off_time, status FROM `Rental History`';
        $sql .= ' WHERE member_num = :member_num';
        $req = $db->prepare($sql);
        $req->bindParam(':member_num', $member_num);
        $req->execute();
        $history = $req->fetchAll();

        // Checks to see that user exists. Returns true if so. False otherwise.
        return $history;
    }
} // end User class
?>
