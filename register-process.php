<?php
require "helper.php";
//Error variable
$error = array();
$firstName = validateInputText($_POST['firstName']);
if(empty($firstName)){
	$error[] = "You forgot to enter your first name";
}

$lastName = validateInputText($_POST['lastName']);
if(empty($lastName)){
	$error[] = "You forgot to enter your last name";
}

$email = validateInputEmail($_POST['email']);
if(empty($email)){
	$error[] = "You forgot to enter your email";
}
$files = $_FILES['profileUpload'];
echo "<pre>";
print_r($_FILES);
echo "</pre>";

$profileImage = upload_profile('./assets/profile/', $files);

$password = validateInputText($_POST['password']);
if(empty($password)){
	$error[] = "You forgot to enter your password";
}

$confirmPwd = validateInputText($_POST['confirm_pwd']);
if(empty($confirmPwd)){
	$error[] = "You forgot to confirm your password";
}

if(empty($error)){
	$hashed_password = password_hash($password, PASSWORD_DEFAULT);
	require "mysqli-connect.php";
	$query = "INSERT INTO user(userId, firstName, lastName, email, password, profileImage, registerDate)";
	$query = $query . " VALUES (null,?,?,?,?,?,NOW())";
	$q = mysqli_stmt_init($connection);
	mysqli_stmt_prepare($q, $query);
	mysqli_stmt_bind_param($q, 'sssss',$firstName, $lastName, $email, $hashed_password, $profileImage);
	mysqli_stmt_execute($q);
	if(mysqli_stmt_affected_rows($q) == 1){
		echo "record inserted";
	}else{
		echo "Error while inserting" . mysqli_error($connection);
	}
}else{
echo "Not validate";
}
