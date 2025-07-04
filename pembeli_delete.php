<?php
    include("keselamatan.php");
    include("sambungan.php");

    $ID_Pembeli=$_GET["ID_Pembeli"];

    $sql="delete from pembeli where ID_Pembeli='$ID_Pembeli'";
    $result=mysqli_query($sambungan,$sql);

    echo"<script>window.location='pembeli_senarai.php'</script>";
?>