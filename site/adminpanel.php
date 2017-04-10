<?php
//подключение внешних файлов
require_once('connectvars.php');
require_once('logout.php');
require_once('functions.php');
header("Content-Type: text/html; charset=UTF-8");

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
if (isset($_POST['main'])) {
	header("Location: /webalizer/site/index.php");
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
				<form method="POST">
					<button type="submit" name="main">Go to Index</button>
				</form>
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
							<td>Вопрос</td>
							<td>Телефон</td>
							<td>Дата подачи заявки</td>
						</tr>
						<?php showApplicationsToAdmin(); ?>

					</table>

				</div>
				<form method="POST">
					<input type="submit" name="delete" value="Очистить таблицу">
					<?php 
					if (isset($_POST['delete'])) {
						deleteApplications(); 
					}
					?>
				</form>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-12 center-block">
				<span><h3 class="text-center">Добавить проект</h3>
					<h5 class="text-center">Добавить проект</h5>
				</span>
				<div class="col-md-12">
					<form method="POST" enctype="multipart/form-data" action="upload.php">

						<?php require_once('upload.php'); ?>
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
						<span><h3 class="text-center">Добавить файлы в Завершенные проекты</h3>
						</span>
						<div class="col-md-12">
							<form method="POST" enctype="multipart/form-data" action ="uploaddone.php">
								<?php require_once('uploaddone.php'); ?>
								<div class="col-md-6"><input type="file" name="fileToUploadgp"><br>
								<textarea cols="70" rows="9" name="headera" placeholder="Название объекта"></textarea></div>
								<div class="col-md-6"><input type="file" name="fileToUploadpro"><br>
									<textarea cols="70" rows="9" name="textareaa" placeholder="Описание объекта"></textarea>
									<?php
									$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
									$query = "SELECT id, header FROM done_add";
									$query1="SELECT header FROM done_add";
									$data = mysqli_query($dbc, $query);
									$data1=mysqli_query($dbc, $query1);
									$array=[];
									
									while ($row = mysqli_fetch_array($data)) {
										$option = [];
										$option['id'] = $row['id'];
										$option['header'] = $row['header'];
										$array[] = $option;

									}
									?>
									<select name="selectlink">
										<?php foreach ($array as $option) {?>    
										<option value = "<?php echo $option['id'];?>"
											><?php echo $option['header'];?></option>
											<?php } ?>
										</select>
										<input type="submit" value="Отправить файлы" name="submita">
									</div>

								</form>

							</div>
						</div>

						<div class="col-md-12 center-block">
							<span><h3 class="text-center">Добавить файлы в Проекты в процессе строительства</h3>
							</span>
							<div class="col-md-12">
								<form method="POST" enctype="multipart/form-data" action ="uploaddev.php">
									<?php require_once('uploaddev.php'); ?>
									<div class="col-md-6"><input type="file" name="fileToUploadgpdev"><br>
									<textarea cols="70" rows="9" name="headerb" placeholder="Название объекта"></textarea>
									</div>
									<div class="col-md-6"><input type="file" name="fileToUploadprodev"><br>
										<textarea cols="70" rows="9" name="textareab" placeholder="Описание объекта"></textarea>

										<?php
										$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
										$query = "SELECT id, header FROM development_add";

										$data = mysqli_query($dbc, $query);

										$array=[];

										while ($row = mysqli_fetch_array($data)) {
											$option = [];
											$option['id'] = $row['id'];
											$option['header'] = $row['header'];
											$array[] = $option;

										}
										?>
										<select name="selectlink">
											<?php foreach ($array as $option) {?>    
											<option value = "<?php echo $option['id'];?>"
												><?php echo $option['header'];?></option>
												<?php } ?>
											</select>
											<input type="submit" value="Отправить файлы" name="submitb">
										</div>

									</form>

								</div>
							</div>


							<div class="col-md-12 center-block">
								<span><h3 class="text-center">Добавить файлы в Объекты в процессе проектирования</h3>
								</span>
								<div class="col-md-12">
									<form method="POST" enctype="multipart/form-data" action ="uploadinprocess.php">
										<?php require_once('uploadinprocess.php'); ?>
										<div class="col-md-6"><input type="file" name="fileToUploadgpinpro"><br>
										<textarea cols="70" rows="9" name="headerc" placeholder="Название объекта"></textarea></div>
										<div class="col-md-6"><input type="file" name="fileToUploadproinpro"><br>
											<textarea cols="70" rows="9" name="textareac" placeholder="Описание объекта"></textarea>
											<?php
											$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
											$query = "SELECT id, header FROM inprocess_add";

											$data = mysqli_query($dbc, $query);

											$array=[];

											while ($row = mysqli_fetch_array($data)) {
												$option = [];
												$option['id'] = $row['id'];
												$option['header'] = $row['header'];
												$array[] = $option;

											}
											?>
											<select name="selectlink">
												<?php foreach ($array as $option) {?>    
												<option value = "<?php echo $option['id'];?>"
													><?php echo $option['header'];?></option>
													<?php } ?>
												</select>
												<input type="submit" value="Отправить файлы" name="submitc">
											</div>

										</form>

									</div>
								</div>

							</div>
						</div>

					</div>
				</body>
				</html>