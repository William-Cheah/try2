<?php
    include("keselamatan.php");
    include("sambungan.php");
    include("admin_menu.php");

    if(isset($_POST["submit"])){
        $ID_Produk=$_POST["ID_Produk"];
        $Nama_Produk=$_POST["Nama_Produk"];
        $Keterangan=$_POST["Keterangan"];
        $Harga=$_POST["Harga"];
        $ID_Jenama=$_POST["ID_Jenama"];
        $ID_Admin=$_POST["ID_Admin"];
        
        $namafail = $ID_Produk.".png";
        $sementara = $_FILES["namafail"]["tmp_name"];
        move_uploaded_file($sementara, "Gambar/".basename($namafail));
        
        $sql = "insert into produk values('$ID_Produk','$Nama_Produk','$Keterangan','$Harga','$namafail','$ID_Jenama','$ID_Admin')";
        $result = mysqli_query($sambungan, $sql);
        if($result == true)
            echo "<br><center>Berjaya tambah</center>";
        else
            echo "<br><center>Ralat : $sql<br>".mysqli_error($sambungan)."</center>";
    }
?>


<link rel="stylesheet" href="aborang.css">
<link rel="stylesheet" href="abutton.css">


<h3 class="panjang">TAMBAH KASUT</h3>
<form class="panjang" action="produk_insert.php" method="post" enctype="multipart/form-data">
<table>
    <tr>
        <td>ID Kasut</td>
        <td><input required type="text" name="ID_Produk"
                    placeholder="P1001" 
                    pattern="[A-Z0-9]{5}" 
                    oninvalid="this.setCustomValidity('Sila masukkan 5 aksara')" 
                    oninput="this.setCustomValidity('')"></td>
    </tr>
    
    <tr>
        <td>Nama Kasut</td>
        <td><input required type="text" name="Nama_Produk" placeholder="Slipper"></td>
    </tr>
    
    <tr>
        <td>Keterangan</td>
        <td><textarea required name="Keterangan" cols="24" rows="5"></textarea></td>
    </tr>
    
    <tr>
        <td>Harga</td>
        <td><input required type="text" name="Harga" placeholder="123.45"
                    pattern="[0-9]{1,3}\.?[0-9]{1,2}" title="Please enter maximum 3 number with a dot and maximum 2 decimal place, (e.g., 123.45)"></td>
    </tr>
    
    <tr>
        <td>Gambar 500*500</td>
        <td><input required type="file" name="namafail" accept=".png"></td>
    </tr>
    
    <tr>
        <td>Jenama</td>
        <td><select name="ID_Jenama">
        <?php
            $sql = " select * from jenama";
            $data = mysqli_query($sambungan,$sql);
            while($jenama = mysqli_fetch_array($data)){
                echo "<option value='$jenama[ID_Jenama]'>$jenama[Jenama]</option>";
            }
            ?>
            </select>
            </td>
    </tr>
    
    <tr>
        <td>Admin</td>
        <td><select name="ID_Admin">
        <?php
            $sql = "select * from admin;";
            $data = mysqli_query($sambungan,$sql);
            while($admin = mysqli_fetch_array($data)){
            echo"<option value='$admin[ID_Admin]'>$admin[Nama_Admin]</option>";
            }
            ?>
            </select>
        </td>
    </tr>
    
</table>
<button class="tambah" type="submit" name="submit">Tambah</button>
</form>