<?php
class SignInController {
    public function getViewSignIn() {
        if(isset($_POST["username"]) && isset($_POST["password"])) {
            $uname = $_POST["username"];
            $pass = $_POST["password"];
            if (User::signIn($uname, $pass)) {
                $_SESSION["signIn"] = 1;
				
				header("Location: ?controller=home&action=getViewHome");
				print_r($_SESSION);
                exit;
            } else {
				$_SESSION["signIn"] = 0;
			}
        }
        require_once("views/sign_in/sign_in.php");
    }
}
?>
