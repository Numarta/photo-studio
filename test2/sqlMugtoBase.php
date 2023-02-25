<?php
session_start();
$host = 'localhost'; //имя хоста, на локальном компьютере это localhost
		$user = 'numart_zz'; //имя пользователя, по умолчанию это root
		$password = 'qweasdzxc'; //пароль, по умолчанию пустой
		$db_name = 'numart_moderhhos'; //имя базы данных
		 $link = mysqli_connect($host, $user, $password, $db_name) 
    or die("Ошибка " . mysqli_error($link)); 
    $query= "SET NAMES 'utf8'";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
     $query ="SELECT kolZ FROM users where login='".$_SESSION['name']."'"; 
      $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    
        $row = mysqli_fetch_row($result);
    
     $newpath = $_SESSION['name'].'imgMug'.$row[0].'/';
    $wimage = "";
    $fimg = "";
    $chetchik=0;
   
    $path = $newpath; // задаем путь до сканируемой папки с изображениями
    
        
    if(is_dir($path)){
      
    $images = scandir($path); // сканируем папку
    if ($images !== false) { // если нет ошибок при сканировании
    $images = preg_grep("/\.(?:png|gif|jpe?g)$/i", $images); // через регулярку создаем массив только изображений
    if (is_array($images)) { // если изображения найдены
    
    foreach($images as $image) { // делаем проход по массиву
    global $chetchik;
   
   
    $fimg .= $path.htmlspecialchars(urlencode($image))." \n";
     //$fimg .=$n1;
    //  $fimg .= ">Удалить</span></span>";
    //  ++$chetchik;
  }
    $wimage .= $fimg;
} else { // иначе, если нет изображений
    $wimage .= "<div style='text-align:center'>Не обнаружено изображений в директории!</div>\n";
    }
  } else { // иначе, если директория пуста или произошла ошибка
    $wimage .= "<div style='text-align:center'>Директория пуста или произошла ошибка при сканировании.</div>";
}

    }
    
    
if($_POST['image-size'])
{
    $course = "";
    switch($_POST['image-size'])
    {
        case "450":
            $course .= " Цветная внутри \n";
            break;
        case "600":
             $course .= "Светонакапливающая \n";
            break;
         case "340":
             $course .= " Стандартная (белая) \n";
            break;
         case "650":
             $course .= "  Хамелион (термо) \n";
            break;
            
    }
   
   
   // echo $course;
   
}
 
   
    
    	

	 // определяем начальные данные
  
    
    $comandSQL ="INSERT INTO `zakaziMug`(`comment`, `imgs`, `name`, `params`) VALUES ('".$_POST['comment']."','".$wimage."', '".$_SESSION['name']."','".$course."'); ";
   
   
$query =$comandSQL;
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    if($result){
      $query ="SELECT kolZ FROM users where login='".$_SESSION['name']."'"; 
      $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    
        $row = mysqli_fetch_row($result);
        
        $row[0]++;
      $query ="UPDATE `users` SET `kolZ`=".$row[0]." where login='".$_SESSION['name']."'"; 
      $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
      if($result){
        echo "<script>document.location.href = \"../mugFoto.html\";</script>";
        }
    }

?>