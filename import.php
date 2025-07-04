<?php 
    include("keselamatan.php"); 
    include("sambungan.php"); 
    include("admin_menu.php"); 
 
    if(isset($_POST["submit"])){ 
        $namajadual = $_POST["namajadual"]; 
        $namafail = $_FILES["namafail"]["name"];
        $sementara = $_FILES["namafail"]["tmp_name"];
        move_uploaded_file($sementara,$namafail);
         
        $fail = fopen($namafail,"r"); 
         
        while(!feof($fail)){ 
            $medan = explode(",", fgets($fail)); 
            $berjaya = false; 
             
            if(strtolower($namajadual) =="pembeli"){ 
                $ID_Pembeli = $medan[0]; 
                $Nama_Pembeli = $medan[1]; 
                $PWord_Pembeli = $medan[2]; 
                $sql = "insert into pembeli 
                values('$ID_Pembeli','$Nama_Pembeli','$PWord_Pembeli')"; 
                if(mysqli_query($sambungan,$sql)) 
                    $berjaya = true; 
                else 
                    echo "<br><center>Ralat : $sql<br>".mysqli_error($sambungan)."</center>"; 
            } 
            if(strtolower($namajadual) =="admin"){ 
                $ID_Admin = $medan[0]; 
                $Nama_Admin = $medan[1]; 
                $PWord_Admin = $medan[2]; 
                $sql = "insert into admin 
                values('$ID_Admin','$Nama_Admin','$PWord_Admin')"; 
                if(mysqli_query($sambungan,$sql)) 
                    $berjaya = true; 
                else 
                    echo "<br><center>Ralat : $sql<br>".mysqli_error($sambungan)."</center>"; 
            }
            if(strtolower($namajadual) =="jenama"){ 
                $ID_Jenama = $medan[0]; 
                $Jenama = $medan[1]; 
                $sql = "insert into jenama 
                values('$ID_Jenama','$Jenama')"; 
                if(mysqli_query($sambungan,$sql)) 
                    $berjaya = true; 
                else 
                    echo "<br><center>Ralat : $sql<br>".mysqli_error($sambungan)."</center>"; 
            }
        } 
        if($berjaya ==true){
            echo"<script>
            alert('Rekod berjaya diimport');
            window.location='import.php';
            </script>";
        }
        else {
            echo"<script>
            alert('Rekod tidak berjaya diimport);
            window.location='import.php';
            </script>";
        }
        mysqli_close($sambungan); 
    } 
?> 
 
 
<link rel="stylesheet" href="aborang.css"> 
<link rel="stylesheet" href="abutton.css"> 
 
 
<h3 class="panjang">IMPORT DATA</h3> 
<form class = "panjang" action="import.php" method="post" enctype="multipart/form-data" class="import"> 
    <table> 
        <tr> 
            <td>Jadual</td> 
            <td> 
                <select name="namajadual"> 
                    <option>Pembeli</option> 
                    <option>Admin</option>
                    <option>Jenama</option>
                </select> 
            </td> 
        </tr> 
        <tr> 
            <td>Nama Fail</td> 
            <td><input required type="file" name="namafail" accept=".txt">
            </td> 
        </tr> 
    </table> 
    <button class="import" type="submit" name="submit">Import</button> 
</form>