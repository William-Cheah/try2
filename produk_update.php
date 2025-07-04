<?php
    include("keselamatan.php");
    include("sambungan.php");
    include("admin_menu.php");

    if(isset($_POST["submit"])){
        $ID_Produk = $_POST["ID_Produk"];
        $Nama_Produk = $_POST["Nama_Produk"];
        $Harga = $_POST["Harga"];
        $Keterangan = $_POST["Keterangan"];
        $ID_Jenama = $_POST["Jenama"];
        $namafail = $ID_Produk.".png";
        
        
        $sql = "update produk set Nama_Produk = '$Nama_Produk',
            Keterangan='$Keterangan',Harga=$Harga,Gambar = '$namafail', ID_Jenama = '$ID_Jenama'
            where ID_Produk='$ID_Produk'";
        $result = mysqli_query($sambungan,$sql);
        if($result == true)
            echo "<br><center>Berjaya kemaskini</center>";
        else
            echo "<br><center>Ralat : $sql<br>".mysqli_error($sambungan)."</center>";
    }

    if(isset($_GET["ID_Produk"]))
        $ID_Produk=$_GET["ID_Produk"];
        
    $sql = "select * from produk where ID_Produk='$ID_Produk'";

    $result=mysqli_query($sambungan,$sql);
    while($produk = mysqli_fetch_array($result)){
        $Nama_Produk = $produk["Nama_Produk"];
        $namafail = $ID_Produk.".png";
        $Harga = $produk["Harga"];
        $Keterangan = $produk["Keterangan"];
        $ID_Jenama = $produk["ID_Jenama"];
        
    }
?>


<link rel="stylesheet" href="aborang.css">
<link rel="stylesheet" href="abutton.css">

<h3 class="panjang">KEMASKINI PRODUK</h3>
<form class="panjang" action="produk_update.php" method="post" enctype="multipart/form-data">
<table>
    <tr>
        <td>ID Kasut</td>
        <td><input required type="text" name="ID_Produk" value="<?php echo $ID_Produk;?>" 
                    placeholder="P1001" 
                    pattern="[A-Z0-9]{5}" 
                    oninvalid="this.setCustomValidity('Sila masukkan 5 aksara')" 
                    oninput="this.setCustomValidity('')"  readonly> </td>
    </tr>
    <tr>
        <td>Nama Kasut</td>    
        <td><input required type="text" name="Nama_Produk" value="<?php echo $Nama_Produk;?>"></td>
    </tr>
    <tr>
        <td>Keterangan</td>
        <td><textarea required name="Keterangan" cols="24" rows="10"><?php echo $Keterangan;?></textarea>
        </td>
    </tr>
    <tr>
        <td>Harga (RM)</td>
        <td><input required type="text" name="Harga" value="<?php echo $Harga;?>"
                    pattern="[0-9]{1,3}\.?[0-9]{1,2}" title="Please enter maximum 3 number digit with a dot and maximum 2 decimal place, (e.g., 123.45)"></td>
    </tr>
    
    <tr>
        <td class="warna">Gambar</td>
        <td>
            <?php 
            if(isset($namafail)){
                echo"<img width=100 src='Gambar/".$namafail."'>";
                echo"<input type='hidden' name='namafail' value='".$namafail."'>";
            }else{
            echo"No image selected.";
            }?>
        </td>
    </tr>
    
    
    <tr>
        <td>Jenama</td>
        <td><select name="Jenama">
            <?php
            $sql = "SELECT * FROM jenama";
            $data = mysqli_query($sambungan, $sql);
            while ($jenama = mysqli_fetch_array($data)) {
                $selected = ($jenama['ID_Jenama'] == $ID_Jenama) ? 'selected' : '';
                echo "<option value='$jenama[ID_Jenama]' $selected>$jenama[Jenama]</option>";
            }
            ?>
            </select>
            </td>
    </tr>
    
    <tr>
        <td>Admin</td>
        <td><select name="ID_Admin">
        <?php
            $sql = "select * from produk As t1 INNER JOIN admin AS t2 ON
            t1.ID_Admin=t2.ID_Admin WHERE t1.ID_Produk = '$ID_Produk'";
            $data = mysqli_query($sambungan,$sql);
            while($admin = mysqli_fetch_array($data)){
            echo"<option value='$admin[ID_Admin]'>$admin[Nama_Admin]</option>";
            }
            ?>
            </select>
        </td>
    </tr>
</table>
<button class="update" type="submit" name="submit">Update</button>