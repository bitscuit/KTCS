<?php
class Location {
    public $location;
    public $numSpaces;

    public function __construct($loc, $nSpaces) {
        $this->location = $loc;
        $this->numSpaces = $nSpaces;
    }

    public static function all() {
        $list = [];
        $db = Db::getInstance();
        $sql = 'SELECT parking_address FROM parking_location';
        $req = $db->prepare($sql);
        $req->execute();
        $list = $req->fetchAll(PDO::FETCH_ASSOC);
        return $list;
    }
}
?>
