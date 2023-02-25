<?php	//Устанавливаем доступы к базе данных:
		$host = 'localhost'; //имя хоста, на локальном компьютере это localhost
		$user = 'numart_zz'; //имя пользователя, по умолчанию это root
		$password = 'qweasdzxc'; //пароль, по умолчанию пустой
		$db_name = 'numart_moderhhos'; //имя базы данных

	 // определяем начальные данные
   $link = mysqli_connect($host, $user, $password, $db_name) 
    or die("Ошибка " . mysqli_error($link)); 
    $query= "SET NAMES 'utf8'";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
$query ="SELECT * FROM t2";
 
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 

		
	
if($result)
{
    $rows = mysqli_num_rows($result); // количество полученных строк
     
   
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);
        echo '<th scope="row">4</th>';
      
            
               echo '<td class="cell"><p class="redcolor"><b>'.$row[0].'</b></p><p>'.$row[1]. 'khjkhkjh</p></td>';
             
           
        echo "</tr>";
    }
   
    // очищаем результат
    mysqli_free_result($result);
}
 
mysqli_close($link);
?>