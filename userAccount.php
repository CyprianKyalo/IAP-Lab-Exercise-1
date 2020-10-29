<?php
session_start();

interface User{
	public function register($pdo);
	public function login($pdo);
	public function changePassword($pdo);
	public function logout($pdo);
}

class Account implements User{
	protected $fname;
	protected $lname;
	protected $email;
	protected $city;
	protected $pwd;
	protected $npwd;
	protected $image;

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

	function setImage($image){
		$this->image = $image;
	}

	function register($pdo){
		try{
			$file_name = $this->image['name'];
			$file_tmp_location = $this->image['tmp_name'];
			$file_type = substr($file_name, strpos($file_name, '.'), strlen($file_name));
			$file_path = "Images/";
			$new_name = time().$file_type;

			if(move_uploaded_file($file_tmp_location, $file_path.$new_name)){
				$stmt = $pdo->prepare("INSERT INTO iap_app.users (fname, lname, email, password, city, image) VALUES (?, ?, ?, ?, ?, ?)");
				$stmt->execute([$this->fname, $this->lname, $this->email, $this->pwd, $this->city, $new_name]);
				$stmt = null;
				//return "New User Added";
				header("Location: Login.php");
			}else{
				echo "<script>alert('Image not uploaded');</script>";
			}
			
		}catch(PDOException $e){
			return $e->getMessage();
		}
	}

	function login($pdo){
		try{
			$stmt = $pdo->prepare("SELECT * FROM iap_app.users WHERE email = ?");
			$stmt->execute([$this->getEmail()]);

			$data = $stmt->fetch();

			if($data == null){
				echo "<script>alert('Account does not exist')</script>";
			}

			if(password_verify($this->getPwd(), $data['password'])){
					echo "<script>alert('Login successful');</script>";
					$_SESSION['Fname'] = $data['fname'];
					$_SESSION['Lname'] = $data['lname'];
					$_SESSION['Email'] = $data['email'];
					$_SESSION['Image'] = $data['image'];
					$_SESSION['City']  = $data['city'];
					header("Location: Profile.php");
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
					header("Location: Profile.php");
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

	function logout($pdo){
		try{
			//unset($_SESSION['name']);
			session_destroy();
			//header("Location: Login.php");
			//exit;
		}catch(PDOException $e){
			return $e->getMessage();
		}
	}
}
?>