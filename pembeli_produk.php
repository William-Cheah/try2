<?php
    include("keselamatan.php");
    include("sambungan.php");
    include("pembeli_menu.php");
    $ID_Pembeli = $_SESSION["idpengguna"];
?>

<link rel="stylesheet" href="asenarai.css">
<link rel="stylesheet" href="abutton.css">

<div class="carian">
     <form class="carian" action="pembeli_produk.php" method="post">
           <label>Harga Maksima<input class="carian" type="text" name="maksima"
           pattern="[0-9]{1,3}\.?[0-9]{1,}" title="Please enter at most 3 digit number with a dot and at most 2 decimal place, (e.g., 123.45)"></label>
           <label>Jenama<input class="carian" type="text" name="Jenama"
           pattern="[A-Za-z]+" title="Please enter the correct name instead of number or symbol"></label>
           <button class="cari" type="submit" name="submit">Cari</button>
    </form>
</div>

<table class="produk">
<?php
     $syarat="";
     $tajuk="SEMUA JENAMA";
     if(isset($_POST["submit"])){
         $Jenama=$_POST["Jenama"];
         $maksima=$_POST["maksima"];
         if($Jenama!=NULL && $maksima==NULL){
             $tajuk="JENAMA $Jenama";
             $syarat="where Nama_Produk like '%$Jenama%'";
         }
         else if($Jenama==NULL && $maksima!=NULL){
             $tajuk="HARGA $maksima";
             $syarat="where Harga <=$maksima";
         }
         else if($Jenama!=NULL && $maksima!=NULL){
             $tajuk="JENAMA $Jenama DAN HARGA <= $maksima";
             $syarat="where Nama_Produk like '%$Jenama%' and Harga <=$maksima";
         }
     }
    echo"<caption>SENARAI KASUT $tajuk</caption>";
    
    $sql="select * from produk ".$syarat;
    $result=mysqli_query($sambungan,$sql);
    $bilangan=0;
    while($produk=mysqli_fetch_array($result)){
        if($bilangan % 3==0){
            echo"<tr class='produk'>";
        }
        echo"<td class='produk'>
                 <img width=200px src='Gambar/".$produk['Gambar']."'><br>
                 $produk[Nama_Produk]<br>RM$produk[Harga]<br><br>
                 <a class='maklumat' href='produk_maklumat.php?ID_Produk=$produk[ID_Produk]'>
                 Maklumat</a>
                 <a class='banding' href='pilihan_insert.php?ID_Pembeli=$ID_Pembeli
                 &&ID_Produk=$produk[ID_Produk]'>Pilih</a>
             </td>";
        $bilangan=$bilangan+1;
        if($bilangan % 3==0){
            echo"</tr>";
        }
    }
?>
</table>
<center><button class="cetak" onclick="window.print()">Cetak</button></center>
