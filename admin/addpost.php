
<?php require_once('includ/header.php')?>
<?php require_once('dbconnect.php'); ?>
<style type="text/css">
  .description {
    display: block;
    width: 450px;
}
</style>
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
  				<li><a href="addpost.php">Add Post</a></li>
  				<li><a href="logout.php">Logout</a></li>
  			</ul>


  		</div>
  		</div>
      <!----add post html element start---->
  		<div class="col-md-7 offset-4">
            
            <h3 style="text-align: center; margin: 15px 20px;" class="mt-5">Add Bloge POST</h3>

          <!--Insert successfully Message --->
                   <?php if(isset($insert_success)){ ?>
                    <div class="alert alert-success">
                     <strong><?php echo $insert_success; ?>!</strong>Thanks You
                     </div>
                    <?php } ?>
               <!---insert successfully message end--->
               
         <form class="mt-5" action="#" method="post" enctype="multipart/form-data">

           <div class="form-group">
             <label>Post Title:</label>
             <input type="text" name="title" class="form-control">
           </div>

            <div class="form-group">
             <label>Post Description:</label>
             <textarea rows="7" class="form-control" name="description"></textarea>
           </div>

            <div class="form-group">
             <label>Category:</label>
            <select name="category" class="form-control">

              <option value="html">Html</option>
               <option value="css">Css</option>
                <option value="php">Php</option>
                 <option value="webdesign">WebDesign</option>
                  <option value="webdevelopment">WebDevelopment</option>

            </select>
           </div>

          <div class="form-group">
             <label>Feture Image:</label>
             <input type="file" name="file" class="form-control">
          </div>

          <input type="submit" name="post" value="Add Post" class="btn btn-success">

         </form>
        
      </div>
      <!------add post html element end---->
  	</div>
<!----post show html element start--->

<div class="col-md-9 offset-3">
   <!---------Bloge POst show php Scripte start---->
    <?php 
    $post_sql="SELECT * FROM bloge_post ORDER BY id DESC";

    $post_query=mysqli_query($conn,$post_sql);

    $post_count=mysqli_num_rows($post_query);


    if($post_count>0){

    ?>
    <table class="table my-5">
      <tr>
        <th>ID</th>
        <th>TITLE</th>
        <th class="description">Description</th>
        <th>CATEGORY</th>
        <th>IMAGE</th>
        <th>ACTION</th>
      </tr>
      <!--Daynamick Table start-->
    
<?php $id=0; while($post_show=mysqli_fetch_array($post_query)){ $id++ ?>
    <tr>
        <td><?php echo $id; ?></td>
           <td><?php echo $post_show['title']; ?></td>
              <td class="description"><?php echo $post_show['description']; ?></td>
                 <td><?php echo $post_show['category']; ?></td>
                    <td><img width="80" src="<?php echo $post_show['image']; ?>"> </td>
                       <td>
                        <a class="btn btn-success" href="postEdite.php?postEdite=<?php echo $post_show['id'] ?>">EDIT</a>
                        /*
                        <a onClick="return confirm('Are you sure Delete Post')"; class="btn btn-danger" href="addpost.php?postDelete=<?php echo $post_show['id']; ?>">DELETE</a>
                       </td>
      </tr>

        <?php
 }//while loop end//
     echo"</table>";
  }//count end//

     ?>
<!---------Bloge POst show php Scripte start---->
</div>

<!----post show html element end------->

  
<?php } else{
  echo "<h1>This is out of Dangers Area Please Login amdin Panel</h1>";
}
  	
?>


<!-----Post Data Insert php Coding start----->
<?php
if(isset($_POST['post'])){

$title=$_POST['title'];

$description=$_POST['description'];


$category=$_POST['category'];

//Feture image upload code start//

    $image='image/'.rand(00000,9999999).$_FILES['file']['name'];

      $file_ex=pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);

      if($file_ex == 'jpg' || $file_ex == 'JPG'  || $file_ex == 'png'){

        if(file_exists($image)){

          echo "your file already existes";
        }

        else{

            move_uploaded_file($_FILES['file']['tmp_name'], $image); 
            //echo "File upload successfully";
        }
      }
      else{
        echo "invalide file";
      }

//Feture image upload code end//

//post data insert Query start//

      if($title != '' && $description != '' && $category != '' && $image != ''){

    $post_sql="INSERT INTO bloge_post (title,description,category,image) VALUES ('$title','$description','$category','$image') ";

    $post_query=mysqli_query($conn,$post_sql);

    if($post_query){

    $insert_success="insert successfully";

    }else{
      echo "sumthing wrong";
    }

}//post data insert Qurey end//
else{
  $check="please File Up The Filed";
}

}

 ?>
<!------Post Data insert php coding end------>

<!------Post Data Edit Query start------>




<!------Post Data Edit Query start------>



<!----data base deslet query start--->
<?php

if(isset($_GET['postDelete'])){

$postDelete=$_GET['postDelete'];

$delete_sql="DELETE FROM bloge_post WHERE id='$postDelete' ";

$delete_query=mysqli_query($conn,$delete_sql);

}

 ?>
<!----data base delete Queryt end---->
