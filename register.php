<?php
include 'header.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	require('register-process.php');
}
?>
<section id="register">
	<div class="row m-0">
		<div class="col-l-4 offset-lg-2">
			<div class="text-center pb-5">
				<h1 class="login-title text-dark">Registration</h1>
				<p class="p-1 m-0 font-ubuntu text-black-50">Register and enjoy additional features</p>
				<span class="font-ubuntu text-back-50">I already have <a href="login.php">Login</a></span>
			</div>
			<div class="upload-profile-image d-flex justify-content-center pb-5">
				<div class="text-center">
					<div class="d-flex justify-content-center">
						<img class="camera-icon"
						src="assets/camera.png" alt="camera">
					</div>
					<img src="assets/profile/beard.png" style="width:200px;height:200px;"  class="img rounded-circle" alt="profile" id="profile-image">
				<small class="form-text text-black text-black-s0">Choose image</small>
				<input type="file" form="reg-form" class="form-control-file" name="profileUpload" id="upload-profile">
				</div>
			</div>
			<div class="d-flex justify-content-center">
<form action="register.php" method="post" enctype="multipart/form-data" id="reg-form">
	<div class="form-row">
	<div class="col">
		<input type="text" value="<?php echo isset($_POST['firstName']) ?  $_POST['firstName'] :  ''; ?>" name="firstName" id="firstName" class="form-control" placeholder="Firstname">
	</div>
	<div class="col">
		<input type="text" name="lastName" value="<?php echo isset($_POST['lastName']) ?  $_POST['lastName'] :  ''; ?>" id="lastName" class="form-control" placeholder="Lastname">
	</div>
</div>
<div class="form-row my-4">
<div class="col">
	<input type="email" required  name="email" value="<?php echo isset($_POST['email']) ?  $_POST['email'] :  ''; ?>" id="email" class="form-control" placeholder="Email">
</div>
</div>
<div class="form-row my-4">
<div class="col">
	<input type="password" required name="password"  id="password" class="form-control" placeholder="Password">
	<small id="confirm_error" class="text-danger"></small>
</div>
</div>
<div class="form-row my-4">
<div class="col">
	<input type="password" required name="confirm_pwd" id="confirm_pwd" class="form-control" placeholder="Confirm Password">
</div>
</div>
<div class="form-check form-check-inline">
<input type="checkbox" name="aggrement" required class="form-check-input" >
<label for="aggrement" class="form-check-label font-ubuntu text-black-50"> I agree <a href="#s"> terms, conditions and policy</a>  (*)</label>
</div>
<div class="submit-btn text-center my-5">
	<button type="submit" class="btn btn-warning rounded-bill text-dark px-5">Continue</button>
</div>
				</form>
			</div>
		</div>
	</div>
</section>
<?php
include 'footer.php';
?>
