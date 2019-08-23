<?php require_once('include/header.php'); ?>
<?php require_once('dbconnect.php'); ?>
<br>
<br>
<br>
<br>
<style type="text/css">
	
.content {
    width: 350px;
    background: #444bab70;
    padding: 11px;
    float: left;
    margin: 10px;
    height: 180px;
    margin-top: 100px;
    animation: arif;
    animation-duration: 2s;
    transition: all 0.5s;
   
}

.content:hover{
	transform: translateY(-50px);
}


.content h1 {
    text-align: center;
    font-size: 22px;
}

 .content p {
    text-align: center;
    font-weight: bold;
}

@keyframes arif{

	form{
		 transform: scale(1.1);
	}
	to{
		 transform: scale(0);

	}
}

.image_content{
	width: 362px;
	
	padding: 14px;
}
.image_size{
    width: 350px;
    background-repeat: no-repeat;
    float: left;
    display: inline-block;
    transition: all 2s;
    margin-bottom: 15px;
    height: 250px;
}
.image_content h1 {
    /* margin-top: 38px; */
    display: block;
    margin: 13px -7px;
    font-size: 25px;
    font-family: sans-serif;
}

.image_content:hover img{

transform:scale(0.9);

}
p.description {
    height: 60px;
    overflow: hidden;
}
</style>

<!------------Bloge post Design Section Start------------>
<div class="container">
	<div class="row">
<!-----php Bloge Show Codign start--->
		<?php

			$bloge_sql="SELECT * FROM bloge_post ORDER BY id DESC";

			$bloge_query=mysqli_query($conn,$bloge_sql);

			$bloge_count=mysqli_num_rows($bloge_query);

			if($bloge_count>0){

				
 while($bloge_show=mysqli_fetch_array($bloge_query)){

 	?>

	<!--colum 4 code start--->
		<div class="col-md-4">
            <div class="image_content">

					<img class="image_size" src="admin/<?php echo $bloge_show['image']; ?>">
					<h1><?php echo $bloge_show['title']; ?></h1>
					<p class="description"><?php echo $bloge_show['description']; ?></p>
                      
                      <strong class="pb-4"><?php echo $bloge_show['category'];?></strong>
				  
					<a href="blogeView.php?id=<?php echo $bloge_show['id'] ?>" class="btn btn-success btn-block">More Detail</a>

			</div>
		</div>
		<!--colum 4 code end----->
          
	<?php 
}//while end//
}//count end//

 ?>

	</div>
</div>


<!------------Bloge post Design Section End------------>


<?php include_once('include/futter.php'); ?>


