<?php require_once('include/header.php'); ?>
<?php require_once('dbconnect.php'); ?>
<Br>
<br>
<br>
<br>
<!------------php password Update coding start------------>
<?php
if(isset($_POST['submit'])){
//check password//
$current_pass=$_POST['current_pass'];

$check_pass="SELECT * FROM student_info WHERE email='$_SESSION[email]' AND password='$current_pass' ";

$check_query=mysqli_query($conn,$check_pass);

$row_count=mysqli_num_rows($check_query);

if($row_count>0){
	//check new pass confirm pass start//
	$error=0;
	if($_POST['new_pass'] != $_POST['conPass']){

		$error_confirm="Sorry You new password And confirm Password Not Match";

		$error=1;
	}
	//check new pass confirm pass end//

	//check new pass confirm pass start//

	if(strlen($_POST['new_pass'])<7){

		$error_lenth="Your Password Must Be 8 Carector";

		$error=1;
	}
	//check new pass confirm pass end//

	//password update coding start//
            if($error>0){

            	$error_flow="Please Flow The Instraction";
            }else{

            	//update Query//

            	$pass_update="UPDATE student_info SET password='$_POST[new_pass]' WHERE id='$_SESSION[userId]' ";

            	$pass_query=mysqli_query($conn,$pass_update);

            	 echo "<h3 style='color:green;text-align:center;'>Your password is successfully Update <a href='signin.php'>Please Signin</a></h3>";

            }//update Query///
	//password update coding end//
}else{
	echo "<h3 style='red;'>Your Current Password Is Wrong</h3>";
}

}//issect submit//
?>
<!------------php password Update coding End------------>

<!----------This is Html Element Code------------>
<div class="container">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-5">
			<h4 class="py-3">Change Your password</h4>
			<form action="#" method="post">


		<div class="form-group">
			<h5>Current Password:</h5>
			<input required type="password" name="current_pass" class="form-control">
		</div>
		<div class="form-group">
			<h5>New Password:</h5>
			<input type="password" name="new_pass" class="form-control">
		</div>

		<div class="form-group">
			<h5>Confirm Password:</h5>
			<input type="password" name="conPass" class="form-control">
		</div>

		<div class="form-group">
			<input type="submit" name="submit" value="Change" class="btn btn-danger">
		</div>
<!------------errroe message confirm password------>
<span style="color:red;font-size: 20px;text-align: center;"><?php if(isset($error_confirm)){ echo $error_confirm; } ?></span>
<span style="color:red;font-size: 20px;text-align: center;"><?php if(isset($error_lenth)){ echo $error_lenth; } ?></span>
<span style="color:red;font-size: 20px;text-align: center;"><?php if(isset($error_flow)){ echo $error_flow; } ?></span>
<!---errof message end-->			</form>
		</div>
		<div class="col-md-3"></div>
	</div>
</div>
<!------edn html block---->




<?php require_once('include/futter.php');?>