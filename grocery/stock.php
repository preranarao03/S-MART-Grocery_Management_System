<?php
   $db="grocery";
   $connect = mysqli_connect('localhost','root','',$db);
   $query = mysqli_query($connect,"call stock()");
   header('Location: Admin_logged.php');
   ?>
