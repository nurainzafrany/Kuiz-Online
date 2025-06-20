<?php
include("sambungan.php");

$idkelas = $_POST["idkelas"];
$namakelas = $_POST["namakelas"];

$sql = "update kelas set namakelas = '$namakelas' where idkelas = '$idkelas' ";

$result = mysqli_query($sambungan, $sql);
if ($result == true)
    echo "berjaya kemaskini";
  else
     echo "tidak berjaya kemaskini";
?>