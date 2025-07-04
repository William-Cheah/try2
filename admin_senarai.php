<?php
    include("keselamatan.php");
    include("sambungan.php");
    include("admin_menu.php");
?>

<link rel="stylesheet" href="asenarai.css">
<table class="admin">
      <caption>SENARAI MAKLUMAT ADMIN</caption>
      <tr>
          <th>ID</th>
          <th>Nama</th>
          <th>Password</th>
          <th colspan="2">Tindakan</th>
    </tr>

<?php
    $sql="select * from admin";
    $result=mysqli_query($sambungan,$sql);
    while($admin=mysqli_fetch_array($result)) {
          $ID_Admin=$admin["ID_Admin"];
          echo"<tr> <td>$admin[ID_Admin]</td>
                    <td class='name'>$admin[Nama_Admin]</td>
                    <td>$admin[PWord_Admin]</td>
                    <td>
                       <a href='admin_update.php?ID_Admin=$admin[ID_Admin]'>
                             <img src='Gambar/update.png'>
                       </a>
                    </td>
                    <td>
                       <a href='javascript:padam(\"$ID_Admin\");'>
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
              window.location="admin_delete.php?ID_Admin="+id;
          }
      }
</script>
<center><button class="cetak" onclick="window.print()">Cetak</button></center>










