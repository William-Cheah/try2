<?php
    include("sambungan.php");
    include("admin_menu.php");

    $ID_Admin=$_GET["ID_Admin"];

    $sql="delete from admin where ID_Admin='$ID_Admin'";
    $result=mysqli_query($sambungan,$sql);

    echo"<script>window.location='admin_senarai.php'</script>";
?>