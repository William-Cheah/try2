<?php
    include("keselamatan.php");
    include("sambungan.php");
    include("admin_menu.php");

    if(isset($_POST["submit"])){
        $ID_Admin=$_POST["ID_Admin"];
        $Nama_Admin=$_POST["Nama_Admin"];
        $PWord_Admin=$_POST["PWord_Admin"];
        
        $sql="insert into admin values('$ID_Admin','$Nama_Admin','$PWord_Admin')";
        $result=mysqli_query($sambungan,$sql);
        if($result==true)
            echo"<br><center>Berjaya tambah</center>";
        else
            echo"<br><center>Ralat:$sql<br>".mysqli_error($sambungan)."</center>";
    }
?>

<link rel="stylesheet" href="aborang.css">
<link rel="stylesheet" href="abutton.css">

<h3 class="panjang">TAMBAH ADMIN</h3>
    <form class="panjang" action="admin_insert.php" method="post">
    <table>
        <tr> 
             <td class="warna">ID Admin</td>
             <td><input required type="text" name="ID_Admin"
                    placeholder="A001" 
                    pattern="[A-Z0-9]{4}" 
                    oninvalid="this.setCustomValidity('Sila masukkan 4 aksara')" 
                    oninput="this.setCustomValidity('')"></td>
        </tr>
        <tr>
             <td class="warna">NAMA Admin</td>
             <td><input required type="text" name="Nama_Admin" placeholder="William"></td>
        </tr>
        <tr>
             <td class="warna">Password</td>
             <td><input required type="password" name="PWord_Admin"
                    placeholder="P9001" 
                    pattern="[A-Z0-9]{5}" 
                    oninvalid="this.setCustomValidity('Sila masukkan 5 aksara')" 
                    oninput="this.setCustomValidity('')"></td>
        </tr>
        </table>
        <button class="tambah" type="submit" name="submit">Tambah</button>
</form>
<br>
<center>
       <button class="kuning" onclick="tukar_warna(0)">Kuning</button>
       <button class="hijau" onclick="tukar_warna(1)">Hijau</button>
       <button class="merah" onclick="tukar_warna(2)">Merah</button>
       <button class="hitam" onclick="tukar_warna(3)">Hitam</button>
</center>

<script>
      function tukar_warna(n){
          var warna = ["Yellow","Green","Red","Black"];
          var teks = document.getElementsByClassName("warna");
          for(var i=0;i<teks.length;i++)
              teks[i].style.color=warna[n];
      }
</script>