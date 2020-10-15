<?php
session_start();

interface User{
	public function register($pdo);
	public function login($pdo);
	public function changePassword($pdo);
	public function logout();
}

class Account implements User{
	protected $fname;
	protected $lname;
	protected $email;
	protected $city;
	protected $pwd;
	protected $npwd;

	function __construct(){}

	function setFname($fname){
		$this->fname = $fname;
	}

	function getFname(){
		return $this->fname;
	}

	function setLname($lname){
		$this->lname = $lname;
	}

	function getLname(){
		return $this->lname;
	}

	function setEmail($email){
		$this->email = $email;
	}

	function getEmail(){
		return $this->email;
	}

	function setCity($city){
		$this->city = $city;
	}

	function getCity(){
		return $this->city;
	}

	function setPwd($pwd){
		$this->pwd = $pwd;
	}

	function getPwd(){
		return $this->pwd;
	}

	function setNpwd($npwd){
		$this->npwd = $npwd;
	}

	function register($pdo){
		try{
			$stmt = $pdo->prepare("INSERT INTO iap_app.users (fname, lname, email, password, city) VALUES (?, ?, ?, ?, ?)");
			$stmt->execute([$this->fname, $this->lname, $this->email, $this->pwd, $this->city]);
			$stmt = null;
			return "New User Added";
		}catch(PDOException $e){
			return $e->getMessage();
		}
	}

	function login($pdo){
		try{
			$stmt = $pdo->prepare("SELECT * FROM iap_app.users WHERE email = ?");
			$stmt->execute([$this->email]);

			$data = $stmt->fetch();

			if($data == null){
				echo "<script>alert('Account does not exist')</script>";
			}

			if(password_verify($this->pwd, $data['password'])){
					echo "<script>alert('Login successful');</script>";
					$_SESSION['Fname'] = $data['fname'];
					$_SESSION['Lname'] = $data['lname'];
					$_SESSION['Email'] = $data['email'];
					header("Location: Passwd.php");
			}else{
				echo "<script>alert('Incorrect credentials');</script>";;
			}
		}catch(PDOException $e){
			return $e->getMessage();
		}
	}

	function changePassword($pdo){
		try{
			$stmt = $pdo->prepare("SELECT * FROM iap_app.users WHERE email = ?");
			$email = $_SESSION['Email'];
			$stmt->execute([$email]);

			if($stmt->rowCount()){
				$data = $stmt->fetch();

				if(password_verify($this->pwd, $data['password'])){
					$stm = $pdo->prepare("UPDATE iap_app.users SET password = ? WHERE email = ?");
					$stm->execute([$this->npwd, $email]);
					$stm = null;
					echo "<script>alert('Password updated');</script>";
				}else{
					echo "<script>alert('Old password wrong');</script>";
				}			
			}else{
				echo "<script>alert('Supplied an invalid email');</script>";
			}
		}catch(PDOException $e){
			return $e->getMessage();
		}
	}

	function logout(){
		if(isset($_POST['logout'])){
			session_destroy();
			unset($_SESSION['name']);
			header("Location: Login.php");
			exit;
		}
	}
}
?>