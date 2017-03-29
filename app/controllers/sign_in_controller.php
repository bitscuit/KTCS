<?php
class SignInController {
    public function getViewSignIn() {
        if(isset($_POST["username"]) && isset($_POST["password"])) {
            $uname = $_POST["username"];
            $pass = $_POST["password"];
            if (User::signIn($uname, $pass)) {
				$GLOBALS["temp"] = "Signed In";
                header("Location: ?controller=home&action=getViewHome");
                exit;
            } else {
				$GLOBALS["temp"] = "Not Signed In";
				echo $GLOBALS["temp"];
			}
        }
        require_once("views/sign_in/sign_in.php");
    }
}
?>
