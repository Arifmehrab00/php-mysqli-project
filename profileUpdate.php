<?php require_once('include/header.php'); ?>
<?php require_once('dbconnect.php'); ?>

<!------update Query Start------->
<?php
if(isset($_POST['update'])){


$sql="UPDATE student_info SET `name`='$_POST[FullName]',`fathers name`='$_POST[FathersName]',`address`='$_POST[Address]',`mobile`='$_POST[Mobile]',`deperment`='$_POST[Deperment]',`email`='$_POST[email]' WHERE id='$_SESSION[userId]' ";


 $Uquery=mysqli_query($conn,$sql);

 ///update image Query start//

if($_FILES['fileToUpload']['name']){

	unlink($_SESSION['profile']);

	$image="image/".$_SESSION['userId'].$_FILES['fileToUpload']['name'];

	move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $image);

	$imgUpdate="UPDATE student_info SET profile='$image' WHERE id='$_SESSION[userId]' ";


	$imgQuery=mysqli_query($conn,$imgUpdate);


}
 ///update image Query end//

///Show Update Informatin start///

$showsql="SELECT * FROM student_info WHERE id='$_SESSION[userId]' ";

$showQuery=mysqli_query($conn,$showsql);

$row_count=mysqli_num_rows($showQuery);

if($row_count==1){

$value=mysqli_fetch_array($showQuery);

$_SESSION['userId']=$value['id'];
		$_SESSION['name']=$value['name'];
			$_SESSION['fathersName']=$value['fathers name'];
				$_SESSION['address']=$value['address'];
					$_SESSION['mobile']=$value['mobile'];
						$_SESSION['deperment']=$value['deperment'];
							$_SESSION['email']=$value['email'];
								   $_SESSION['profile']=$value['profile'];


         header("Location:profile.php");

}

///Show Update Informatin start///

}//isset end//

 ?>
<br>
<br>
<br>
<br>
<div class="container">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<h2 class="text-center py-4">Student Account Update</h2>

			
			<form action="#" method="post" enctype="multipart/form-data">

				<div class="form-group">
					<h5>Full Name<span style="color: red;">*</span></h5>
					<input type="text" name="FullName" class="form-control" value="<?php echo $_SESSION['name']; ?>">
				</div><!---from group end-->

				<div class="form-group">
					<h5>Father's Name:</h5>
					<input type="text" name="FathersName" class="form-control" value="<?php echo $_SESSION['fathersName']; ?>">
				</div><!---from group end-->

				<div class="form-group">
					<h5>Address:</h5>
					<input type="text" name="Address" class="form-control" value="<?php echo $_SESSION['address']; ?>">
				</div><!---from group end-->

				<div class="form-group">
					<h5>Mobile Number<span style="color: red;">*</span></h5>
					<input type="Number" name="Mobile" class="form-control" value="<?php echo $_SESSION['mobile']; ?>">
				</div><!---from group end-->

				<div class="form-group">
					<h5>Deperment<span style="color: red;">*</span></h5>
					<input type="text" name="Deperment" class="form-control" value="<?php echo $_SESSION['deperment']; ?>">
				</div><!---from group end-->

				<div class="form-group">
					<h5>Email Address<span style="color: red;">*</span></h5>
					<input type="email" name="email" class="form-control" value="<?php echo $_SESSION['email']; ?>">
				</div><!---from group end-->

				<div class="form-group">
					<h5>Profile Picture</h5>
					<input type="file" name="fileToUpload" class="form-control"><img src="<?php echo $_SESSION['profile'] ?>" width="100">
				</div><!----form file edn--->

				<div class="form-group">
					<input type="submit" value="Update" name="update" class="btn btn-success btn-block">
				</div><!----form submit end-->

                  </form><!--end form-->

		</div><!--col 6 end-->
		<div class="col-md-3"></div>
	</div><!----row--->
</div>
<!-------body section end---->

<?php require_once('include/futter.php');?>
