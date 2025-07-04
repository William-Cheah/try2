<?php
    include("keselamatan.php");
    include("sambungan.php");
    include("admin_menu.php");

    if(isset($_POST["submit"])){
        $ID_Pembeli=$_POST["ID_Pembeli"];
        $Nama_Pembeli=$_POST["Nama_Pembeli"];
        $PWord_Pembeli=$_POST["PWord_Pembeli"];
        
        $sql="insert into pembeli values('$ID_Pembeli','$Nama_Pembeli','$PWord_Pembeli')";
        $result=mysqli_query($sambungan,$sql);
        if($result==true)
            echo"<br><center>Berjaya tambah</center>";
        else
            echo"<br><center>Ralat:$sql<br>".mysqli_error($sambungan)."</center>";
        
    }
?>

<link rel="stylesheet" href="aborang.css">
<link rel="stylesheet" href="abutton.css">

<h3 class="panjang">TAMBAH PEMBELI</h3>
    <form class="panjang" action="pembeli_insert.php" method="post">
    <table>
        <tr> 
             <td class="warna">ID Pembeli</td>
             <td><input required type="text" 
                name="ID_Pembeli" placeholder="cth:P000" 
                pattern="[A-Z0-9]{4}" 
                oninvalid="this.setCustomValidity('Sila masukkan 4 aksara')" 
                oninput="this.setCustomValidity('')"> 
            </td>
        </tr>
        <tr>
             <td class="warna">NAMA Pembeli</td>
             <td><input required type="text" name="Nama_Pembeli" placeholder="cth:William"></td>
        </tr>
        <tr>
             <td class="warna">Password</td>
             <td><input required type="password" name="PWord_Pembeli" placeholder="cth:P1234"
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