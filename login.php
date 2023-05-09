<?php
include 'config.php';

if (isset($_POST['login'])) {
	$uname=mysqli_real_escape_string($con,$_POST['uname']);
	$email=mysqli_real_escape_string($con,$_POST['email']);
	$pass=mysqli_real_escape_string($con,$_POST['pass']);

	$sql = "SELECT * FROM `adminwilliams` WHERE(`uname` = '$uname')";
	$query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($query);

	if ($count>0) {
		$row = mysqli_fetch_assoc($query);

		$pass2 = $row['pass'];
		$verify = password_verify($pass,$pass2);

		if ($verify){
			session_start();
			$_SESSION['loggedin']=$uname;
			header('Location:index.php');
		}else{
			echo "<div class='alert alert-danger'>Username or Password Incorrect!</div>".mysqli_error($con);
		}
	}
}



?>












<!DOCTYPE html>
<html>
<head>
	<title>ADMIN LOGIN</title>
	<link rel="stylesheet" type="text/css" href="boostrap/css/boostrapcss.css">

	<style type="text/css">
		body{
			background: #358a71!important;
			/*background-color: #000;*/
		}
		.form{
			border: 5px solid #fff;
			padding: 20px;
			border-radius: 30px;
			padding: 20px;
			margin-top: 150px;
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

		/*style-placeholder*/
		input,input::-webkit-input-placeholder {
		    font-size: 20px;
		    line-height: 3;
		    color: blue!important;

		}
	</style>
</head>

<body>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="dashboard.php" style="font-family: jokerman"><h2>MERIDIAN</h2></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="sales.php">List of Students <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="entry.php">List of Library Users <span class="sr-only">(current)</span></a>
      </li>
       <li class="nav-item active">
        <a class="nav-link" href="entry.php">List of Admin <span class="sr-only">(current)</span></a>
      </li> <li class="nav-item active">
        <a class="nav-link" href="entry.php">Invoice of Students <span class="sr-only">(current)</span></a>
      </li> <li class="nav-item active">
        <a class="nav-link" href="entry.php">Invoice of Library Users <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Logout</a>
      </li>
    </ul>
</nav>



<div class="container">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<form method="POST">
				<div class="form">
					<h2 class="text-center" style="color: #fff; text-shadow: 2px 2px 2px #000; margin-top: 50px;">LOGIN HERE</h2><hr>
				
				<div class="form-group">
					<input type="text" name="uname" placeholder="username" class="form-control" required>
				</div>	
             
             <div class="form-group">
					<input type="password" name="pass" placeholder="password" class="form-control" required>
				</div>	

				<div class="form-group">
					<button class="btn btn-primary btn-block" type="submit" name="login" style="height: 50px;">Login</button>
				</div>	

				</div>
			</form>


		</div>
		<div class="col-md-2"></div>
	</div>
</div>











<script type="text/javascript" src="boostrap/js/jquery.js"></script>
<script type="text/javascript" src="boostrap/js/popper.js"></script>
<script type="text/javascript" src="boostrap/js/boostrap.js"></script>
</body>
</html>