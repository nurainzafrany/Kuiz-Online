<?php
  $host = 'localhost';
  $user = 'root';             
  $password = '';       
  $database = 'kuizonlineain';     

  $sambungan = mysqli_connect($host, $user, $password, $database)
  or die('Sambungan gagal');
?>