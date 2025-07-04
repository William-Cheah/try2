<?php
    include("keselamatan.php");
    include("sambungan.php");
    include("admin_menu.php");
?>

<link rel="stylesheet" href="asenarai.css">
<link rel="stylesheet" href="abutton.css">

<table>
<caption> PILIHAN KASUT PEMBELI</caption>
<tr>
<th>BIL</th>
<th>ID KASUT</th>
<th>NAMA KASUT</th>
<th>KETERANGAN</th>
<th>GAMBAR</th>
<th>HARGA</th>
<th>ID JENAMA</th>
<th>NAMA JENAMA</th>
<th>BILANGAN</th>
</tr>
<?php
$no=1;
$sql="SELECT t1.ID_Produk,t1.ID_Pembeli,
COUNT(t1.ID_Pembeli) AS kira, 
t2.Nama_Produk,
t2.Keterangan, 
t2.Harga, 
t2.Gambar, 
t2.ID_Jenama,
t3.Nama_Pembeli,
t4.Jenama
FROM (((pilihan as t1 
INNER JOIN produk AS t2
ON t1.ID_Produk=t2.ID_Produk)
INNER JOIN pembeli AS t3 ON t1.ID_Pembeli=t3.ID_Pembeli)
INNER JOIN jenama AS t4 ON t2.ID_Jenama=t4.ID_Jenama)
GROUP BY t1.ID_Produk 
ORDER BY COUNT(t1.ID_Pembeli) DESC";
$result=mysqli_query($sambungan,$sql);
while ($produk=mysqli_fetch_array($result)){
    echo"
<tr>
<td>$no</td>
<td>$produk[ID_Produk]</td>
<td>$produk[Nama_Produk]</td>
<td>$produk[Keterangan]</td>
<td><img width=150 src='Gambar/$produk[Gambar]'></td>
<td>RM$produk[Harga]</td>
<td>$produk[ID_Jenama]</td>
<td>$produk[Jenama]</td>
<td>$produk[kira]</td>
</tr>";
$no++; }
?>
</table>
<center><button class="cetak" onclick="window.print()">Cetak</button></center>