<?php
include_once './db_connect.php';
include_once './userAccount.php';
//session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body style="background-color: #e5e8e7">
<?php 
$con = new DBConnector();
$pdo = $con->connnectToDB();

$account = new Account();

/*if(isset($_POST['logout'])){
	$account->logout();
	header("Location: Login.php");
}*/


	
	//$db->logout();
?>
<div class="nav">
	<!--<a href="" style="margin-left: 78rem; font-size: 22px; text-decoration: none;">Log Out</a>
	<input type="submit" name="logout" value="Log Out">-->
	<!--<button type="button" name="logout" onclick="LogOut()">LOG OUT</button>-->
	
</div>

<div class="profile">
	<div class="profileone">
		<h2>Profile</h2>
		<img src="Images/<?php echo $_SESSION['Image']?>">
	</div>

	

	<div class="profiletwo">
		<h2>Personal Information</h2>
		<form class="frm">
			<label>First Name</label>
			<input type="text" name="fname" disabled="disabled" value="<?php echo $_SESSION['Fname'];?>"><br>

			<br><label>Last Name</label>
			<input type="text" name="fname" disabled="disabled" value="<?php echo $_SESSION['Lname'];?>"><br>

			<br><label>Email</label>
			<input type="text" name="fname" disabled="disabled" value="<?php echo $_SESSION['Email'];?>"><br>

			<br><label>City</label>
			<input type="text" name="fname" disabled="disabled" value="<?php echo $_SESSION['City'];?>"><br>

		</form>
		<!--<script id="sc">
			document.write(localStorage.getItem("First name") + " " + localStorage.getItem("Last Name"));
			document.write("<br>");
			document.write("<br>");
			document.write(localStorage.getItem("Email"));
			document.write("<br>");
			document.write("<br>");
			document.write(localStorage.getItem("City"));
			document.write("<br>");

		</script>-->
		<br><a href="Passwd.php" id="pd">Change Password</a>
		<button><a href="logout.php">Log Out</a></button>
	</div>	
</div>

</body>
</html>