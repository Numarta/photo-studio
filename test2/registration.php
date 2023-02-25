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
    
     $comandSQL ="SELECT * FROM `users`";
    $result = mysqli_query($link,  $comandSQL) or die("Ошибка " . mysqli_error($link)); 
      $rows = mysqli_num_rows($result); // количество полученных строк
      $isB=true;
    while ($row = mysqli_fetch_row($result) and  $isB) {
        if($row[0] == $_POST['login']){
            $isB=false;
             echo "<script>alert(\"Такой логин уже занят\");</script>";
             	echo "<script>document.location.href = \"../signUp.html\";</script>";
        }
    }
    if($isB){
    $comandSQL ="INSERT INTO `users`(`login`, `pass`, `name`, `phone`, `role`) VALUES ('".$_POST['login']."','".$_POST['pass']."', '".$_POST['name']."','".$_POST['phone']."','user'); ";
   
   

$result = mysqli_query($link, $comandSQL) or die("Ошибка " . mysqli_error($link)); 
if($result)
{
        $_SESSION['role']='user';
        $_SESSION['name']=$_POST['login'];
		header("Location:../index.html");
		exit;

    // очищаем результат
    mysqli_free_result($result);
}
else echo 'Ошибка!';
 mysqli_close($link);

}
?>