<?php
    include("keselamatan.php");
    include("sambungan.php");
    
    $ID_Produk = $_GET["ID_Produk"];

    $sql = "delete from produk where ID_Produk = '$ID_Produk'";
    $result = mysqli_query($sambungan,$sql);

    echo"<script>window.location='produk_senarai.php'</script>";
?>