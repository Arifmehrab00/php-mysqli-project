
<?php require_once('includ/header.php')?>
<?php require_once('dbconnect.php'); ?>

<!----Post show Scripte start value code--->
<?php
$editId=$_GET['postEdite'];

$edit_sql="SELECT * FROM bloge_post WHERE id=$editId ";

$edit_query=mysqli_query($conn,$edit_sql);

$show_bloge=mysqli_fetch_array($edit_query);

 ?>
     
<!----Post Updat Scripte end value code--->


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
          <!----add post html element start---->
      <div class="col-md-7 offset-4">
            <br><br>
            <h3 style="text-align: center; margin: 15px 20px;" class="mt-5">Update Bloge POST</h3>
               
         <form class="mt-5" action="#" method="post" enctype="multipart/form-data">

           <div class="form-group">
             <label>Post Title:</label>
             <input type="text" name="title" class="form-control" value="<?php echo $show_bloge['title']; ?>">
           </div>

            <div class="form-group">
             <label>Post Description:</label>
             <textarea rows="7" class="form-control" name="description"><?php echo $show_bloge['description']; ?></textarea>
           </div>

            <div class="form-group">
             <label>Category:<?php echo $show_bloge['category']; ?></label>
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
             <img width="80" src="<?php echo $show_bloge['image']; ?>">
          </div>

          <input type="submit" name="post" value="Add Post" class="btn btn-success">
      </form>
        
      </div>
      <!------add post html element end---->
    </div>
    </div>


  
<?php } else{
  echo "<h1>This is out of Dangers Area Please Login amdin Panel</h1>";
}
    
?>


<!---- Update php mysql Script start ---->

 <?php
if(isset($_POST['post'])){

$id=$_GET['postEdite'];

$title=$_POST['title'];

$description=$_POST['description'];


$category=$_POST['category'];


//Feture image update code start//


if($_FILES['file']['name']){

  unlink($show_bloge['image']);

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
}//end first if//

//Feture image update code end//

//*update query*//
$updat_post="UPDATE bloge_post SET `title`='$title',`description`='$description',`category`='$category',`image`='$image' WHERE id=$id ";

if(mysqli_query($conn,$updat_post)){

  header("Location:addpost.php");

}else{

  echo "Your Information Not Update";

}
//*end update query*//
}//isset end//

  ?>  

<!---- Update php mysql Script end ---->
