<?php
    include("keselamatan.php");
    include("sambungan.php");
    $status = $_SESSION["status"];
    if($status == "pembeli")
        include("pembeli_menu.php");
    else
        include("admin_menu.php");
    $ID_Pembeli=$_SESSION["idpengguna"];
?>
<link rel="stylesheet" href="asenarai.css">
<link rel="stylesheet" href="abutton.css">
<table>
      <caption>PILIHAN KASUT PEMBELI</caption>
      <tr>
          <th>ID</th>
          <th>Nama</th>
          <th>Gambar</th>
          <th>Keterangan</th>
          <th>Harga</th>
          <th>Tindakan</th>
    </tr>
<?php
    $sql="select * from pilihan join produk on pilihan.ID_Produk=produk.ID_Produk
    where pilihan.ID_Pembeli='$ID_Pembeli'";
    $result=mysqli_query($sambungan,$sql);
    while($produk = mysqli_fetch_array($result)){
        echo"<tr> 
        <td>$produk[ID_Produk]</td>
        <td>$produk[Nama_Produk]</td>
        <td><img width=150 src='Gambar/$produk[Gambar]'></td>
        <td>$produk[Keterangan]</td>
        <td>RM$produk[Harga]</td>
        <td>
             <a href='pilihan_delete.php?ID_Pilih=$produk[ID_Pilih]'>
                     <img src='Gambar/delete.png'>
             </a>
        </td>
        </tr>";
    }
?>
</table>
<center><button class="cetak" onclick="window.print()">Cetak</button></center>