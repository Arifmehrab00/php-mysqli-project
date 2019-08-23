
<?php require_once('includ/header.php')?>
<?php require_once('dbconnect.php'); ?>


<?php if(isset($_SESSION['admin_name'])){ ?>

<div class="admin_title">
<span style="float: left;font-size: 35px;font-weight: bold;padding: 10px; margin-left: 300px;">Welcome To Your Dashboard</span>
<!--admin user name and and image show-->
<span style="float: right; color:white;font-weight: bold;padding: 22px 29px;"><?php echo $_SESSION['admin_name']; ?></span>
<!---end-->
</div>
<br><br>
  <!----2nd start--->
  	<div class="row">
  		<div class="col-md-3">
  			<div id="left_sidebar">

  				

  			<ul class="menu1">
            
            	<h2 class="menu"><a href="dashborb.php">Menu List:</a></h3>
  				<li><a href="alluser.php">All User</a></li>
  				<li><a href="photogallery.php">PhotoGallery</a></li>
  				<li><a href="addpost.php">Add post</a></li>
  				<li><a href="logout.php">Logout</a></li>
  			</ul>


  		</div>
  		</div>
  		<div class="col-md-9">

        <h3 style="text-align: center;" class="my-5">Control All User</h3>


    <!-----------php Search option Script Start--------->

<?php

if(isset($_POST['submit'])){

  $svalue=$_POST['search'];

$serch_sql="SELECT * FROM student_info WHERE `name` LIKE '%$svalue%' OR `address` LIKE '% $svalue%' OR `mobile` LIKE '%$svalue%' OR `deperment` LIKE '%$svalue%' OR `email` LIKE '%$svalue%' ";

$serch_query=mysqli_query($conn,$serch_sql);

$Scount=mysqli_num_rows($serch_query);
   
   if($Scount>0){

    ?>
<!---table-->

<h3 style="text-align: center; color: green; font-weight: bold;">Your Serch Information Is Below</h3>

  <table border="1" class="table mt-5">
    <tr>
      <th>UserID</th>
      <th>Name</th>
      <th>Fathers Name</th>
      <th>Address</th>
      <th>Mobile</th>
      <th></th>
      <th>Deperment</th>
      <th>Email</th>
      <th>Profile</th>
    </tr>
 
  <!----php secript start--->
  <?php

    $id=0; 
while($serch_show=mysqli_fetch_array($serch_query)){
$id++
  ?>

<tr>
  <td><?php echo $id; ?></td>
   <td><?php echo $serch_show['name'];?></td>
    <td><?php echo $serch_show['fathers name']; ?></td>
     <td><?php echo $serch_show['address']; ?></td>
      <td><?php echo $serch_show['mobile']; ?><td>
       <td><?php echo $serch_show['deperment'];?></td>
          <td><?php echo $serch_show['email'];?></td>

         <td><img src="../<?php echo $serch_show['profile'];?>" width="50"></td>
</tr>

<?php }//while end// 

echo "</table>";

   }//count end//

   else{
      echo "<h3 style='text-align: center; color: red; font-weight: bold;padding:10px 10px;'>Your Serch Resuit is Not match</h3>";
   }
  
}//isset end//

 ?>

  <!-----------php Search option Script edn--------->


        <!--search option html tag-->
   <form class="form-inline ml-auto" action="" method="post">

    <input class="form-control" name="search" type="search" placeholder="search">
    <input type="submit" name="submit" class="btn btn-success" value="search">

  </form>

        <!---edn search option html tag-->
      
      <!------------all user show php secript start---->

<?php

$alluser_sql="SELECT * FROM student_info ORDER BY id DESC";

$alluser_Query=mysqli_query($conn,$alluser_sql);


$alluser_count=mysqli_num_rows($alluser_Query);

if($alluser_count>0){

 ?>
<!---table-->
  <table class="table mt-5">
    <tr>
      <th>UserID</th>
      <th>Name</th>
      <th>Fathers Name</th>
      <th>Address</th>
      <th>Mobile</th>
      <th></th>
      <th>Deperment</th>
      <th>Email</th>
      <th>Profile</th>
      <th>Status</th>
    </tr>
 
  <!----php secript start--->
  <?php

    $id=0; 
while($showUser=mysqli_fetch_array($alluser_Query)){
$id++
  ?>

<tr>
  <td><?php echo $id; ?></td>
   <td><?php echo $showUser['name'];?></td>
    <td><?php echo $showUser['fathers name']; ?></td>
     <td><?php echo $showUser['address']; ?></td>
      <td><?php echo $showUser['mobile']; ?><td>
       <td><?php echo $showUser['deperment'];?></td>
          <td><?php echo $showUser['email'];?></td>

         <td><img src="../<?php echo $showUser['profile'];?>" width="50"></td>


          <td><a class="btn btn-success" href="alluser.php?userStatus=<?php echo $showUser['id']; ?>"><?php echo $showUser['status']; ?></a></td>


            <td><a class="btn btn-danger" onclick="return confirm('Are you sure User is Delete')" href="alluser.php?userDelete=<?php echo $showUser['id']; ?>">Delete</a></td>

</tr>

<?php }//while end// 

echo "</table>";

 }//count end//
 else{

  echo "Your User ID Not Regester";
}//count end//

?>
<!----------all user php secript coding end------------->

</div>



  	</div>



  
<?php } else{
  echo "<h1>This is out of Dangers Area Please Login amdin Panel</h1>";
 }
  	
?>



<!----------------User Activeaction Code start-------->
<?php

if(isset($_GET['userStatus'])){

$userId=$_GET['userStatus'];

$usersql="SELECT status FROM student_info WHERE id='$userId' ";


$user_query=mysqli_query($conn,$usersql);


$resuit=mysqli_fetch_array($user_query);


if($resuit['status']=='active'){

$user_active="inactive";

}else{

$user_active="active";

}

$update_user="UPDATE student_info SET status='$user_active' WHERE id='$userId' ";


$update_query=mysqli_query($conn,$update_user);



}

 ?>

<!----------------User Activeaction Code end-------->

<!---------------**User Delete Php Coding start**----->
<?php

if(isset($_GET['userDelete'])){

$userDelete=$_GET['userDelete'];

$delete_sql="DELETE FROM student_info WHERE id='$userDelete' ";

$delete_query=mysqli_query($conn,$delete_sql);

}

 ?>
<!---------------**User Delete Php Coding end**----->




