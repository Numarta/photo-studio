<?php
    session_start();
    $rest = substr($_GET['name'], 6, strlen($_GET['name']));
   // echo $rest;
   unlink($rest);
   header("Location:../mugFoto.html");
    ?>