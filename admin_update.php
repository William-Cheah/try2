<?php
    include("keselamatan.php");
    include("sambungan.php");
    include("admin_menu.php");

     if(isset($_POST["submit"])){
        $ID_Admin=$_POST["ID_Admin"];
        $PWord_Admin=$_POST["PWord_Admin"];
        $Nama_Admin=$_POST["Nama_Admin"];
        
        $sql="update admin
        set Nama_Admin='$Nama_Admin',PWord_Admin='$PWord_Admin'
        where ID_Admin='$ID_Admin'";
        $result=mysqli_query($sambungan,$sql);
        if($result==true)
            echo"<br><center>Berjaya kemaskini</center>";
        else
            echo"<br><center>Ralat:$sql<br>".mysqli_error($sambungan)."</center>";
    }

    if(isset($_GET['ID_Admin']))
        $ID_Admin=$_GET['ID_Admin'];

        $sql="select * from admin where ID_Admin='$ID_Admin'";
        $result=mysqli_query($sambungan,$sql);
        while($admin=mysqli_fetch_array($result)){
              $PWord_Admin=$admin['PWord_Admin'];
              $Nama_Admin=$admin['Nama_Admin'];
        }
?>

<link rel="stylesheet" href="aborang.css">
<link rel="stylesheet" href="abutton.css">

<h3 class="panjang">KEMASKINI ADMIN</h3>
    <form class="panjang" action="admin_update.php" method="post">
    <table>
        <tr> 
             <td>ID Admin</td>
             <td><input required type="text" name="ID_Admin" value="<?php echo $ID_Admin; ?>"readonly></td>
        </tr>
        <tr>
             <td>NAMA Admin</td>
             <td><input required type="text" name="Nama_Admin" value="<?php echo $Nama_Admin; ?>"></td>
        </tr>
        <tr>
             <td>Password</td>
             <td><input required type="text" name="PWord_Admin" value="<?php echo $PWord_Admin; ?>" 
                    pattern="[A-Z0-9]{5}" 
                    oninvalid="this.setCustomValidity('Sila masukkan 5 aksara')" 
                    oninput="this.setCustomValidity('')"></td>
        </tr>
        </table>
        <button class="update" type="submit" name="submit">Update</button>
</form>