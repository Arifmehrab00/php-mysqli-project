<?php require_once('include/header.php'); ?>
<?php require_once('dbconnect.php'); ?>

<br>
<br>
<br>
<br>
<!-----------body section start----->
<div class="container">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<h2 class="text-center py-2">Please Login</h2>

			  <!--Insert successfully Message --->
                   <?php if(isset($_SESSION['login_success'])){ ?>
	                  <div class="alert alert-success">
		                 <strong>Successfully!</strong>Please Login
	                   </div>
                    <?php } ?>
               <!---insert successfully message end--->

			<form action="" method="post">

				<div class="form-group">
					<h5>Email Address<span style="color: red;">*</span></h5>
					<input type="email" name="email" class="form-control">
				</div><!---from group end-->

				<div class="form-group">
					<h5>Password<span style="color: red;">*</span></h5>
					<input type="Password" name="password" class="form-control">
				</div><!---from group end-->

				<div class="form-group">
					<input type="submit" value="Submit" name="login" class="btn btn-success btn-block">
				</div><!----form submit end-->


			</form><!--end form-->

			
		</div><!--col 6 end-->
		<div class="col-md-3"></div>
	</div><!----row--->
</div>
<!-----------body section end----->

<?php require_once('include/futter.php'); ?>

<?php unset($_SESSION['login_success']); ?>


<!------php login Script start---------->
<?php 

if(isset($_POST['login'])){

$password=$_POST['password'];
$email=$_POST['email'];


if(empty($_POST['email'])){

	echo "<h4 style='color:red;border:1px solid red;padding:8px;width:400px;margin:auto;text-align:center; margin-bottom:15px;'>Email is Require!</h4>";

}else{


$sql="SELECT * FROM `student_info` WHERE email='$email' AND `password`='$password' AND `status`='active' ";


$resuit=mysqli_query($conn,$sql);

$row=mysqli_num_rows($resuit);

if($row==1){

///mysqli fetch array seccession//

	$show=mysqli_fetch_array($resuit);

	$_SESSION['userId']=$show['id'];
		$_SESSION['name']=$show['name'];
			$_SESSION['fathersName']=$show['fathers name'];
				$_SESSION['address']=$show['address'];
					$_SESSION['mobile']=$show['mobile'];
						$_SESSION['deperment']=$show['deperment'];
							$_SESSION['email']=$show['email'];
								$_SESSION['password']=$show['password'];
								   $_SESSION['profile']=$show['profile'];

	header("Location:profile.php");

}
else{

	echo "<h4 style='color:red;border:1px solid red;padding:8px;width:400px;margin:auto;text-align:center; margin-bottom:15px;'>Login failed please try again</h4>";
}

}//empty//

}//issect//

?>

<!------php login Script End---------->