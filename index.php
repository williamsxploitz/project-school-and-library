<?php

include 'config.php';

session_start();
if (isset($_POST['student'])){
	header('Location:student.php');
}

if (isset($_POST['library'])){
	header('Location:library.php');
}

if (isset($_POST['admin'])){
	header('Location:admin.php');
}

$loggedin = $_SESSION['loggedin'];
$sql2= "SELECT * FROM `proadmin` WHERE (`uname` = '$loggedin')";
$query = mysqli_query($con,$sql2);
$row = mysqli_fetch_assoc($query);

?>







<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="boostrap/css/boostrapcss.css">
	
	<style type="text/css">
		body{
			background-image: url(image/bckg3.jpg);
			background-size: contain;
		}

		.meridianshadow{
			box-shadow: 3px 4px 10px #000000c2;
		}

		.meridianhover{
			transition: 1.5s;
		}

		.meridianhover:hover{
			background-image: linear-gradient(45deg,#22222b,#842ef9);
			border: 2px solid #fff!important;
			color: #a6928e!important;
			transform: translate(20px);
		}
	
		.form{
			border: 1px solid grey;
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

		input{
			width: 100%;
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
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    	  <li class="nav-item active">
        <a class="nav-link" href="listofadmin.php" ><b>List of admin </b><span class="sr-only">(current)</span></a>
      </li> 
      <li class="nav-item active">
        <a class="nav-link" href="listofstud.php" ><b>List of Students </b><span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="invoicelist.php"><b>Invoice of Students </b><span class="sr-only">(current)</span></a>
      </li> 
      <li class="nav-item active">
        <a class="nav-link" href="listoflib.php"><b>List of Library Users </b><span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="libinvclist.php"><b>Invoice of Library Users </b><span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php"><b>Logout</b></a>
      </li>
    </ul>
</nav>


<div class="container-fluid">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8 mt-5" style="padding: 10px;">
			<h2><input class="text-center" style="background: transparent; color: #fff; text-shadow: 1px 0 2px #008000; font-size: 30px; text-transform: uppercase; font-family: sans-serif;" type="text" value="<?php echo "Welcome"." ".$row['fname']." ".$row['sname'];?>" readonly></h2>
		</div>
		<div class="col-md-2"></div>
	</div>
</div>


<form method="POST">
	<div class="container-fluid mt-5">
		<div class="row">
			<div class="col-md-4 text-center mt-5">
				<button name="admin" class="meridianhover" style="background-image:url(image/admin.jpg); background-repeat: round; height: 265px; width: 100%; background-size: contain; border-radius: 30px;"></button>
			</div>

			<div class="col-md-4 text-center mt-5">
				<button name="library" class="meridianhover" style="background-image: url(image/lib9.jpg); background-repeat: round; height: 265px; width: 100%; background-size: contain; border-radius: 30px;"></button>
			</div>
			<div class="col-md-4 text-center mt-5">
				<button name="student" class="meridianhover" style="background-image: url(image/stud7.jpg); background-repeat: round; color: blue; height: 265px; width: 100%; background-size: contain; border-radius: 30px; border-right:2px solid #0a3a52;"></button>
			</div>
				
			
		</div>
	</div>
</form>




<script type="text/javascript" src="boostrap/js/jquery.js"></script>
<script type="text/javascript" src="boostrap/js/popper.js"></script>
<script type="text/javascript" src="boostrap/js/boostrap.js"></script>
</body>
</html>