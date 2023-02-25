<?php
    session_start(); // выводит на панель картинку и кнопку удалить
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
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); //получаем данные из базы по запросу
if($result){
     $row = mysqli_fetch_row($result);
    $newpath = $_SESSION['name'].'img'.$row[0].'/';
    $wimage = "";
    $fimg = "";
    $chetchik=0;
    $path = "test2/".$newpath; // задаем путь до сканируемой папки с изображениями
    function f1() {
        global  $newpath,$wimage, $fimg,$chetchik, $path;
    if(is_dir($path)){
    $images = scandir($path); // сканируем папку
    if ($images !== false) { // если нет ошибок при сканировании
    $images = preg_grep("/\.(?:png|gif|jpe?g)$/i", $images); // через регулярку создаем массив только изображений
    if (is_array($images)) { // если изображения найдены
    
    foreach($images as $image) { // делаем проход по массиву
    global $chetchik;
    //$n1 = 'location.href="test2/delimg.php?name='.$path.htmlspecialchars(urlencode($image))."";
    $n1 ='document.location.href="test2/delimg.php?name='.$path.htmlspecialchars(urlencode($image)).'";'; // с помощью метода get передаем адрес картинки
    $fimg .= "<span class=\"pip\"> <img class=\"imageThumb\" src='".$path.htmlspecialchars(urlencode($image))."' alt='".$image."' /> <br/><span class=\"remove\" onclick=";
     $fimg .=$n1;
      $fimg .= ">Удалить</span></span>";
      ++$chetchik;
  }
    $wimage .= $fimg;
} else { // иначе, если нет изображений
    $wimage .= "<div style='text-align:center'>Не обнаружено изображений в директории!</div>\n";
    }
  } else { // иначе, если директория пуста или произошла ошибка
    $wimage .= "<div style='text-align:center'>Директория пуста или произошла ошибка при сканировании.</div>";
}
    echo $wimage; // выводим полученный результат
    }
    }
}
    ?>