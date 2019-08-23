
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
  		<div class="col-md-7"></div>


<div class="col-md-2"></div>
  	</div>



  	<?php require_once('includ/futter.php')?>
  
<?php } else{
  echo "<h1>This is out of Dangers Area Please Login amdin Panel</h1>";
}
  	
?>