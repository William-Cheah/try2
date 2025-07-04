<?php
    include("keselamatan.php");
    include("sambungan.php");
    include("admin_menu.php");

     if(isset($_POST["submit"])){
        $ID_Pembeli=$_POST["ID_Pembeli"];
        $Nama_Pembeli=$_POST["Nama_Pembeli"];
        $PWord_Pembeli=$_POST["PWord_Pembeli"];
        
        $sql="update pembeli
        set Nama_Pembeli='$Nama_Pembeli',PWord_Pembeli='$PWord_Pembeli'
        where ID_Pembeli='$ID_Pembeli'";
        $result=mysqli_query($sambungan,$sql);
        if($result==true)
            echo"<br><center>Berjaya kemaskini</center>";
        else
            echo"<br><center>Ralat:$sql<br>".mysqli_error($sambungan)."</center>";
    }

    if(isset($_GET['ID_Pembeli']))
        $ID_Pembeli=$_GET['ID_Pembeli'];

        $sql="select * from pembeli where ID_Pembeli='$ID_Pembeli'";
        $result=mysqli_query($sambungan,$sql);
        while($pembeli=mysqli_fetch_array($result)){
              $Nama_Pembeli=$pembeli['Nama_Pembeli'];
              $PWord_Pembeli=$pembeli['PWord_Pembeli'];
        }
?>

<link rel="stylesheet" href="aborang.css">
<link rel="stylesheet" href="abutton.css">

<h3 class="panjang">KEMASKINI PEMBELI</h3>
    <form class="panjang" action="pembeli_update.php" method="post">
    <table>
        <tr> 
             <td>ID Pembeli</td>
             <td><input requierd type="text" name="ID_Pembeli" value="<?php echo $ID_Pembeli; ?>"readonly></td>
        </tr>
        <tr>
             <td>NAMA Pembeli</td>
             <td><input required type="text" name="Nama_Pembeli" value="<?php echo $Nama_Pembeli; ?>"></td>
        </tr>
        <tr>
             <td>Password</td>
             <td><input required type="text" name="PWord_Pembeli" value="<?php echo $PWord_Pembeli; ?>" 
                pattern="[A-Z0-9]{5}" 
                oninvalid="this.setCustomValidity('Sila masukkan 5 aksara')" 
                oninput="this.setCustomValidity('')"></td>
        </tr>
        </table>
        <button class="update" type="submit" name="submit">Update</button>
</form>