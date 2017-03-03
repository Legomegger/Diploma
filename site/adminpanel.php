<?php

require_once('connectvars.php');

function showApplicationsToAdmin(){
	$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
	$query = "SELECT * FROM application_to_call";
	$data = mysqli_query($dbc, $query);
	while ($row = mysqli_fetch_array($data) {
		echo "$row['id'] .' '.$row['name'].' '.$row['phonenumber']";
	}
 }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Администраторская панель</title>
</head>
<body>
	<table>
		<tr>
			<td>
				<?php showApplicationsToAdmin(); ?>
			</td>
		</tr>
	</table>
</body>
</html>