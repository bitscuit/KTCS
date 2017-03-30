<?php
class RentalHistoryController {
    public function getViewRentalHistory() {
        $history = RentalHistory::selectHistory($member_num);
		if ($history != null) {
			foreach($history as $historyPiece) {
				echo $historyPiece['vin'];
			}
		} else {
			
		}
        // require_once('views/register/register.php');
    }
}
?>
