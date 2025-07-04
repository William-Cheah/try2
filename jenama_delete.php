<?php
    include("keselamatan.php");
    include("sambungan.php");

    $ID_Jenama=$_GET["ID_Jenama"];

    $sql="delete from jenama where ID_Jenama='$ID_Jenama'";
    $result=mysqli_query($sambungan,$sql);

    echo"<script>window.location='jenama_senarai.php'</script>";
?>