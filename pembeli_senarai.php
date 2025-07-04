<?php
    include("keselamatan.php");
    include("sambungan.php");
    include("admin_menu.php");
?>

<link rel="stylesheet" href="asenarai.css">
<table class="pembeli">
      <caption>SENARAI MAKLUMAT PEMBELI</caption>
      <tr>
          <th>ID</th>
          <th>Nama</th>
          <th>Password</th>
          <th colspan="2">Tindakan</th>
    </tr>

<?php
    $sql="select * from pembeli";
    $result=mysqli_query($sambungan,$sql);
    while($pembeli=mysqli_fetch_array($result)) {
          $ID_Pembeli=$pembeli["ID_Pembeli"];
          echo"<tr> <td>$pembeli[ID_Pembeli]</td>
                    <td class='name'>$pembeli[Nama_Pembeli]</td>
                    <td>$pembeli[PWord_Pembeli]</td>
                    <td>
                       <a href='pembeli_update.php?ID_Pembeli=$ID_Pembeli'>
                             <img src='Gambar/update.png'>
                       </a>
                    </td>
                    <td>
                       <a href='javascript:padam(\"$ID_Pembeli\");'>
                             <img src='Gambar/delete.png'>
                       </a>
                    </td>
                </tr>";
    }
          
?>
</table>

<script>
      function padam(id) {
          if(confirm("Adakah anda ingin padam") == true){
              window.location="pembeli_delete.php?ID_Pembeli="+id;
          }
      }
</script>
<center><button class="cetak" onclick="window.print()">Cetak</button></center>