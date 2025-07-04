<?php
    include("keselamatan.php");
    include("sambungan.php");

$ID_Pilih=$_GET["ID_Pilih"];

$sql="delete from pilihan where ID_Pilih = '$ID_Pilih'";
$result=mysqli_query($sambungan,$sql);

echo"<script>window.location='pilihan_senarai.php'</script>";
?>