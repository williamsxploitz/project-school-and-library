<?php

include 'config.php';
session_start();
// if (!isset($_SESSION['loggedin'])) {
// 	header('Location :login.php');


$sql = "SELECT * FROM `prostudent`";
$query1 = mysqli_query($con,$sql);

$sql = "SELECT * FROM `prostudent`";
$query2 = mysqli_query($con,$sql);

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
	</style>
</head>

<body>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php" style="font-family: jokerman"><h2>MERIDIAN</h2></a>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Logout</a>
      </li>
    </ul>
   </div>
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
							<div>
								<center><h5 style="color: yellow; text-shadow: 1px 1px 1px #000">Select Student</h5></center>
								<select name="student" style="width: 100%; padding: 8px;">
									<?php
										while ($row = mysqli_fetch_assoc($query1)) {
									?>
									<option value="<?php echo $row['fname']." ".$row['sname']; ?>"><?php echo $row['fname']." ".$row['sname']; ?></option>
									<?php
									}
									?>
								</select>
							</div>
						</div>


						<div class="col-md-6">
							<div class="form-group">
								<center><h5 style="color: yellow; text-shadow: 1px 1px 1px #000">Select Course</h5></center>
								<select name="course" style="width: 100%; padding: 8px;">
									<?php 
										while ($row = mysqli_fetch_assoc($query2)) {
									?>
									<option value="<?php echo $row['course']; ?>"><?php echo $row['course']; ?></option>
									<?php
									}
									?>
								</select>
							</div>
						</div>

						<!-- start? -->

						<div class="col-md-6">
							<div class="form-group input-group">
								<input type="number" class="form-control" name="payamt" id="num1" placeholder="Amount Payable" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group input-group">
								<input type="number" class="form-control" name="paidamt" id="num2" placeholder="Amount Paid">
							</div>
						</div>
		</div>

			
				<div class="form-group">
					<input type="number" class="form-control" name="result" id="num3" placeholder="" readonly>
				</div>

				<div class="form-group input-group">
					<input type="text" class="form-control" name="status" id="stat" placeholder="" readonly>
				</div>

				<div class="form-group">
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