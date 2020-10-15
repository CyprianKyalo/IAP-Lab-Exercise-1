<?php
include_once './db_connect.php';
include_once './userAccount.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Password</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
<?php
$con = new DBConnector();
$pdo = $con->connnectToDB();

$account = new Account();

if(isset($_POST['Change'])){
	$pwd = htmlspecialchars($_POST['pwd']);
	$npwd = htmlspecialchars($_POST['npwd']);
	$cnpwd = htmlspecialchars($_POST['cnpwd']);

	if($cnpwd == $npwd && $npwd != ""){
		$account->setPwd($pwd);
		$npwd = password_hash($npwd, PASSWORD_DEFAULT);
		$account->setNpwd($npwd);
		$account->changePassword($pdo);
	}else{
		echo "<script>alert('The passwords do not match')</script>";
	}

	//$account->login($pdo, $email, $pwd);
}
?>
<div class="pwd">
	<h2>Change Password</h2>

	<form action="" method="POST">
		<label for="">Old Password</label><br>
		<input type="password" name="pwd" id="opwd"><br>

		<br><label for="">New Password</label><br>
		<input type="password" name="npwd" id="npwd"><br>

		<br><label for="">Confirm Password</label><br>
		<input type="password" name="cnpwd" id="cnpwd"><br>

		<br><input type="submit" name="Change" id="change" value="Change" class="btn">
		<a href="Profile.php"><input type="submit" name="back" value="Back" class="btn"></a>
	</form>
</div>
	<!--<script type="text/javascript">
		const Opwd = document.getElementById("opwd");
		const Npwd = document.getElementById("npwd");
		const Cnpwd = document.getElementById("cnpwd");
		const Change = document.getElementById("change");

		var pwd = localStorage.getItem("Password");

		Change.onclick = function(){
			const opwd = Opwd.value;
			const npwd = Npwd.value;
			const cnpwd = Cnpwd.value;

			if(opwd == pwd){
				if(cnpwd == npwd && npwd != ""){
					alert("Password changed successfully");
					localStorage.setItem("Password", npwd);
					//window.location = "Profile.html";
				}else{
					alert("The passwords do not match");
				}
			}else{
				alert("Old password incorrect");
			}
		}

	</script>-->
</body>
</html>