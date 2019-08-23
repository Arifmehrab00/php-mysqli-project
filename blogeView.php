<?php require_once('include/header.php'); ?>
<?php require_once('dbconnect.php'); ?>
<br>
<br>
<br>
<br>

<!----php single post view php script start--->
<?php

$id=$_GET['id'];

$sql="SELECT * FROM bloge_post WHERE id=$id ";

$sql_query=mysqli_query($conn,$sql);


$show=mysqli_fetch_array($sql_query);
 

?>
<!----php single post view php script end--->


<!-----Bloge single Page html element start--->
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<img src="admin/<?php echo $show['image']; ?>">
		</div>
	</div><!--first coulu end-->
	<div class="row">
		<div class="col-md-12">
			<h3><?php echo $show['title']; ?></h3>
		</div>
	</div><!--first coulu end-->
	<div class="row">
		<div class="col-md-12">
			<p><?php echo $show['description']; ?></p>
		</div>
	</div><!--first coulu end-->
	<div class="row">
		<div class="col-md-12">
			<strong><?php echo $show['category']; ?></strong>
		</div>
	</div><!--first coulu end-->

<!--- like Deslike Comment Section start -->

	<div class="row">
		<div class="col-md-12">
	<!--- like html code start --->
       <form action="" method="post">
               	  <input type="hidden" name="post_id" value="<?php echo $show['id']; ?>">
               	  <input type="submit" name="like" value="Like"
    style="border: none;
    background: no-repeat;
    padding: 17px 0px;
    font-size: 20px;
    font-weight: bold;
    color: rebeccapurple;
    ">

           <!---show like sql-->
    <?php 

$show_sql="SELECT * FROM post_like WHERE post_id='$show[id]' ";

$show_post=mysqli_query($conn,$show_sql);

$like_count=mysqli_num_rows($show_post);

?>
   <!---end like sql-->
   <strong>(<?php echo $like_count; ?>)</strong>
     </form>

   <!-- like html code end -->

   <!--- Deslike html code start --->
 <form action="" method="post">
     <input type="hidden" name="deslike_id" value="<?php echo $show['id']; ?>">
      <input type="submit" name="deslike" value="Deslike"
    style="border: none;
    background: no-repeat;
    padding: 17px 0px;
    font-size: 20px;
    font-weight: bold;
    color: rebeccapurple;
    ">

      <!---show Deslike sql-->
    <?php 

$show_deslike="SELECT * FROM post_deslike WHERE post_deslike='$show[id]' ";

$show_query=mysqli_query($conn,$show_deslike);

$deslike_count=mysqli_num_rows($show_query);

?>
   <!---end Deslike sql-->
   <strong>(<?php echo $deslike_count; ?>)</strong>

</form>
   <!-- Deslike html code end -->
   
		</div><!--end like colum-->

   </div><!-- end row like -->

<!---like Deslike Comment Section end-->



<!----- Comment Html Bloge start ---->

	<div class="row">
		<div class="col-md-8">
		  <form action="" method="post">
            <input type="hidden" name="commId" value="<?php echo $show['id']; ?>">
			<textarea required="Filup The Filed" class="form-control" rows="4" name="comment"></textarea>
			<input type="submit" name="addcomment" value="Comment" class="btn btn-success my-3">

		   </form>
		</div>
		<div class="col-md-4"></div>
	</div><!--first coulu end-->

<!----- Comment Html Bloge end ---->


<!----- show Comment script start ---->

	<div class="row">
		<div class="col-md-8">
			<h4 style="padding: 20px 10px;font-weight: bold;text-transform: uppercase;">All Comment Below</h4>

  <!---- comment show php script start --->
    <?php

    $comment_sql="SELECT * FROM post_comment WHERE comm_id='$show[id]' ORDER BY id DESC "; 

    $comment_query=mysqli_query($conn,$comment_sql);

    $comment_count=mysqli_num_rows($comment_query);

    if($comment_count>0){

    	?>
<?php while($show_comm=mysqli_fetch_array($comment_query)){ ?>

	         <strong>
	         <span style="color: green; font-size: 18px;">PostBy:<?php echo $show_comm['user_name']; ?>:</span>
	         <?php echo $show_comm['comment']; ?>
	         </strong>
			  <hr>
<?php 
        }//loop end//
      }//count end//
   ?>
    
 <!---- comment show php script start --->

		</div><!--colum end-->
		<div class="col-md-4"></div>
	</div><!--first coulu end-->

<!----- show Comment script end ---->


</div><!--container-->

<!-----Bloge single Page html element end--->

<!-- like script start -->
<?php

	if(isset($_POST['like'])){

if(isset($_SESSION['name'])){

	$likeValue=$_POST['post_id'];

	$user_id=$_SESSION['userId'];

	$like_sql="INSERT INTO `post_like`(`user_id`, `post_id`) VALUES ('$user_id','$likeValue') ";

	mysqli_query($conn,$like_sql);
          
    }else{

	echo "<h2 style='text-align:center;color:red;font-size:30px;padding:20px 10px;'>Please Login Outher's Wais Don't Like OR Comment This Bloge</h2>";
}

  }//isset end//

 ?>
<!-- like script end -->


<!-- Deslike script start -->
<?php

	if(isset($_POST['deslike'])){

if(isset($_SESSION['name'])){

	$deslike_id=$_POST['deslike_id'];

	$user_id=$_SESSION['userId'];

	$deslike_sql="INSERT INTO `post_deslike`(`user_deslike`, `post_deslike`) VALUES ('$user_id','$deslike_id') ";

	mysqli_query($conn,$deslike_sql);
          
    }else{

	echo "<h2 style='text-align:center;color:red;font-size:30px;padding:20px 10px;'>Please Login Outher's Wais Don't Like OR Comment This Bloge</h2>";
}

  }//isset end//

 ?>
<!-- Deslike script end -->



<!---  Comment Script Start --->

<?php 

if(isset($_POST['addcomment'])){


if(isset($_SESSION['name'])){

$comm_user_id=$_SESSION['userId'];

$comm_post_id=$_POST['commId'];

$userName=$_SESSION['name'];

$comment_value=$_POST['comment'];

//comment Data insert///
$comm_sql="INSERT INTO post_comment (`user_id`,`comm_id`,`user_name`,`comment`) VALUES ('$comm_user_id','$comm_post_id','$userName','$comment_value') ";

$comm_query=mysqli_query($conn,$comm_sql);


}//isset session end//
else{

	echo "<h2 style='text-align:center;color:red;font-size:30px;padding:20px 10px;'>Please Login Outher's Wais Don't Like OR Comment This Bloge</h2>";
}
}//isset end//

 ?>
<!---  Comment Script Start --->


<?php include_once('include/futter.php'); ?>


