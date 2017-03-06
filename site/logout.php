<?php
	function logout(){
	session_start();
	session_unset();
	session_destroy();
	header("Location: /webalizer/site/index.php");
}
 ?>