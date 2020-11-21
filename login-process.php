<?php
//Error variable
$error = array();
$email = validateInputEmail($_POST['email']);
if(empty($email)){
	$error[] = "You forgot to enter your email";
}

$password = validateInputText($_POST['password']);
if(empty($password)){
	$error[] = "You forgot to enter your password";
}

if(empty($error)){
   $query = "SELECT userId, firstName, lastName, email, password, profileImage FROM  user WHERE email=?";
	 $q = mysqli_stmt_init($connection);
	 mysqli_stmt_prepare($q, $query);
	 mysqli_stmt_bind_param($q,'s',$email);
	 mysqli_stmt_execute($q);
	 $result = mysqli_stmt_get_result($q);
	$row = mysqli_fetch_assoc($result);
	if(!empty($row)){
		if(password_verify($password,$row['password'])){
			header("Location: index.php");
			exit();
		}else{
			print "Password  is not correct";
		}
	}else{
		$error[] = 'You are not member, please, register';
	}
	echo "
ROW: \n
	<pre>";
	print_r($row);
	echo "</pre>";
}else{
  echo "Please fill out email and password";
}
