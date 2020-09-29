function storage(){
	var fname = document.getElementById("fname");
	var lname = document.getElementById("lname");
	var email = document.getElementById("e-mail");
	var passwd = document.getElementById("passwd");
	//var cpasswd = document.getElementById("cpasswd");
	var city = document.getElementById("city");

	if(email.value.length == 0 && passwd.value.length == 0){
		alert("Please check your email and password");
	}else{
		document.getElementById("sub").submit();
		localStorage.setItem('First Name', fname.value);
		localStorage.setItem('Last Name', lname.value);
		localStorage.setItem('Email', email.value);
		localStorage.setItem('Password', passwd.value);
		localStorage.setItem('City Of Residence', city);

		alert("Account successfully created");
	}
}