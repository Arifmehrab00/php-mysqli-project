<?php require_once('include/header.php'); ?>
<?php require_once('dbconnect.php'); ?>
<br>
<br>
<br>
<br>
<style type="text/css">

	img.img_back {
    position: relative;
    width: 368px;
    height: 290px;
    padding-bottom: 12px;
}
img.img_back:hover{

	opacity: 0.8;
	transition: 0.5s;
}
span.img_title:hover {
    opacity: 1;
}

span.img_title {
    position: absolute;
    top: 54px;
    left: 65px;
    font-size: 25px;
    font-weight: bold;
    opacity: 0;
    background: radial-gradient(#3c1cbd, #e02323);
    color: white;
    padding: 50px 25px;
    border-radius: 17px;
    transition: 0.7s;
}
</style>
<!--------Html Coding start----->
<div class="container">
<div class="row">
	<!---admin photo show php code start--->
	<?php
$photo_sql="SELECT * FROM photogallery ORDER BY id DESC";

$photo_query=mysqli_query($conn,$photo_sql);

$photo_count=mysqli_num_rows($photo_query);

if($photo_count>0){

$a=0;

while($photo_show=mysqli_fetch_array($photo_query)){
?>
<!---colum start--->
	<div class="col-md-4">
		<img class="img_back" src="admin/<?php echo $photo_show['image']; ?>">
		<span class="img_title"><?php echo $photo_show['title'] ?></span>
	</div><!--col4 end-->
<?php 
}//while loop end//
}//photo_count end//
?>
</div><!--row end-->
</div><!--container edn-->



<!--------Html Coding End------->

<?php require_once('include/futter.php');