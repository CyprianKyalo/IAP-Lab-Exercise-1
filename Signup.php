<?php
//include("db_connect.php");
include_once './db_connect.php';
include_once './userAccount.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
<?php
//$link->register();
$con = new DBConnector();
$pdo = $con->connnectToDB();

$account = new Account();

if(isset($_POST['sub'])){
	$fname = htmlspecialchars($_POST["fname"]);
	$lname = htmlspecialchars($_POST['lname']);
	$email = htmlspecialchars($_POST['e-mail']);
	$city = htmlspecialchars($_POST['city']);
	$pwd = htmlspecialchars($_POST['passwd']);
	$cpwd = htmlspecialchars($_POST['cpasswd']);
	$image = $_FILES['photo'];

	if($pwd == $cpwd && $pwd != ""){
		$account->setFname($fname);
		$account->setLname($lname);
		$account->setEmail($email);
		$account->setCity($city);
		$pwd = password_hash($pwd, PASSWORD_DEFAULT);
		$account->setPwd($pwd);
		$account->setImage($image);

		$account->register($pdo);

	}else{?>
		<script>alert("Passwords do not match")</script>
	<?php
	}
}
?>

<div class="all">
	<div class="one">
		<h1>Welcome</h1>
	</div>

	<div class="two">
		<h2>Register</h2>
		<hr>
			<form method="POST" action="" enctype="multipart/form-data">
				<!--<label for="firstname">First Name</label><br>-->
				<input type="text" name="fname"  id="firstname" placeholder="First Name" required>

				<!--<label for="lastname">Last Name</label>-->
				<input type="text" name="lname" id="lastname" placeholder="Last Name" required><br>

				<!--<br><label for="emmail">Email</label><br>-->
				<input type="email" name="e-mail" id="emmail" placeholder="Email" required>

				<!--<br><label for="pwd">Password</label><br>-->

				<input type="text" name="city" id="COR" placeholder="City Of Residence" required><br>

				<input type="password" name="passwd" id="pwd" placeholder="Password" required>

				<!--<br><label for="cpwd">Confirm Password</label><br>-->
				<input type="password" name="cpasswd" id="cpwd" placeholder="Confirm Password" required><br>

				<!--<br><label for="COR">City of Residence</label><br>-->
				

				<label for="Photo" id="Pphoto">Profile Photo</label>
				<input type="file" name="photo" id="Photo"><br>

				<input type="submit" name="sub" value="Submit" id="sub" class="btn">

				<input type="reset" name="" value="Back" class="btn">

				<p>Already have an account?<a href="Login.php">Log In</a></p>
			</form>
		</div>
</div>
<?php
//session_start();

	/*if(isset($_POST["sub"])){
		$firstname = $_POST["fname"];

		$file = $_FILES["photo"]["tmp_name"];
		$dest = "Images/" . $_FILES["photo"]["name"];
		move_uploaded_file($file, $dest);

		$_SESSION["Picture"] = $dest;
		echo $firstname;
		echo "string";
	}*/
?>

	<!--<script type="text/javascript">
		const Fname = document.getElementById("firstname");
		const Lname = document.getElementById("lastname");
		const Email = document.getElementById("emmail");
		const cor = document.getElementById("COR");
		const Pwd = document.getElementById("pwd");
		const Cpwd = document.getElementById("cpwd");
		//const pht = document.getElementById("Photo");
		//const bannerImage = document.getElementById("Photo");
		const But = document.getElementById("sub");
		


		But.onclick = function(){
			const Name = Fname.value;
			const namE = Lname.value;
			const email = Email.value;
			const COR = cor.value;
			const pwd = Pwd.value;
			const cpwd = Cpwd.value;
			//const Photo = pht.value;

			function getBase64Image(img) {
			    var canvas = document.createElement("canvas");
			    canvas.width = img.width;
			    canvas.height = img.height;

			    var ctx = canvas.getContext("2d");
			    ctx.drawImage(img, 0, 0);

			    var dataURL = canvas.toDataURL("image/png");

			    return dataURL.replace(/^data:image\/(png|jpg);base64,/, "");
			}

			window.location.href = "Login.php";

			
			//const imgData = getBase64Image(bannerImage);
			

			/*var obj = {
				"fname": Name,
				"lname": namE,
				"Email": email,
				"Password": pwd,
				"City": COR,
				"Photo": Photo
			}*/

			//if(obj){
				//localStorage.setItem("user", JSON.stringify(obj));
				//var val = localStorage.getItem("obj");
				localStorage.setItem("First name", Name);
				localStorage.setItem("Last Name", namE);
				localStorage.setItem("Email", email);
				localStorage.setItem("City", COR);
				localStorage.setItem("Password", pwd);
				//localStorage.setItem("Photo", imgData);

				//location.reload();	
				//localStorage.setItem("name", Name);
			//}
			//console.log("Retrieved Value: ", JSON.parse(val));

			/*console.log(Name);
			console.log(namE);
			console.log(email);
			console.log(pwd);
			console.log(cpwd);
			console.log(COR);
			console.log(Photo);*/
		}
	</script>-->
</body>
</html>