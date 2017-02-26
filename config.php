<?php
$mysqli = new mysqli('localhost','root', '', 'employees');
if($mysqli->connect_errno){
	echo "Connect error ".$mysqli->connect_error;
}
?>