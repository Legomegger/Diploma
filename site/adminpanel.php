<?php
//подключение внешних файлов
require_once('connectvars.php');
require_once('logout.php');
require_once('functions.php');
require_once('upload.php');
//подключение внешних файлов /
session_start(); //начало сессии
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
		
		<div class="row">
			<div class="col-md-12 center-block">
				<span><h3 class="text-center">Добавить проект</h3>
					<h5 class="text-center">Добавить проект</h5>
				</span>
				<div class="col-md-12">
					<form method="POST" enctype="multipart/form-data">
						<div class="col-md-6"><input type="text" name="textheader" placeholder="Заголовок"><br>
							<hr class="section-heading-spacer">
							<textarea cols="70" rows="9" name="textarea" placeholder="Описание объекта"></textarea></div>
							<div class="col-md-6"><input type="file" name="fileToUpload"><br>
								
								<select name ="select">
									<option value="1">Завершенные объекты</option>
									<option value="2">Объекты в процессе строительства</option>
									<option value="3">Объекты в процессе проектирования</option>
								</select>

								<input type="submit" value="Загрузить изображение" name="submit"><br>
								
							</div>

						</form>	
						
					</div>	
					<div class="col-md-12 center-block">
						<span><h3 class="text-center">Добавить файлы проекта</h3>
						</span>
						<div class="col-md-12">
							<form method="POST">
								<div class="col-md-6"><input type="file" name="fileToUpload"></div>
								<div class="col-md-6"><input type="file" name="fileToUpload"><br>
									<input type="submit" value="Отправить файлы" name="submita">
								</div>

							</form>

						</div>
					</div>
				</div>
			</div>

		</div>
	</body>
	</html>