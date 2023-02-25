<?php
session_start(); //загрузка фото на сервер
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

$dir = $_SESSION['name'].'img'.$row[0]; // создание названия папки
if (!file_exists($dir)) { // проверячем не существует ли папка
    mkdir($dir, 0777, true); // создаем папку с правами
}
  $uploadfile = $dir.'/'.$_FILES['somename']['name']; // дописываем к названию папки название файла
  move_uploaded_file($_FILES['somename']['tmp_name'], $uploadfile); // копирует файл на сервер (данные картинки, файл куда запишем)
  header("Location:../print.html");
  exit;
}
else
{
    header("Location:../print.html");
    exit;
}
?>