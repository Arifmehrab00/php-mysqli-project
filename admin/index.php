<?php require_once('includ/header.php')?>

<?php require_once('dbconnect.php'); ?>


<!--------header start------------->
	<section class="main_deader">
		<div class="container">
			<div class="col-md-4"></div>
			<div class="col-md-4 main_class offset-4">
			<h1 class="adminTitle">Admin Login Hear</h1>
			<form action="#" method="post">
				<input type="text" name="adminUser" class="form-control" placeholder="userName">
				<br>
				<input type="password" name="admin_pass" class="form-control" placeholder="Password"><br>

				<input type="submit" name="login" value="Login" class="btn btn-success btn-block">
			</form>

		</div>
	
		<div class="col-md-4"></div>
	
	</div>
</section>
	</header>

<!--------header end------------->

<!------php admin script stasrt ---->

<?php
if(isset($_POST['login'])){

	$adminsql="SELECT * FROM admin WHERE admin_name='$_POST[adminUser]' AND admin_password='$_POST[admin_pass]' ";

	$adminQuery=mysqli_query($conn,$adminsql);


    $admin_count=mysqli_num_rows($adminQuery);


    if($admin_count==1){

    	$admin_show=mysqli_fetch_array($adminQuery);

    	$_SESSION['admin_id']=$admin_show['id'];
    	    	$_SESSION['admin_name']=$admin_show['admin_name'];
    	    	    	$_SESSION['admin_password']=$admin_show['admin_password'];

    	header("Location:dashborb.php");
    }else{
echo "<h4 style='color:red;border:1px solid red;padding:8px;width:400px;margin:auto;text-align:center; margin-bottom:15px;'>Login failed please try again</h4>";
		}
	



}///isset end///


 ?>


<!------php admin script end ---->


	