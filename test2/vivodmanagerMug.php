<?php
    
    $host = 'localhost'; //имя хоста, на локальном компьютере это localhost
		$user = 'numart_zz'; //имя пользователя, по умолчанию это root
		$password = 'qweasdzxc'; //пароль, по умолчанию пустой
		$db_name = 'numart_moderhhos'; //имя базы данных

	 // определяем начальные данные
   $link = mysqli_connect($host, $user, $password, $db_name) 
    or die("Ошибка " . mysqli_error($link)); 
    $query= "SET NAMES 'utf8'";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
$query ="SELECT users.name, users.phone, zakaziMug.params, zakaziMug.comment, zakaziMug.imgs, zakaziMug.id FROM users, zakaziMug WHERE users.login=zakaziMug.name";
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
if($result)
{
    $rows = mysqli_num_rows($result); // количество полученных строк
    for ($i = 1 ; $i < $rows+1 ; ++$i)
    {
        $row = mysqli_fetch_row($result);
        echo '<th scope="row">'.$i.'</th>';
              for($j = 0 ; $j < 4 ; ++$j){ echo '<td>'.$row[$j].'</td>';}
              $imgsrc=explode(" ", $row[4]);
              echo '<td>';
              echo "<div class=\"col-lg-12\">";
                       echo     "<div class=\"image-upload-box\">";
                               echo "<div class=\"upload\">";
                               echo "<div class=\"field\">";
              for($t=0; $t<count($imgsrc)-1; ++$t)
              {
                  echo "<span class=\"pip\"> <img class=\"imageThumb\" src='test2/".$imgsrc[$t]."' alt='".$imgsrc[$t]."' /> </span><br/>";
                  
              }
              echo "</div></div></div></div>";
                echo '<td>'.$row[5].'</td>';
                echo '</td>';
                $n1="<button class=\"remove\" onclick=";
                 $n1 .='document.location.href="test2/delZapisMug.php?name='.$imgsrc[0].'&id='.$row[5].'";';
                 $n1 .= ">Удалить</span>";
                echo '<td>'.$n1.'</td>';
        echo "</tr>";
    }
    // очищаем результат
    mysqli_free_result($result);
}
mysqli_close($link);
    
?>