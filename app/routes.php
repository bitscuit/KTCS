<?php
	function call($controller, $action) {
		// all controllers should be named <controller_name>_controller.php
		require_once('controllers/' . $controller . '_controller.php');

		// instantiate appropriate controller
		switch($controller) {
			case 'home':
				$controller = new HomeController();
			break;

			case 'sign_in':
				require_once('models/user.php');
				$controller = new SignInController();
			break;

			case 'error':
				$controller = new ErrorController();
			break;
		}

	// call action in the controller
	$controller->{ $action }();
	}

	// list of valid controllers and actions associated with those controllers
	// format: <controller> => [<action1>, <action2>, ...]
	$controllers = array('home' => ['getViewHome'],
		   'sign_in' => ['getViewSignIn']);

	// if valid controller and action, execute action in that controller
	// otherwise redirect to error page
	if (array_key_exists($controller, $controllers)) {
		if (in_array($action, $controllers[$controller])) {
			call($controller, $action);
		} else {
			call('error', 'getViewError');
		}
	} else {
		call('error', 'getViewError');
	}
?>
