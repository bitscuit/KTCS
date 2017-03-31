<?php
	function call($controller, $action) {
		// all controllers should be named <controller_name>_controller.php
		require_once("controllers/" . $controller . "_controller.php");

		// instantiate appropriate controller
		switch($controller) {
			case "home":
				$controller = new HomeController();
			break;

			case "sign_in":
				require_once("models/user.php");
				$controller = new SignInController();
			break;

			case "error":
				$controller = new ErrorController();
			break;

			case "register":
				require_once("models/user.php");
				$controller = new RegisterController();
			break;

			case "location":
				require_once("models/location.php");
				$controller = new LocationController();
			break;

			case 'rental_history':
				require_once('models/rental_history.php');
				$controller = new RentalHistoryController();
			break;
			case "comment":
				require_once('models/comment.php');
				$controller = new CommentController();
			break;
			case "car":
				require_once("models/car.php");
				$controller = new CarController();
			break;
		}

	// call action in the controller
	$controller->{ $action }();
	}

	// list of valid controllers and actions associated with those controllers
	// format: <controller> => [<action1>, <action2>, ...]
	$controllers = array("home" => ["getViewHome"],
						"error" => ["getViewError"],
						"sign_in" => ["getViewSignIn", "getViewLogout"],
						"register" => ["getViewRegister"],
						"location" => ["getViewLocation"],
						"rental_history" => ["getViewRentalHistory"],
						"comment" => ["getViewPostComment", "getViewComment"],
						"car" => ["getViewAvailableCars", "getViewAllCars", "getViewLocationCars"]);

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
