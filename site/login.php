<?php 
	
	$login = "admin";
	$password="admin";

	if (isset($_POST['username']) && (isset($_POST['userpassword'])) && 
		$_POST['username'] == $login && $_POST['userpassword'] == $password ) {
		header('Location: /webalizer/site/adminpanel.php');
	session_start();
	$_SESSION['username']="loggedin";
	$_SESSION['userpassword']="passedin";
	}

?>

<!DOCTYPE html>
<html>
<head>
 
 <link rel="stylesheet" type="text/css" href="adminstyle.css">
  <link href="https://fonts.googleapis.com/css?family=Bitter" rel="stylesheet">
	<title>Страница входа</title>
</head>
<body>
	<h1>Login to Admin panel</h1>
	<form action="login.php" method="POST">
		<input type="text" name="username">
		<input type="password" name="userpassword">
		<input type="submit">
	</form>
</body>
</html>