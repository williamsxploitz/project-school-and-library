
<?php   // this code is use to insert the form details and register and expiration date
include 'dbconfig.php';
if(isset($_POST['register'])){
$firstname = $_POST['firstname'];
$lastname  = $_POST['lastname'];
$email 	   = $_POST['email'];
$date      = date("Y/m/d");
$expdate   = date('Y/m/d', strtotime('+1 years'));
$fetch = "INSERT INTO `expiration`(`firstname`, `lastname`, `mail`, `registerdate`, `expirationdate`) VALUES ('$firstname','$lastname','$email','$date','$expdate')";
$fire = mysqli_query($con,$fetch);
}
?>
 




<html lang="en" >
 
<head>
<meta charset="UTF-8">
<title>Technopoints | Expiration</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="css/index.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300'>
<style>
body {
    background: url("bgimg.jpeg");
	background-size:100%;
	background-repeat: no-repeat;
	position: relative;
	background-attachment: fixed;
	}
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
</head>
<body>
  <div id="registration-form">
	<div class='fieldset'>
    <legend>Technopoints</legend>
		<form action="" method="post" data-validate="parsley">
			<div class='row'>
			<!--	<label for='firstname'>First Name</label> -->
				<input type="text" placeholder="First Name" name='firstname' id='firstname' data-required="true" data-error-message="Your First Name is required" required>
			</div>
			<div class='row'>
			<!--	<label for="lastname">Last Name</label> -->
				<input type="text" placeholder="Last Name"  name='lastname' data-required="true" data-type="email" data-error-message="Your Last Name is required" required>
			</div>
			<div class='row'>
			<!--	<label for="email">Confirm your E-mail</label> -->
				<input type="text" placeholder="E-mail" name='email' data-required="true" data-error-message="Your E-mail must correspond" required>
			</div>
			<input type="submit" value="Register" name="register">
		</form>
	</div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/parsley.js/1.2.2/parsley.min.js'></script>
 

<div class="container">
  <h2>Previous Entries</h2>
  <p>You can see registration date and expiration date of each user below:</p>            
  <table class="table table-hover">
    <thead>
      <tr class="info">
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
		<th>Registration Date</th>
        <th>Expiration Date</th>
		<th>Status</th>
      </tr>
    </thead>
    <tbody>
<?php
$fetchqry = "SELECT * FROM `expiration`";
$result=mysqli_query($con,$fetchqry);
$num=mysqli_num_rows($result);
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
	   <tr>
        <td><?php echo $row['firstname'];?></td>
        <td><?php echo $row['lastname'];?></td>
		<td><?php echo $row['mail'];?></td>
        <td><?php echo $date1 = $row['registerdate'];?></td>
		<td><?php echo $date2 = $row['expirationdate'];?></td>
		<td><?php if(strtotime(date("Y/m/d")) < strtotime($date2)) echo "Active"; else { echo "Expired";} ?></td>
      </tr>											<?php } ?>
    </tbody>
  </table>
</div>
</body>
</html>