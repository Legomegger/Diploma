<?php

require_once('connectvars.php');

//function to add application form to database

function addApplicationToDB(){
	$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
	//escaping strings
	$namevar = mysqli_real_escape_string($dbc,$_POST['name']);
	$themevar = mysqli_real_escape_string($dbc,$_POST['theme']);
	$phonenumbervar = mysqli_real_escape_string($dbc,$_POST['phonenumber']);
	//end of escaping
	if (isset($_POST['name'])&& isset($_POST['phonenumber'])&&isset($_POST['theme'])){
		$query = "INSERT INTO application_to_call (name, quest,phone_number)
		VALUES ('$namevar','$themevar','$phonenumbervar')";
		$data = mysqli_query($dbc, $query);
	}
}
//showing data to adminpanel table
function showApplicationsToAdmin(){
	$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
	$query = "SELECT * FROM application_to_call";
	$data = mysqli_query($dbc, $query);
	while ($row = mysqli_fetch_array($data)) {
		echo "<tr>";
		echo "<td>" . $row['id'] . "</td>";
		echo "<td>" . $row['name'] . "</td>";
		echo "<td>" . $row['quest'] . "</td>";
		echo "<td>" . $row['phone_number'] . "</td>";
		echo "<td>" . $row['date'] . "</td>";
		echo "</tr>";	
	}
}
function deleteApplications(){
	$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
	$query = "DELETE FROM application_to_call";
	$data = mysqli_query($dbc, $query);
	header('Location: /webalizer/site/adminpanel.php');
}





?>