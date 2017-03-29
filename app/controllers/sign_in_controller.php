<?php
  class SignInController {
    public function getViewSignIn() {
      if(isset($_POST['username']) && isset($_POST['password'])) {
        $uname = $_POST['username'];
        $pass = $_POST['password'];
        if (User::signIn($uname, $pass)) {
            header("Location: ?controller=home&action=getViewHome");
            exit;
        //   call('home', 'getViewHome');
        }
      } else {
        // call('pages', 'error');
      }
      require_once('views/sign_in/sign_in.php');

    }
  }
?>
