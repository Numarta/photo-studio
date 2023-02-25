<?php
session_start(); // ДОБАВЛЯЕТ ПАРАМЕТРЫ ЗАКАЗА В ТАБЛИЦУ ДЛЯ ФОТО
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
    
        $row = mysqli_fetch_row($result); // читает строку
    
     $newpath = $_SESSION['name'].'img'.$row[0].'/';
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
   // echo $wimage; // выводим полученный результат
    }
    
    $isDO =true;
if($_POST['image-size'])
{
    $course = "";
    switch($_POST['image-size'])
    {
        case "12":
            $course .= "10х15 см (А6) \n";
            break;
        case "20":
             $course .= "15х21 см (А5) \n";
            break;
         case "30":
             $course .= "21х30 см (А4) \n";
            break;
         case "40":
             $course .= "30х40 см (А3) \n";
            break;
            
    }
     $course .=  $_POST['paper-type']." \n";
      switch($_POST['for-print-type'])
    {
        case "0":
            $course .= "лаболаторный \n";
            break;
        case "4":
             $course .= "струйный \n";
            break;
    }
  
    $course .=  $_POST['print-method']." \n";
   
   // echo $course;
   
}
else
{
    $isDO=false;
    echo "<script>alert('Выберите все параметры');</script>";
    echo "<script>document.location.href = \"../print.html\";</script>";
}
 if($isDO){
   
    
    	

	 // определяем начальные данные
  
    
    $comandSQL ="INSERT INTO `zakaziFoto`(`comment`, `imgs`, `name`, `params`) VALUES ('".$_POST['comment']."','".$wimage."', '".$_SESSION['name']."','".$course."'); ";
   
    //echo $comandSQL;
$query =$comandSQL;
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    if($result){
      $query ="SELECT kolZ FROM users where login='".$_SESSION['name']."'"; 
      $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    
        $row = mysqli_fetch_row($result);
          // echo "<script>alert(".$row[0].");</script>";
        $row[0]++;
      $query ="UPDATE `users` SET `kolZ`=".$row[0]." where login='".$_SESSION['name']."'"; 
      $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
      if($result){
        echo "<script>document.location.href = \"../print.html\";</script>";
        }
    }
}
?>