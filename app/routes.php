<?php
	function call($controller, $action) {
		// all controllers should be named <controller_name>_controller.php
		require_once("controllers/" . $controller . "_controller.php");

		// instantiate appropriate controller
		switch($controller) {
			case "home":
				$controller = new HomeController();
			break;

			case "error":
				$controller = new ErrorController();
			break;

			case "user":
				require_once("models/car.php");
				require_once("models/comment.php");
				require_once("models/location.php");
				require_once("models/pick_up.php");
				require_once("models/rental_history.php");
				require_once("models/reservation.php");
				require_once("models/user.php");
				$controller = new UserController();
			break;
		}

	// call action in the controller
	$controller->{ $action }();
	}

	// list of valid controllers and actions associated with those controllers
	// format: <controller> => [<action1>, <action2>, ...]
	$controllers = array("home" => ["getViewHome"],
						"error" => ["getViewError"],
						"user" => ["getViewPickUp", "getViewSignIn",
						"getViewLogout", "getViewRegister", "getViewLocation",
						"getViewRentalHistory", "getViewPostComment",
						"getViewComment", "getViewAvailableCars",
						"getViewAllCars", "getViewLocationCars"]);

	// if valid controller and action, execute action in that controller
	// otherwise redirect to error page
	if (array_key_exists($controller, $controllers)) {
		if (in_array($action, $controllers[$controller])) {
			call($controller, $action);
		} else {
			call("error", "getViewError");
		}
	} else {
		call("error", "getViewError");
	}
?>
