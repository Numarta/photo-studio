<?php
    session_start();
    $rest = substr($_GET['name'], 6, strlen($_GET['name'])); // удаляет из названия "test2/"
   // echo $rest;
   unlink($rest);
   header("Location:../print.html");
    ?>