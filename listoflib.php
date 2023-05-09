<?php
include 'config.php';
session_start();
if (!isset($_SESSION['loggedin'])) {
	header('Location : login.php');
}

$sql = "SELECT * FROM `prolibrary`";
$query = mysqli_query($con,$sql);

$sql2 = "SELECT COUNT(`fname`)as admin FROM `prolibrary`";
$query2 = mysqli_query($con,$sql2);
$row2 = mysqli_fetch_assoc($query2);


?>






<!DOCTYPE html>
<html>
<head>
	<title>LIBRARY USER'S LIST</title>
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
        <a class="nav-link" href="library.php" ><b>Register a Library User </b><span class="sr-only">(current)</span></a>
      </li> 
     <li class="nav-item active">
        <a class="nav-link" href="libinvclist.php"><b>Invoice of Library Users </b><span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php"><b>Logout</b></a>
      </li>
    </ul>
</nav>


<center><h1 class="mt-5" style="color: #fff;">LIST OF LIBRARY USERS</h1></center><hr><br>
<h3 class="text-center"><span class="badge badge-info" style="padding: 2px;"><?php echo  $row2 ['admin']?> Library Users</span></h3>

<div class="container-fluid text-center">
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">
			<table class="table table-bordered table-responsive table-striped table-hover table-condensed">
		<thead>
			<tr>
				<th>ID</th>
				<th>First Name</th>
				<th>Second Name</th>
				<th>Phone Number</th>
				<th>Alternate Number</th>
				<th>Home Address</th>
				<th>Email Address</th>
				<th>Reg Time/Date</th>
			</tr>
		</thead>
		<tbody>
			<?php
				while ($row = mysqli_fetch_assoc($query)) {
			?>	
			<tr>
				<td><?php echo $row['id']; ?></td>
				<td><?php echo $row['fname']; ?></td>
				<td><?php echo $row['sname']; ?></td>
				<td><?php echo $row['num']; ?></td>
				<td><?php echo $row['alt']; ?></td>
				<td><?php echo $row['add']; ?></td>
				<td><?php echo $row['mail']; ?></td>
				<td><?php echo $row['reg_time']; ?></td>
				
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