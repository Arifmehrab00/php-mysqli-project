
<?php require_once('includ/header.php')?>
<?php require_once('dbconnect.php'); ?>


<?php if(isset($_SESSION['admin_name'])){ ?>

<div class="admin_title">
<span style="float: left;font-size: 35px;font-weight: bold;padding: 10px; margin-left: 300px;">Welcome To Your Dashboard</span>
<!--admin user name and and image show-->
<span style="float: right; color:white;font-weight: bold;padding: 22px 29px;"><?php echo $_SESSION['admin_name']; ?></span>
<!---end-->
</div>
  <!----2nd start--->
  	<div class="row">
  		<div class="col-md-3">
  			<div id="left_sidebar">

  				

  			<ul class="menu1">
            
            	<h2 class="menu"><a href="dashborb.php">Menu List:</a></h3>
  				<li><a href="alluser.php">All User</a></li>
  				<li><a href="photogallery.php">PhotoGallery</a></li>
  				<li><a href="addpost.php">Add Post</a></li>
  				<li><a href="logout.php">Logout</a></li>
  			</ul>


  		</div>
  		</div>
      <!-------php photo gallery html element start---->
  		<div class="col-md-7 offset-4">

        <h3 style="padding: 10px 10px;text-align: center;text-transform: uppercase;margin-top: 70px;">Photo Gallery Control</h3>

        <form action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required="please file up the file">
          </div>
          <div class="form-group">
            <label>Image Uploade</label>

            <input type="file" name="file" class="form-control" required="please filup the file">

            <br>
            <input type="submit" name="submit" value="submit" class="btn btn-success">
          </div>

        </form>
  <!---------admin post show php script start--->
<?php
$show_sql="SELECT * FROM photogallery ORDER BY id DESC";

$show_query=mysqli_query($conn,$show_sql);

$show_count=mysqli_num_rows($show_query);

if($show_count>0){
  ?>

  <table class="table">
    <tr>
      <td>Title</td>
      <td>Image</td>
      <td>Action</td>
    </tr>
    <?php $a=0; while($show_resuit=mysqli_fetch_array($show_query)){ $a++ ?>

    <tr>
      <td><?php echo $show_resuit['title'] ?></td>

      <td> <img src="<?php echo $show_resuit['image']; ?>" width="100"></td>

      <td> <a class="btn btn-success" href="">Edit</a> /* <a class="btn btn-danger" href="photogallery.php?photoDelet=<?php  echo $show_resuit['id']; ?>" onclick="return confirm('are you sure delete user');">Delete</a> </td>

    </tr>

  <?php }//while loop end//
  echo "</table>";
}//count end//
?>
<!------admin post php script end---->
  	</div>
    <!-------php photo gallery html element end---->


  	<?php require_once('includ/futter.php')?>
  
<?php } else{
  echo "<h1>This is out of Dangers Area Please Login amdin Panel</h1>";
}
  	
?>


<!----------php Photo Gallery admin coding start----->
<?php
if(isset($_POST['submit'])){

$title=$_POST['title'];

//image coding//
$image="image/".rand(00000,99999).$_FILES['file']['name'];

move_uploaded_file($_FILES['file']['tmp_name'], $image);

//Data insert start//
$gallery_sql="INSERT INTO photogallery (title,image) VALUES ('$title','$image') ";

$gallery_query=mysqli_query($conn,$gallery_sql);

}


?>
 
<!----------php Photo Gallery admin coding end----->


<!-------php post Delete script start----->

<?php 
if(isset($_GET['photoDelet'])){

  $photoDelet=$_GET['photoDelet'];

  $photoDelete_sql="DELETE FROM photogallery WHERE id='$photoDelet' ";

  $photoDelet_query=mysqli_query($conn,$photoDelete_sql);

}

?>

<!-------php post Delete script start----->