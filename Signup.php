<?php
//session_start();

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

	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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

		<br><input type="submit" name="submit" value="Submit" id="sub" class="btn btn-dark">

		<input type="reset" name="" value="Back" class="btn btn-dark">
	</form>

	<!--<script type="text/javascript">
		function storage(){
			var myLink = document.getElementById("sub");

			myLink.onclick = function(){
				var fname = document.getElementById("fname");
				var lname = document.getElementById("lname");
				var email = document.getElementById("e-mail");
				var passwd = document.getElementById("passwd");
				//var cpasswd = document.getElementById("cpasswd");
				var city = document.getElementById("city");

				/*if(email.value.length == 0 && passwd.value.length == 0){
					alert("Please check your email and password");
				}else{*/
					//document.getElementById("sub").submit();
					localStorage.setItem('First Name', fname.value);
					localStorage.setItem('Last Name', lname.value);
					localStorage.setItem('Email', email.value);
					localStorage.setItem('Password', passwd.value);
					localStorage.setItem('City Of Residence', city.value);

					alert("Account successfully created");
			}
	//}
}
	</script>-->

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
				localStorage.setItem("First name", Name);
				localStorage.setItem("Last Name", namE);
				localStorage.setItem("Email", email);
				localStorage.setItem("Password", pwd);
				localStorage.setItem("City", COR);

				//location.reload();	
				//localStorage.setItem("name", Name);
			//}

			/*for(let i = 0; i < localStorage.length(); i++){
				const key = localStorage.key(i);
				//const value = localStorage.getItem("obj");
				const value = localStorage.getItem("name");

				ls.innerHTML += '${key}: ${value}<br />';

			}*/
			

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