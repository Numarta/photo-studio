<?php
    session_start();
    $rest = explode("/", $_GET['name']);
    $n1 = "";
    $n1 .= $rest[0];
    //echo $n1;
    delDir($n1);
    function delDir($dir) {
        if(is_dir($dir)){
    $files = array_diff(scandir($dir), ['.','..']);
    foreach ($files as $file) {
        (is_dir($dir.'/'.$file)) ? delDir($dir.'/'.$file) : unlink($dir.'/'.$file);
    }
        }
    return rmdir($dir);
}

    $id=$_GET['id'];
    //echo '<br/>';
    //echo $id;
    $host = 'localhost'; //имя хоста, на локальном компьютере это localhost
		$user = 'numart_zz'; //имя пользователя, по умолчанию это root
		$password = 'qweasdzxc'; //пароль, по умолчанию пустой
		$db_name = 'numart_moderhhos'; //имя базы данных

	 // определяем начальные данные
   $link = mysqli_connect($host, $user, $password, $db_name) 
    or die("Ошибка " . mysqli_error($link)); 
    $query= "SET NAMES 'utf8'";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
$query = "DELETE FROM zakaziFoto WHERE id='$id' ";
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
if($result)
{
    
    
}
   //unlink($rest);
   header("Location:../meneger.html");
    ?>