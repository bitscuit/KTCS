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

		public function __construct($member_num, $username, $role) {
			$this->member_num     = $member_num;
			$this->username       = $username;
			$this->role = $role;
		}

		public static function signIn($uname, $pass) {
			$list = [];
			$db = Db::getInstance();
			$sql = "SELECT username, password, member_num, role FROM member";
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
				return new User($member["member_num"], $uname, $member["role"]);
			} else {
				return null;
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

		public static function listComments($memberNum) {
			$db = Db::getInstance();
			$sql = "SELECT vin, rating, comment_text, comment_time FROM comment WHERE member_num = :member_num";
			$req = $db->prepare($sql);
			$req->bindParam(":member_num", $memberNum);
			$req->execute();
			$comments = $req->fetchAll(PDO::FETCH_ASSOC);
			return $comments;
		}

		public static function all() {
			$db = Db::getInstance();
			$sql = "SELECT member_num FROM member";
			$req = $db->prepare($sql);
			$req->execute();
			$comments = $req->fetchAll(PDO::FETCH_ASSOC);
			return $comments;
		}
	} // end User class
?>
