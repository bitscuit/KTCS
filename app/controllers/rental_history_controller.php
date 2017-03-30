<?php
class RentalHistoryController {
    public function getViewRentalHistory() {
        $history = RentalHistory::selectHistory($_SESSION["memberNum"]);
		require_once('views/rental_history/rental_history.php');
    }
}
?>
