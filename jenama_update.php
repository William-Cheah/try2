<?php
    include("keselamatan.php");
    include("sambungan.php");
    include("admin_menu.php");

     if(isset($_POST["submit"])){
        $ID_Jenama=$_POST["ID_Jenama"];
        $Jenama=$_POST["Jenama"];
        
        $sql="update jenama
        set Jenama='$Jenama'
        where ID_Jenama='$ID_Jenama'";
        $result=mysqli_query($sambungan,$sql);
        if($result==true)
            echo"<br><center>Berjaya kemaskini</center>";
        else
            echo"<br><center>Ralat:$sql<br>".mysqli_error($sambungan)."</center>";
    }

    if(isset($_GET['ID_Jenama']))
        $ID_Jenama=$_GET['ID_Jenama'];

        $sql="select * from jenama where ID_Jenama='$ID_Jenama'";
        $result=mysqli_query($sambungan,$sql);
        while($jenama=mysqli_fetch_array($result)){
              $Jenama=$jenama['Jenama'];
        }
?>

<link rel="stylesheet" href="aborang.css">
<link rel="stylesheet" href="abutton.css">

<h3 class="panjang">KEMASKINI JENAMA</h3>
    <form class="panjang" action="jenama_update.php" method="post">
    <table>
        <tr> 
             <td>ID Jenama</td>
             <td><input required type="text" name="ID_Jenama" value="<?php echo $ID_Jenama; ?>"readonly></td>
        </tr>
        <tr>
             <td>JENAMA</td>
             <td><input required type="text" name="Jenama" value="<?php echo $Jenama; ?>"></td>
        </tr>
        </table>
        <button class="update" type="submit" name="submit">Update</button>
</form>