<?php
require_once('connectvars.php');
require_once('logout.php');
require_once('functions.php');
require_once('upload.php');
session_start();
if (!isset($_SESSION['username']) && (empty($_SESSION['username']))) {
	header("Location: /webalizer/site/login.php"); /* Redirect browser */
}
elseif (!empty($_SESSION)) {

}
if (isset($_POST['logout'])) {
	logout();
}

function showDate(){
	echo date("d/m/Y");
	date_default_timezone_set("Asia/Almaty");
	echo "<br>".date("h:i:sa");
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
			<div class="col-md-10">
				<h1 class="text-center">Welcome to Admin Panel</h1>
			</div>
			<div class="col-md-1">
				<form action="adminpanel.php" method="POST">
					<span><p class="text-center">Wanna exit?</p></span>
					<button type="submit" name="logout">Logout</button>
				</form>		
			</div>
			<div class="col-md-1">
				<span><p class="text-center">Сегодня</p></span>
				<?php showDate(); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<span><h3 class="text-center">Заявки на обратный звонок</h3></span>
					<table class="table table-bordered">
						<tr style="color: red">
							<td>№</td>
							<td>Имя</td>
							<td>Телефон</td>
							<td>Дата подачи заявки</td>
						</tr>
						<?php showApplicationsToAdmin(); ?>

					</table>

				</div>
			</div>
		</div>
		<!-- форма для добавления в объекты в процессе строительства-->
		<div class="row">
			<div class="col-md-12 center-block">
				
				<span><h3 class="text-center">Объекты в процессе строительства</h3>
					<h5 class="text-center">Добавить проект</h5>
				</span>
				<div class="col-md-12">
				<div class="col-md-9">
					<form method="POST">
						<input type="text" name="textheader" placeholder="Заголовок"><br>
						<hr class="section-heading-spacer">
						<textarea cols="90" rows="9" name="textarea" placeholder="Описание объекта"></textarea>
					</form>		<br>
					</div>
					<div class="col-md-3">
					<form method="POST" enctype="multipart/form-data">
						<input type="file" name="fileToUpload"><br>
						<input type="submit" value="Загрузить изображение" name="submit">
					</form>	
					</div>
				</div>	
			</div>
		</div>
	</div>
</body>
</html>