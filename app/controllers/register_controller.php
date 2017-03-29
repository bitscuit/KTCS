<?php
class RegisterController {
    public function getViewRegister() {
        if(isset($_POST['username']) && isset($_POST['password']) &&
            isset($_POST['first_name']) && isset($_POST['last_name']) &&
            isset($_POST['phone_num']) && isset($_POST['license_num'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $fName = $_POST['first_name'];
            $lName = $_POST['last_name'];
            $phoneNum = $_POST['phone_num'];
            $email = $_POST['email'];
            $license_num = $_POST['license_num'];
            if (User::register($fName, $lName, $phoneNum, $email, $license_num,
                    $username, $password)) {
                echo '932244444444587859824935734275';
                header("Location: ?controller=home&action=getViewHome");
                exit;
            }
        } else {
            echo 'Not registered';
        }
        require_once('views/register/register.php');
    }
}
?>
