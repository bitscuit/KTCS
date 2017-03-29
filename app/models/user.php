<?php
class User {
    // we define 3 attributes
    // they are public so that we can access them using $post->author directly
    public $member_num;
    public $f_name;
    public $l_name;
    public $phone_num;
    public $email;
    public $license_num;
    public $annual_mem_fee;
    public $role;
    public $username;
    public $password;

    public function __construct($member_num, $f_name, $l_name, $phone_num,
        $email, $license_num, $annual_mem_fee, $role, $username, $password) {
        $this->member_num     = $member_num;
        $this->f_name         = $f_name;
        $this->l_name         = $l_name;
        $this->phone_num      = $phone_num;
        $this->email          = $email;
        $this->license_num    = $license_num;
        $this->annual_mem_fee = $annual_mem_fee;
        $this->role           = $role;
        $this->username       = $username;
        $this->password       = $password;
    }

    // public static function all() {
    //   $list = [];
    //   $db = Db::getInstance();
    //   $req = $db->query('SELECT * FROM member');
    //
    //   // we create a list of Post objects from the database results
    //   foreach($req->fetchAll() as $member) {
    //     $list[] = new User($member['member_num'], $member['f_name'], $member['l_name'], $member['phone_num'],
    //         $member['email'], $member['license_num'], $member['annual_mem_fee'], $member['role'], $member['username'], $member['password']);
    //   }
    //
    //   return $list;
    // }

    public static function signIn($uname, $pass) {
        $list = [];
        $db = Db::getInstance();
        $sql = 'SELECT username, password FROM member';
        $sql .= ' WHERE username = :username';
        $sql .= ' AND password = :password';
        $req = $db->prepare($sql);
        $req->bindParam(':username', $uname);
        $req->bindParam(':password', $pass);
        $req->execute();
        $member = $req->fetch();

        // Checks to see that user exists. Returns true if so. False otherwise.
        if ($member != null) {
            return true;
        } else {
            return false;
        }
    }

    public static function register($fName, $lName, $phoneNum, $email,
        $licenseNum, $username, $password) {
        $db = Db::getInstance();
        $sql = 'INSERT INTO member (f_name, l_name, phone_num, email,
            license_num, annual_mem_fee, role, username, password)
            VALUES (:fName, :lName, :phoneNum, :email,
                :licenseNum, :annualMemFee, :role, :username, :password)';
        $req = $db->prepare($sql);
        $req->bindParam(':fName', $fName);
        $req->bindParam(':lName', $lName);
        $req->bindParam(':phoneNum', $phoneNum);
        $req->bindParam(':email', $email);
        $req->bindParam(':license_num', $licenseNum);
        $req->bindParam(':annualMemFee', 60);
        $req->bindParam(':role', 'User');
        $req->bindParam(':username', $username);
        $req->bindParam(':password', $password);
        $success = $req->execute();
        if ($success) {
            echo 'true';
            return true;
        } else {
            echo 'false';
            return false;
        }
    }
} // end User class
?>
