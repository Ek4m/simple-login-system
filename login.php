<?php
session_start();
require "mysqli-connect.php";
require "helper.php";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	require('login-process.php');
}
include 'header.php';
$user = array();
if(isset($_SESSION['userId'])){
	$user = getUserInfo($connection,$_SESSION['userId']);
}

 ?>
<section id="login-form">
	<div class="row m-0">
		<div class="col-l-4 offset-lg-2">
			<div class="text-center pb-5">
				<h1 class="login-title text-dark">Login</h1>
				<p class="p-1 m-0 font-ubuntu text-black-50">Login and enjoy additional features</p>
				<span class="font-ubuntu text-back-50">Create new  <a href="register.php">account</a></span>
			</div>
			<div class="upload-profile-image d-flex justify-content-center pb-5">
				<div class="text-center">
					<img src=<?php if(!empty($user) && !empty($user['profileImage'])){
						echo $user['profileImage'];
					}else{
						echo "assets/profile/beard.png";}
						?> style="width:200px;height:200px;"  class="img rounded-circle" alt="profile" id="profile-image">
				</div>
			</div>
			<div class="d-flex justify-content-center">
<form action="login.php" method="post" enctype="multipart/form-data" id="log-form">
<div class="form-row my-4">
<div class="col">
	<input type="email" required  name="email"  id="email" class="form-control" placeholder="Email">
</div>
</div>

<div class="form-row my-4">
<div class="col">
	<input type="password" required name="password"  id="password" class="form-control" placeholder="Password">
	<small id="confirm_error" class="text-danger"></small>
</div>
</div>
<div class="submit-btn text-center my-5">
	<button type="submit" class="btn btn-warning rounded-bill text-dark px-5">Login</button>
</div>
				</form>
			</div>
		</div>
	</div>
</section>
<?php
include 'footer.php';
?>
