<?php
require_once('connectvars.php');
require_once('logout.php');
require_once('functions.php');
session_start();
if (!isset($_SESSION['username']) && (empty($_SESSION['username']))) {
	header("Location: /webalizer/site/login.php"); /* Redirect browser */
}
elseif (!empty($_SESSION)) {

}
if (isset($_POST['logout'])) {
	logout();
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Администраторская панель</title>
	<!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="css/landing-page.css" rel="stylesheet">

</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-11">
				<h1 class="text-center">Welcome to Admin Panel</h1>
			</div>
			<div class="col-md-1">
				<form action="adminpanel.php" method="POST">
					<span><p class="text-center">Wanna exit?</p></span>
					<button type="submit" name="logout">Logout</button>
				</form>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<span><h3 class="text-center">Заявки на обратный звонок</h3></span>
					<table class="table table-bordered">
						<?php showApplicationsToAdmin(); ?>

					</table>

				</div>
			</div>
		</div>
	</div>


</body>
</html>