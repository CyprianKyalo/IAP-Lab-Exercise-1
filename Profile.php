<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
<?php 
	session_start();
?>
<div>
	<a href="Login.php" style="margin-left: 78rem; font-size: 22px; text-decoration: none;">Log Out</a>
</div>

<div class="profile">
	<div class="profileone">
		<img src="<?php echo $_SESSION["Picture"]; ?>" id="tableBanner">
	</div>

	<div class="profiletwo">
		<h2>Profile</h2>
		<script id="sc">
			document.write(localStorage.getItem("First name") + " " + localStorage.getItem("Last Name"));
			document.write("<br>");
			document.write("<br>");
			document.write(localStorage.getItem("Email"));
			document.write("<br>");
			document.write("<br>");
			document.write(localStorage.getItem("City"));
			document.write("<br>");

		</script>
		<br><a href="Passwd.html">Change Password</a>
	</div>	
</div>

</body>
</html>