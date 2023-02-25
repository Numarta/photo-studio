<?php
session_start();
	$host = 'localhost'; //имя хоста, на локальном компьютере это localhost
		$user = 'numart_zz'; //имя пользователя, по умолчанию это root
		$password = 'qweasdzxc'; //пароль, по умолчанию пустой
		$db_name = 'numart_moderhhos'; //имя базы данных

	 // определяем начальные данные
   $link = mysqli_connect($host, $user, $password, $db_name) 
    or die("Ошибка " . mysqli_error($link)); 
    $query= "SET NAMES 'utf8'";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
$query ="SELECT kolZ FROM users where login='".$_SESSION['name']."'";
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
if($result){
      $row = mysqli_fetch_row($result);
 $newpath = $_SESSION['name'].'imgMug'.$row[0];
$dir = $newpath; // Например /var/www/localhost/public
if (!file_exists($dir)) { 
    mkdir($dir, 0777, true);
}
  $uploadfile = $dir.'/'.$_FILES['somename']['name'];
  move_uploaded_file($_FILES['somename']['tmp_name'], $uploadfile);
  header("Location:../mugFoto.html");
  exit;
}
else
{
    header("Location:../mugFoto.html");
    exit;
}
?>