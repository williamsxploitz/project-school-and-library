<?php

include 'config.php';
session_start();

if (!isset($_SESSION['loggedin'])) {
	header('Location :login.php');
}

$id= mysqli_real_escape_string($con,$_GET['id']);
$sql="SELECT * FROM `studinvc` WHERE (`id`='$id')";
$query = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($query);

$loggedin = $_SESSION['loggedin'];
$sql1 = "SELECT * FROM  `proadmin` WHERE (`uname` = '$loggedin')";
$query3 = mysqli_query($con,$sql1);
$row1 = mysqli_fetch_assoc($query3);



if (isset($_POST['reg'])) {
	$student=mysqli_real_escape_string($con,$_POST['student']);
	$course=mysqli_real_escape_string($con,$_POST['course']);
	$payamt=mysqli_real_escape_string($con,$_POST['payamt']);
	$paidamt=mysqli_real_escape_string($con,$_POST['paidamt']);
	$result=mysqli_real_escape_string($con,$_POST['result']);
	$status=mysqli_real_escape_string($con,$_POST['status']);
	$name=mysqli_real_escape_string($con,$_POST['name']);


	$sql = "INSERT INTO `studinvc`(`studname`,`course`,`payable`,`paid`,`balance`,`status`,`admin`)VALUES('$student','$course','$payamt','$paidamt','$result','$status','$name')";





  $query = mysqli_query($con,$sql);
  if ($query) {  
  	echo"<div class='alert alert-success'>Entry Submitted successfully</div>";
  }else{
  	echo"<div class='alert alert-danger'>Entry Submission failed!!!</div>".mysqli_error($con);

  }

}


?>



















<!DOCTYPE html>
<html>
<head>
	<title>STUDENT INVOICE</title>
	<link rel="stylesheet" type="text/css" href="boostrap/css/boostrapcss.css">

	<style type="text/css">
		body{
			background: #358a71!important;
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

		/*style-placeholder*/
		input,input::-webkit-input-placeholder {
		    font-size: 20px;
		    line-height: 3;
		    /*color: blue!important;*/

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
        <a class="nav-link" href="student.php" ><b>Register a Student </b><span class="sr-only">(current)</span></a>
      </li> 
      <li class="nav-item active">
        <a class="nav-link" href="listofstud.php" ><b>List of Students </b><span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="invoicelist.php"><b>Invoice of Students </b><span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php"><b>Logout</b></a>
      </li>
    </ul>
</nav>


<div class="container-fluid">
	<div class="row">
		<div class="col-md-2"></div>

		<div class="col-md-8 mt-5" > <!-- style="border: 5px solid #fff; border-radius: 50px;" -->
			<h1 class="text-center mt-5">CREATE STUDENT INVOICE</h1><br>

			<form method="POST">
<!-- 


				<h1 class="text-center mt-5" style="color: #fff; text-shadow: 2px 2px 2px #000;">REGISTER A STUDENT</h1> -->
					<div class="row">
						<div class="col-md-6">
							<div class="form-group input-group">
								<span class="input-group-text" id="basic-addon1"><h6><b>Full Name</b></h6></span>
								<input type="text" class="form-control" name="student" value="<?php echo $row['studname'] ?>" required>
							</div>
						</div>


						<div class="col-md-6">
							<div class="form-group">
								<div class="form-group input-group">
									<span class="input-group-text" id="basic-addon1"><h6><b>Course</b></h6></span>
									<input type="text" class="form-control" name="course" value="<?php echo $row['course'] ?>" required>
								</div>
							</div>
					</div>

					
						<!-- start? -->
			
					<div class="col-md-6">						
						<div class="form-group input-group">
							<span class="input-group-text" id="basic-addon1"><h6><b>Amount Payable</b></h6></span>
							 <input type="number" class="form-control" name="payamt" id="num1" value="<?php echo $row['payable']?>" required>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group input-group">
							<span class="input-group-text" id="basic-addon1"><h6><b>Amount Paid</b></h6></span>
							<input type="number" class="form-control" name="paidamt" id="num2" value="<?php echo $row['paid']?>">
						</div>
					</div>


		</div>

				<div class="form-group input-group">
					<span class="input-group-text" id="basic-addon1" style="color: red;"><h6>Balance to be Paid</h6></span>
					<input type="number" class="form-control" name="result" id="num3" value="<?php echo $row['balance']?>" readonly>
				</div>

				<div class="form-group input-group">
					<span class="input-group-text" id="basic-addon1"><h6><b>Account Status</b></h6></span>
					<input type="text" class="form-control" name="status" id="stat" value="<?php echo $row['status']?>" readonly>
				</div>

				<div class="form-group input-group">
					<span class="input-group-text" id="basic-addon1" style="color: blue;"><h6>Entered by (Admin)</h6></span>
					<input type="text" name="name" class="form-control" placeholder="Entered By" value="<?php echo $row1['fname']." ".$row1['sname'];?>" readonly>
				</div>

		
                <div class="form-group">
					<button class="btn btn-primary btn-lg btn-block" type="submit" name="reg" style="height: 50px;">Submit</button>
				</div>
			</form>
		</div>

		<div class="col-md-2"></div>
	</div>
</div>











<script type="text/javascript" src="boostrap/js/jquery.js"></script>
<script type="text/javascript" src="boostrap/js/popper.js"></script>
<script type="text/javascript" src="boostrap/js/boostrap.js"></script>

<script type="text/javascript">
	
$(document).ready(function(){
	meridian();
	$("#num1, #num2").on("keydown keyup", function(){
		meridian();
	});
});


function meridian(){

	var num1 = document.getElementById('num1').value;
	var num2 = document.getElementById('num2').value;

	var exp = num1 - num2;
	document.getElementById('num3').value= exp;

	if (exp <0) {
		document.getElementById('stat').value = "Account Balanced";
		document.getElementById('stat').style.color = 'green';
	}else {
		document.getElementById('stat').value = "Account not Balanced";
		document.getElementById('stat').style.color = 'red';
	}
}

</script>

</body>
</html>