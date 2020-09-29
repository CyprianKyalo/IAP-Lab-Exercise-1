<?php
session_start();

	/*if(isset($_POST['submit'])){
		$FName = $_POST['fname'];
		$LName = $_POST['lname'];
		$Email = $_POST['e-mail'];
		$Pass = $_POST['passwd'];
		$City = $_POST['city'];

		echo $FName.$LName;

		//header("Location: Login.html");
	}*/
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
</head>
<body>

<h2>Sign Up</h2>
	<form method="POST">
		<label for="firstname">First Name</label><br>
		<input type="text" name="fname"  id="firstname"><br>

		<br><label for="lastname">Last Name</label><br>
		<input type="text" name="lname" id="lastname"><br>

		<br><label for="emmail">Email</label><br>
		<input type="email" name="e-mail" id="emmail"><br>

		<br><label for="pwd">Password</label><br>
		<input type="password" name="passwd" id="pwd"><br>

		<br><label for="cpwd">Confirm Password</label><br>
		<input type="password" name="cpasswd" id="cpwd"><br>

		<br><label for="COR">City of Residence</label><br>
		<input type="text" name="city" id="COR"><br>

		<br><label for="Photo">Profile Photo</label><br>
		<input type="file" name="photo" id="Photo"><br>

		<br><input type="submit" name="submit" value="Submit" id="sub">

		<input type="reset" name="" value="Back">
	</form>

	<br><fieldset>
		<legend>Local Storage</legend>
		<div id="ls"></div>
	</fieldset>

	<script type="text/javascript">
		const Fname = document.getElementById("firstname");
		const Lname = document.getElementById("lastname");
		const Email = document.getElementById("emmail");
		const Pwd = document.getElementById("pwd");
		const Cpwd = document.getElementById("cpwd");
		const cor = document.getElementById("COR");
		const pht = document.getElementById("Photo");
		const But = document.getElementById("sub");

		But.onclick = function(){
			const Name = Fname.value;
			const namE = Lname.value;
			const email = Email.value;
			const pwd = Pwd.value;
			const cpwd = Cpwd.value;
			const COR = cor.value;
			const Photo = pht.value;

			var obj = {
				"fname": Name,
				"lname": namE,
				"Email": email,
				"Password": pwd,
				"City": COR,
				"Photo": Photo
			}

			//if(obj){
				//localStorage.setItem("user", JSON.stringify(obj));
				//var val = localStorage.getItem("obj");
				//location.reload();	
				localStorage.setItem("name", Name);
			//}

			for(let i = 0; i < localStorage.length(); i++){
				const key = localStorage.key(i);
				//const value = localStorage.getItem("obj");
				const value = localStorage.getItem("name");

				ls.innerHTML += '${key}: ${value}<br />';

			}
			

			//console.log("Retrieved Value: ", JSON.parse(val));

			/*console.log(Name);
			console.log(namE);
			console.log(email);
			console.log(pwd);
			console.log(cpwd);
			console.log(COR);
			console.log(Photo);*/
		}
	</script>
</body>
</html>