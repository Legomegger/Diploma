<?php

require_once('connectvars.php');

//function to add application form to database

function addApplicationToDB(){
	$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
	if (isset($_POST['name'])&& isset($_POST['phonenumber'])){
		$query = "INSERT INTO application_to_call (name, phone_number)
		VALUES ('$_POST[name]','$_POST[phonenumber]')";
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
		echo "<td>" . $row['phone_number'] . "</td>";
		echo "</tr>";
		
	}
}




?>