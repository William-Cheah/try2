<?php
    include("keselamatan.php");
    include("sambungan.php");
    
    $status = $_SESSION["status"];
    if($status == "pembeli")
        include("pembeli_menu.php");
    else
        include("admin_menu.php");

    if(isset($_GET["ID_Produk"]))
        $ID_Produk= $_GET["ID_Produk"];
        
    $sql = "select * from produk AS t1 inner join
    jenama as t2
    on
    t1.ID_Jenama=t2.ID_Jenama
    WHERE t1.ID_Produk='$ID_Produk'";
    $result = mysqli_query($sambungan,$sql);
    
    while($produk = mysqli_fetch_array($result)){
        $Gambar = $ID_Produk.".png";
        $Nama_Produk = $produk["Nama_Produk"];
        $Harga = $produk["Harga"];
        $Keterangan = $produk["Keterangan"];
        $Jenama = $produk["Jenama"];
    }
    ?>
    
   <link rel="stylesheet" href="asenarai.css">
   <link rel="stylesheet" href="abutton.css">
   
  <table class = "maklumat">
      <caption>MAKLUMAT KASUT</caption>
      <tr>
          <th>Perkara</th>
          <th>Maklumat</th>
      </tr>
      <tr>
          <td class="maklumat">ID Kasut</td>
          <td class="maklumat"><?php echo $ID_Produk;?></td>
      </tr>
      <tr>
          <td class="maklumat">Nama Kasut</td>
          <td class="maklumat"><?php echo $Nama_Produk;?></td>
      </tr>
      <tr>
          <td class="maklumat">Gambar</td>
          <td class="maklumat"><?php echo "<img width=300 src='Gambar/".$Gambar."'>";?></td>
      </tr>
      <tr>
          <td class="maklumat">Harga</td>
          <td class="maklumat">RM<?php echo $Harga;?></td>
      </tr>
      <tr>
          <td class="maklumat">Keterangan</td>
          <td class="maklumat"><?php echo $Keterangan;?></td>
      </tr>
      <tr>
          <td class="maklumat">Jenama</td>
          <td class="maklumat"><?php echo $Jenama;?></td>
      </tr>
  </table>
  <center><button class="cetak" onclick="window.print()">Cetak</button></center>