<?php
	class User {
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

		public static function signIn($uname, $pass) {
			$list = [];
			$db = Db::getInstance();
			$sql = "SELECT username, password, member_num FROM member";
			$sql .= " WHERE username = :username";
			$sql .= " AND password = :password";
			$req = $db->prepare($sql);
			$req->bindParam(":username", $uname);
			$req->bindParam(":password", $pass);
			$req->execute();
			$member = $req->fetch();
			// Checks to see that user exists. Returns true if so. False otherwise.
			if ($member != null) {
				$_SESSION["memberNum"] = $member["member_num"];
				return true;
			} else {
				return false;
			}
		}

		public static function register($fName, $lName, $phoneNum, $email,
		$licenseNum, $username, $password) {
			$db = Db::getInstance();
			$sql = "INSERT INTO member (member_num, f_name, l_name, phone_num, email,
			license_num, annual_mem_fee, role, username, password)
			VALUES (DEFAULT, :fName, :lName, :phoneNum, :email,
			:licenseNum, :annualMemFee, :role, :username, :password)";
			$req = $db->prepare($sql);
			$req->bindParam(":fName", $fName);
			$req->bindParam(":lName", $lName);
			$req->bindParam(":phoneNum", $phoneNum);
			$req->bindParam(":email", $email);
			$req->bindParam(":licenseNum", $licenseNum);
			$annualMemFee = 60;
			$req->bindParam(":annualMemFee", $annualMemFee);
			$role = "User";
			$req->bindParam(":role", $role);
			$req->bindParam(":username", $username);
			$req->bindParam(":password", $password);
			$success = $req->execute();
			if ($success) {
				echo "true";
				return true;
			} else {
				echo "false";
				return false;
			}
		}
	} // end User class
?>
