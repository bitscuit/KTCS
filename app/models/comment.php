<?php
    class Comment {
        public $memberNum;
        public $vin;
        public $rating;
        public $commentText;
        public $commentTime;

        public function __construct($memberN, $vinNum, $rat, $commentT,
                                     $commentTi) {
            $this->memberNum = $memberN;
            $this->vin = $vinNum;
            $this->rating = $rat;
            $this->commentText = $commentT;
            $this->commentTime = $commenTi;
        }

        public function comment() {

        }
    }
?>
