<?php
include 'config.php';
session_start();
if (!isset($_SESSION['loggedin'])) {
	header('Location : login.php');
}

$sql = "SELECT * FROM `libinvc`";
$query = mysqli_query($con,$sql);

$sql2 = "SELECT COUNT(`admin`)as admin FROM `libinvc`";
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
        <a class="nav-link" href="LIBRARY.php" ><b>Register a Library User </b><span class="sr-only">(current)</span></a>
      </li> 
      <li class="nav-item active">
        <a class="nav-link" href="listoflib.php"><b>List of Library Users </b><span class="sr-only">(current)</span></a>
      </li>
		<li class="nav-item">
        <a class="nav-link" href="login.php"><b>Logout</b></a>
      </li>
    </ul>
</nav>


<center><h1 class="mt-5" style="color: #fff;">LIBRARY USERS' INVOICE LIST</h1></center><hr><br>
<h3 class="text-center"><span class="badge badge-info" style="padding: 2px;"><?php echo  $row2 ['admin']?> Registered Invoices</span></h3>
r
<div class="containew-fluid">
	<div class="ro">
		<div class="col-md-1"></div>
		<div class="col-md-10">
			<table class="table table-bordered table-responsive table-striped table-hover table-condensed">
		<thead>
			<tr>
				<th>ID</th>
				<th>Library User's Name</th>
				<th>Email Address</th>
				<th>Date of Subscription</th>
				<th>Duration</th>
				<th>Expiration Date</th>
				<th>Amount Payable</th>
				<th>Amount Paid</th>
				<th>Balance to be Paid</th>
				<th>Account Status</th>
				<th>Created by</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
				while ($row = mysqli_fetch_assoc($query)) {
			?>	
			<tr>
				<td><?php echo $row['id']; ?></td>
				<td><?php echo $row['libuser']; ?></td>
				<td><?php echo $row['mail']; ?></td>
				<td><?php echo $row['subdate']; ?></td>
				<td><?php echo $row['duration']; ?></td>
				<td><?php echo $row['expdate']; ?></td>
				<td><?php echo $row['payable']; ?></td>
				<td><?php echo $row['paid']; ?></td>
				<td><?php echo $row['balance']; ?></td>
				<td><?php echo $row['status']; ?></td>
				<td><?php echo $row['admin']; ?></td>
				<td><a href="editlib.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">Update</a></td>
				
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