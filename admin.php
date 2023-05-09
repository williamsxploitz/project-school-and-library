<?php
include 'config.php';


if (isset($_POST['reg'])) {
	$fname=$_POST['fname'];
	$sname=$_POST['sname'];
	$num=$_POST['num'];
	$alt=$_POST['alt'];
	$add=$_POST['add'];
	$mail=$_POST['mail'];
	$uname=$_POST['uname'];
	$pass=$_POST['pass'];
	$pass2 = password_hash($pass, PASSWORD_DEFAULT);



	$sql = "INSERT INTO `proadmin`(`fname`,`sname`,`num`,`alt`,`add`,`mail`,`uname`,`pass`)VALUES('$fname','$sname','$num','$alt','$add','$mail','$uname','$pass2')";

  $query = mysqli_query($con,$sql);



  if ($query) {  
  	echo"<div class='alert alert-success'>User registered successfully</div>";
  }else{
  	echo"<div class='alert alert-danger'>User registration failed!!!</div>".mysqli_error($con);

  }


}






?>



















<!DOCTYPE html>
<html>
<head>
	<title>REGISTER AN ADMIN</title>
	<link rel="stylesheet" type="text/css" href="boostrap/css/boostrapcss.css">

	<style type="text/css">
		body{
			background-image: url(image/admin1.jpg);
			background-repeat: round;
			/*background-color: #000;*/
		}
		.form{
			/*border: 1px solid grey;*/
			width: 400px;
			border-radius: 10px;
			padding: 20px;
			margin-top: 100px;
		}
		.bg-light{
			background-image: linear-gradient(to right , #6761e7, #6bcb97, #bc8251);
		}
		.navbar-brand{
			color: #fff!important;
		}
		.nav-link{
			color: #fff!important;
		}

		.form-control {
			height: 50px;
		}

		.form-control,#basic-addon1{

			background-color: #000;
		}

		/*style-placeholder*/
		input,input::-webkit-input-placeholder {
		    font-size: 15px;
		    line-height: 3;
		    color: blue!important;

		}

		.nav-link:hover{
			color: #fff;
			background: #000;
			transform: translate(15px);
			transition: 2s;
		}
	</style>
</head>

<body>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand nav-link" href="index.php" style="font-family: jokerman;"><h2>MERIDIAN</h2></a>
   <ul class="navbar-nav mr-auto">
   	<li class="nav-item active">
        <a class="nav-link" href="listofadmin.php"><b>List of Registered Admin </b><span class="sr-only">(current)</span></a>
    </li> 
     
    <li class="nav-item">
        <a class="nav-link" href="login.php"><b>Logout</b></a>
    </li>
    </ul>
   </div>
</nav>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-4" style="margin-top: 120px;">
			<h1 class="text-center mt-5" style="text-shadow: 2px 2px 2px #000; background-color: #fff;">ADMIN REGISTRATION PORTAL</h1>
			<h4 style="color: red; background-color: #fff;" class="text-center" ><i>Note: An admin has full access to every area of your site and there are no restrictions to what he/she can do!</i></h4>
		</div>

		<div class="col-md-7 mt-5" style="border: 5px solid #fff; border-radius: 50px;">
			<form method="POST">



				<h1 class="text-center mt-5" style="color: #fff; text-shadow: 2px 2px 2px #000;">FILL THE FORM TO REGISTER A NEW ADMIN</h1>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group mt-5">
								<input type="text" class="form-control" name="fname" placeholder="First Name" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group mt-5">
								<input type="text" class="form-control" name="sname" placeholder="Other Names" required>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group input-group">
								<span class="input-group-text" id="basic-addon1">+234</span>
								<input type="number" class="form-control" name="num" placeholder="Phone Number" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group input-group">
								<span class="input-group-text" id="basic-addon1">+234</span>
								<input type="number" class="form-control" name="alt" placeholder="Alternate Number">
							</div>
						</div>
		</div>

			
				<div class="form-group">
					<input type="text" class="form-control" name="add" placeholder="Home Address" required>
				</div>

				<div class="form-group input-group">
					<span class="input-group-text" id="basic-addon1">@</span>
					<input type="email" class="form-control" name="mail" placeholder="Email Address" required>
				</div>

				<div class="form-group">
					<input type="text" class="form-control" name="uname" placeholder="Username" required>
				</div>

				<div class="form-group">
					<input type="password" class="form-control" name="pass" placeholder="Password" value="FakePSW" id="myInput" required><br><br>
					<input type="checkbox" onclick="myFunction()">Show Password
				</div>

		
                   <div class="form-group">
					<button class="btn btn-primary btn-lg btn-block" type="submit" name="reg" style="height: 50px;">Submit</button>
				</div>
			</form>
		</div>

		<div class="col-md-1"></div>
	</div>
</div>


<script>
      function myFunction() {
        var x =q
        document.getElementById("myInput");
        if (x.type === "password") {
          x.type = "text";
        }
      }
    </script>








<script type="text/javascript" src="boostrap/js/jquery.js"></script>
<script type="text/javascript" src="boostrap/js/popper.js"></script>
<script type="text/javascript" src="boostrap/js/boostrap.js"></script>

</body>
</html>