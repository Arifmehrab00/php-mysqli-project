<?php SESSION_START(); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
	<link rel="shortcut icon" type="image/x-icon" href="img/m.png.jpg">
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <link rel="stylesheet" href="css/bootstrap-4-navbar.css">
   <link href="css/style.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="font/css/fontawesome-all.min.css">
    <title>Arif Mehrab</title>
	</head>
<body>
<!---------------navbar menu------------>
<nav class="navbar navbar-light  navbar-expand-lg fixed-top">
<div class="container">
<a href="index.php">
  <img src="img/th (1).jpg" class="rounded-circle"  height="50" width="50">
<h2 class="d-inline align-middle nav-link">ArifMehrab</h2>
</a>
<button class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#navbarnav">
<span class="navbar-toggler-icon toggleicon"></span>
</button>


<div class="collapse navbar-collapse" id="navbarnav">
<ul class="navbar-nav ml-auto">
<li class="nav-item">
<a class="nav-link navnav active" href="index.php">Home</a>
</li>
<li class="nav-item">
<a class="nav-link navnav" href="#">About</a>
</li>
<li class="nav-item">
<a class="nav-link navnav" href="bloge.php">Bloge</a>
</li>
<li class="nav-item">
<a class="nav-link navnav" href="photogallery.php">Photo Gallery</a>
</li>
<!-----Condition script start----->
<?php if(isset($_SESSION['name'])){ ?>


<li class="nav-item">

<a class="nav-link navnav" href="profile.php"><img style="border-radius: 10px;" width="40" height="35" src="<?php echo $_SESSION['profile']; ?>"><?php echo $_SESSION['name']; ?></a>

</li>

<li class="nav-item">

<a class="nav-link navnav btn btn-danger" href="logout.php">LogOut</a>

</li>


<?php } 
else{ ?>

<li class="nav-item">
<a class="nav-link singIn btn btn-success" href="signIn.php">SingIn</a>
</li>
<li class="nav-item">
<a class="nav-link singUp btn btn-info" href="signUp.php">SingUp</a>
</li>


<?php
}
?>






<!------condition script end------->

</ul>

</div>



</div>
</nav>
<!---------------navbar menu------------>