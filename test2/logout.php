<?php
session_start();

if($_SESSION['role']=='admin' || $_SESSION['role']=='user'){
	unset($_SESSION['role']); //сброс параметров
	unset($_SESSION['name']);
	session_destroy(); // удаляет сессию
	header("Location:../index.html");
}


else
{ 	header("Location:../Entrance.html"); }
?>