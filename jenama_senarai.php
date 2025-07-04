<?php
    include("keselamatan.php");
    include("sambungan.php");
    include("admin_menu.php");
?>

<link rel="stylesheet" href="asenarai.css">
<table class="jenama">
      <caption>SENARAI MAKLUMAT JENAMA</caption>
      <tr>
          <th>ID</th>
          <th>JENAMA</th>
          <th colspan="2">Tindakan</th>
    </tr>

<?php
    $sql="select * from jenama";
    $result=mysqli_query($sambungan,$sql);
    while($jenama=mysqli_fetch_array($result)) {
          $ID_Jenama=$jenama["ID_Jenama"];
          echo"<tr> <td>$jenama[ID_Jenama]</td>
                    <td class='name'>$jenama[Jenama]</td>
                    <td>
                       <a href='jenama_update.php?ID_Jenama=$ID_Jenama'>
                             <img src='Gambar/update.png'>
                       </a>
                    </td>
                    <td>
                       <a href='javascript:padam(\"$ID_Jenama\");'>
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
              window.location="jenama_delete.php?ID_Jenama="+id;
          }
      }
</script>
<center><button class="cetak" onclick="window.print()">Cetak</button></center>