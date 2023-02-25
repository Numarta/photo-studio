<?php
session_start();

	$host = 'localhost'; //имя хоста, на локальном компьютере это localhost
		$user = 'numart_zz'; //имя пользователя, по умолчанию это root
		$password = 'qweasdzxc'; //пароль, по умолчанию пустой
		$db_name = 'numart_moderhhos'; //имя базы данных

	 // определяем начальные данные
   $link = mysqli_connect($host, $user, $password, $db_name) //результат подключения сохраняется в переменную link
    or die("Ошибка " . mysqli_error($link)); 
    $query= "SET NAMES 'utf8'";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); //массив если запрос, в остальных случаях булеон
$query ="SELECT login,pass,role FROM users";
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
$isEst=true;
if($result)
{
    $rows = mysqli_num_rows($result); // количество полученных строк
    while ($row = mysqli_fetch_row($result) and $isEst) { //считывание каждой строки таблицы
       
        if($_POST['submit']){
       
	if( $row[0] == $_POST['user'])
	{
	    $isEst=false;
		
			if($row[1] == $_POST['pass'])
			{
			    $_SESSION['role'] = $row[2];
			    $_SESSION['name']=$row[0];
			}
			else
			{
			     echo "<script>alert(\"Не верный пароль\");</script>";
			}
	   }
	           }
    }
    if($isEst)
    {
        echo "<script>alert(\"Пользователь с таким именем не найден\");</script>";
    }
   
    // очищаем результат
    mysqli_free_result($result);
}
 mysqli_close($link);
	
	echo "<script>document.location.href = \"../index.html\";</script>";
	exit;

?>