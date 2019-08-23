<?php require_once('include/header.php');?>
<?php require_once('dbconnect.php'); ?>
<!---------php codding Start----------->
<?php

if(isset($_POST['submit'])){

	$error=0;

///----passs confirm password match code start-----///
if($_POST['password'] != $_POST['connPass']){

	$errorPass="Password Confirm Password Not match";
	$error=1;
}
///-----passs confirm password match code start----///


 //----password Lenth conding start---///
if(strlen($_POST['password'])<8){

	$LenthPass="Password Must Be 8 Digit";
	$error=1;
}
 //-----password lenth condding end----///


//-----Email valiadition conding start----///

$check_email="SELECT * FROM student_info WHERE email='$_POST[email]' ";

$email_qur=mysqli_query($conn,$check_email);

$count=mysqli_num_rows($email_qur);

if($count>0){

	$email_existed= "Your account already existed please"."<a href='signin.php'>Login</a>";

	$error=1;
}

//----Email valiadition conding start----///


//----Name , Number , Email  valiadition conding start----///
/*
if(empty($Name)){

	$Filed_error_message="Please Name is require";
	$error=1;
}
*/
//-----Name , Number , Email  valiadition conding end---///


//----Data Insert Codding start----//

if($error==0){

	$Name=$_POST['FullName'];
	$FathersName=$_POST['FathersName'];
	$Address=$_POST['Address'];
	$Mobile=$_POST['Mobile'];
	$Deperment=$_POST['Deperment'];
	$Email=$_POST['email'];
	$password=$_POST['password'];

    //----Image Insert && valiatatin Start---//

        $image='image/'.rand(00000,9999999).$_FILES['fileToUpload']['name'];

			$file_ex=pathinfo($_FILES['fileToUpload']['name'],PATHINFO_EXTENSION);

			if($file_ex == 'jpg' || $file_ex == 'JPG'  || $file_ex == 'png'){

				if(file_exists($image)){

					echo "your file already existes";
				}

				else{

				    move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $image); 
				    //echo "File upload successfully";
				}
			}
			else{
				echo "invalide file";
			}
			
     //----Image Insert && valiatatin End---//

            ///Data insert Codding Start///
            
             $sql="INSERT INTO student_info (`name`,`fathers name`,`address`,`mobile`,`deperment`,`email`,`password`,`profile`,`status`) VALUES  ('$Name','$FathersName','$Address','$Mobile','$Deperment','$Email','$password','$image','active') ";

             $Dinsert=mysqli_query($conn,$sql);

             if($Dinsert){
                   header("Location:signin.php");
                   $_SESSION['login_success']="Login Successfully Please Login";
             }else{
             	$insert_error= "Data Insert Not successFully";
             }

             ///Data insert Codding Start///
             


}//----Data Insert Codding start----//








}//isset end//
?>
<!---------php codding end----------->
<!-------------SignUp body section start-------------->
<br>
<br>
<br>
<br>
<div class="container">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<h2 class="text-center py-4">Create Student Account</h2>

			<!----account already existed message start--->
                    <span style="color: red; font-size: 20px; font-weight: bold;"><?php if(isset($email_existed)){ echo $email_existed;} ?></span>
				<!----account already existed message start--->

			<form action="#" method="post" enctype="multipart/form-data">

				<div class="form-group">
					<h5>Full Name<span style="color: red;">*</span></h5>
					<input type="text" name="FullName" class="form-control">
				</div><!---from group end-->

				<div class="form-group">
					<h5>Father's Name:</h5>
					<input type="text" name="FathersName" class="form-control">
				</div><!---from group end-->

				<div class="form-group">
					<h5>Address:</h5>
					<input type="text" name="Address" class="form-control">
				</div><!---from group end-->

				<div class="form-group">
					<h5>Mobile Number<span style="color: red;">*</span></h5>
					<input type="Number" name="Mobile" class="form-control">
				</div><!---from group end-->

				<div class="form-group">
					<h5>Deperment<span style="color: red;">*</span></h5>
					<input type="text" name="Deperment" class="form-control">
				</div><!---from group end-->

				<div class="form-group">
					<h5>Email Address<span style="color: red;">*</span></h5>
					<input type="email" name="email" class="form-control">
				</div><!---from group end-->

				<div class="form-group">
					<h5>Password<span style="color: red;">*</span></h5>
					<input type="Password" name="password" class="form-control">
					<!----password Lenth error message--->
					<span style="color:red;"><?php if(isset($LenthPass)){ echo $LenthPass; } ?></span>
					<!---- Lenth error maessage end---->
				</div><!---from group end-->

				<div class="form-group">
					<h5>Confirm Password<span style="color: red;">*</span></h5>
					<input type="Password" name="connPass" class="form-control">
					<!----confirm password error message--->
					<span style="color:red;"><?php if(isset($errorPass)){ echo $errorPass; } ?></span>
					<!----error maessage end---->
				</div><!---from group end-->

				<div class="form-group">
					<h5>Profile Picture</h5>
					<input type="file" name="fileToUpload" class="form-control">
				</div><!----form file edn--->

				<div class="form-group">
					<input type="submit" value="Submit" name="submit" class="btn btn-success btn-block">
				</div><!----form submit end-->

                  <!--filed error message--->
                     <span style="color: red; border: 2px solid red; padding: 8px;"><?php if(isset($Filed_error_message)){ echo $Filed_error_message;} ?></span>
               <!---filed error message end--->

               <!--Insert error Message --->
                     <span style="color: green; font-size: 20px; font-weight: bold;"><?php if(isset($insert_error)){ echo $insert_error;} ?></span>
               <!---insert error message end--->



			</form><!--end form-->
		</div><!--col 6 end-->
		<div class="col-md-3"></div>
	</div><!----row--->
</div>
<!-------body section end---->
<?php require_once('include/futter.php');?>

