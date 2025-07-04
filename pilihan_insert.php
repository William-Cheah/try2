<?php
    include("keselamatan.php");
    include("sambungan.php");
    $ID_Pembeli=$_GET["ID_Pembeli"];
    $ID_Produk=$_GET["ID_Produk"];

    $result=mysqli_query($sambungan,"SELECT * FROM pilihan
    where ID_Pembeli='$ID_Pembeli'");
    $bil_rekod=mysqli_num_rows($result);

    if(isset($_GET["ID_Produk"])){
        if($bil_rekod<3){
            $sql="insert into pilihan values(NULL,'$ID_Pembeli','$ID_Produk')";
            $result=mysqli_query($sambungan,$sql);
            if($result==true)
                echo"<script>alert('Item berjaya ditambah dalam senarai pilih')</script>";
            else
                echo"<br><center>Ralat:$sql<br>".mysqli_error($sambungan)."</center>";
        }
        else
            echo"<script> alert('Maksima 3 item sahaja dibenarkan...sila delete')</script>";
    }
    echo "<script>window.location='pembeli_produk.php'</script>";
?>