<?php
session_start();
include "header.php";
include "helper.php";
$user = array();
if(isset($_SESSION['userId'])){
  require "mysqli-connect.php";
  $user = getUserInfo($connection, $_SESSION['userId']);
}
?>
<section id="main-site">
<?php
if(!empty($user)){
  ?>
  <a href="logout.php">Logout</a>
  <?php
}else{
  ?>
  <a href="login.php">Login</a>
  <a href="register.php">Register</a>
  <?php
}
?>
  <div class="container py-5">
<div class="row">
<div class="col-4 offset-4 shadow py-4">
<div class="upload-profile-image d-flex justify-content-center pb-5">
<div class="text-center">
  <img class="img rounded-circle" style="width:200px;height:200px;"  src=<?php echo isset($user['profileImage']) ? $user['profileImage']: "./assets/profile/beard.png"; ?>    alt="#"/>
  <h4 class="py-3">
  <?php
  if(isset($user['firstName'])){
    echo $user['firstName']. "   ".$user['lastName'];
  }
  ?>
  </h4></div>
  </div>
</div>
</div>
  </div>
</section>

<?php
include "footer.php";
?>
