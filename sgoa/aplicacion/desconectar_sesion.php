<?php
session_start();
if($_SESSION['usuario']){
        session_unset();
	session_destroy();
	header("location:../index2.php");
}
else{
	//thi does not matter
	header("location:../index2.php");
}
?>
