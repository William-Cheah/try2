<?php
    include("keselamatan.php");
    include("sambungan.php");
    include("admin_menu.php");

    if(isset($_POST["submit"])){
        $ID_Jenama=$_POST["ID_Jenama"];
        $Jenama=$_POST["Jenama"];
        
        $sql="insert into jenama values('$ID_Jenama','$Jenama')";
        $result=mysqli_query($sambungan,$sql);
        if($result==true)
            echo"<br><center>Berjaya tambah</center>";
        else
            echo"<br><center>Ralat:$sql<br>".mysqli_error($sambungan)."</center>";
        
    }
?>

<link rel="stylesheet" href="aborang.css">
<link rel="stylesheet" href="abutton.css">

<h3 class="panjang">TAMBAH JENAMA</h3>
    <form class="panjang" action="jenama_insert.php" method="post">
    <table>
        <tr> 
             <td class="warna">ID_JENAMA</td>
             <td><input required type="text" 
                name="ID_Jenama" placeholder="cth:JEN111" 
                pattern="[A-Z0-9]{6}" 
                oninvalid="this.setCustomValidity('Sila masukkan 6 aksara')" 
                oninput="this.setCustomValidity('')"> 
            </td>
        </tr>
        <tr>
             <td class="warna">NAMA JENAMA</td>
             <td><input required type="text" name="Jenama" placeholder="cth:Puma"></td>
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