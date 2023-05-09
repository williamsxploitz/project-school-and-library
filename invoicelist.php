<?php
include 'config.php';
session_start();
if (!isset($_SESSION['loggedin'])) {
	header('Location : login.php');
}

$sql = "SELECT * FROM `studinvc`";
$query = mysqli_query($con,$sql);

$sql2 = "SELECT COUNT(`admin`)as admin FROM `studinvc`";
$query2 = mysqli_query($con,$sql2);
$row2 = mysqli_fetch_assoc($query2);


?>






<!DOCTYPE html>
<html>
<head>
	<title>STUDENT INVOICE LIST</title>
	<link rel="stylesheet" type="text/css" href="boostrap/css/boostrapcss.css">
	<style type="text/css">

				body{
					background: #6bcb97;
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
				.footer {
					background-image: linear-gradient(to bottom, blue, #000)
					margin-top: 50px;
					padding: 8px;
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
      <li class="nav-item">
        <a class="nav-link" href="login.php"><b>Logout</b></a>
      </li>
    </ul>
</nav>
	

<center><h1 class="mt-5" style="color: #fff;">STUDENT INVOICE LIST</h1></center><hr><br>
<h3 class="text-center"><span class="badge badge-info" style="padding: 2px;"><?php echo  $row2 ['admin']?> Registered Invoices</span></h3>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">
			<table class="table table-bordered table-responsive table-striped table-hover table-condensed">
		<thead>
			<tr>
				<th>ID</th>
				<th>Student Name</th>
				<th>Course of Study</th>
				<th>Amount Payable</th>
				<th>Amount Paid</th>
				<th>Balance</th>
				<th>Account Status</th>
				<th>Created by</th>				
				<th>Reg Time/Date</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
				while ($row = mysqli_fetch_assoc($query)) {
			?>	
			<tr>
				<td><?php echo $row['id']; ?></td>
				<td><?php echo $row['studname']; ?></td>
				<td><?php echo $row['course']; ?></td>
				<td><?php echo $row['payable']; ?></td>
				<td><?php echo $row['paid']; ?></td>
				<td><?php echo $row['balance']; ?></td>
				<td><?php echo $row['status']; ?></td>
				<td><?php echo $row['admin']; ?></td>
				<td><?php echo $row['reg_time']; ?></td>
				<td><a href="editstud.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">Update</a></td>
				
			</tr>
		<?php
			}
		?>

		</tbody>
	</table>
</div>
		</div>
		<div class="col-md-1"></div>
	</div>
	






<script type="text/javascript" src="boostrap/js/jquery.js"></script>
<script type="text/javascript" src="boostrap/js/popper.js"></script>
<script type="text/javascript" src="boostrap/js/boostrap.js"></script>

</body>
</html>