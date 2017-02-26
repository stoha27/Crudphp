<?php
include "config.php";
$id = $_GET['id'];
if(isset($id)){
	$query = $mysqli->query("delete from employees where id='$id'");
	if($query){
		echo "<script>alert('Are you shure?');location.href='/dashboard/crudphp/index';</script>";
	} else{
		header('location: /dashboard/crudphp/index');
	}
}
?>