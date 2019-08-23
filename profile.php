
<?php require_once('include/header.php'); ?>
<?php require_once('dbconnect.php'); ?>
<br><br><br><br><br>

<!-----Profile Design Section start---->
<?php if(isset($_SESSION['name'])){ ?>
<div class="container">
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<img src="<?php echo $_SESSION['profile']; ?>" class="rounded-circle" width="280" height="250">
		</div>
		<div class="col-md-4"></div>
	</div>
	<!-----Table section start--->
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-7">
			<!---Tabloe start--->
			<table class="table">
				<tr>
					<th>FirstName</th>
					<th>FathersName</th>
					<th>Address</th>
					<th>Mobile</th>
					<th>Deperment</th>
					<th>EmailAddress</th>
				</tr>
				<tr>
					<td><?php echo $_SESSION['name']; ?> </td>
					<td><?php echo $_SESSION['fathersName'];?> </td>
					<td><?php echo $_SESSION['address']; ?> </td>
					<td><?php echo $_SESSION['mobile']; ?> </td>
					<td><?php echo $_SESSION['deperment']; ?> </td>
					<td><?php echo $_SESSION['email']; ?> </td>

				</tr>
			</table>
			<!---Table end--->

			<!----update profile section start--->
			<a href="profileUpdate.php" class="btn btn-success">Update Profile</a>
 			<a href="passwordupdate.php" class="btn btn-danger">Update Password</a>
			<!---update profile end --->

		</div>
		<div class="col-md-3"></div>
	</div>
	<!---Table section end---->
</div>
<!-----Profile Design Section edn---->
<?php } 

else{

	echo "<h2 style='color:red;text-align:center;'>Please Login Then Access Your Profile</h2>";
}



 ?>


<?php require_once('include/futter.php');?>

