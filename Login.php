<!DOCTYPE html>
<html>
<head>
	<title>Log In</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	
</head>
<body>
<div class="login">
	<div class="logone">
		<h1>Log In</h1>
	</div>

	<div class="logtwo">
		<h2>Log In</h2>
		<form action="" method="POST">
			<!--<label for="">Email</label><br>-->
			<input type="email" name="emmail" id="e-mail" placeholder="Email"><br>

			<!--<br><label for="">Password</label><br>-->
			<input type="password" name="passwd" id="pwd" placeholder="Password"><br>

			<br><input type="submit" name="submit" value="Log In" id="log" class="btn">
			
			<input type="submit" name="back" value="Back" class="btn">

			<br><p>Do you have an account?<a href="Signup.php">Register</a></p>
		</form>
	</div>
</div>

	<script type="text/javascript">
		const Email = document.getElementById("e-mail");
		const Pwd = document.getElementById("pwd");
		const But = document.getElementById("log");

		var entry = localStorage.getItem("Email");
		var pwd = localStorage.getItem("Password");
		//console.log("Username: " + entry + "Password: " + pwd);

		But.onclick = function(){
			const mail = Email.value;
			const pass = Pwd.value;

				if(mail == entry && pass == pwd){
					window.location.href = "Profile.php";
					<?php header("location: Profile.php")?>
				}else{
					alert('Incorrect Login');
					
				}

		}

	</script>
</body>
</html>