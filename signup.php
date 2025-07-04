<?php 
    include("sambungan.php"); 
    if(isset($_POST["submit"])){ 
        $ID_Pembeli = $_POST["ID_Pembeli"]; 
        $Nama_Pembeli = $_POST["Nama_Pembeli"]; 
        $PWord_Pembeli = $_POST["PWord_Pembeli"]; 
         
        $sql = "insert into pembeli values('$ID_Pembeli','$Nama_Pembeli','$PWord_Pembeli')"; 
        $result = mysqli_query($sambungan,$sql); 
        if($result) 
            echo"<script>alert('Berjaya signup')</script>"; 
        else 
            echo"<script>alert('Tidak berjaya signup')</script>"; 
        echo"<script>window.location='index.php'</script>"; 
    } 
?> 
 
<link rel="stylesheet" href="aborang.css"> 
<link rel="stylesheet" href="abutton.css"> 
 
<body> 
    <center><br> 
        <img src="Gambar/tajuk.gif"> 
    </center> 
     
    <h3 class="panjang">SIGN UP PEMBELI</h3> 
    <form class="panjang" action="signup.php" method="post"> 
        <table> 
            <tr> 
                <td>ID Pembeli</td> 
                <td><input required type="text" 
                    name="ID_Pembeli" placeholder="P105" 
                    pattern="[A-Z0-9]{4}" 
                    oninvalid="this.setCustomValidity('Sila masukkan 4 aksara')" 
                    oninput="this.setCustomValidity('')"> 
                </td> 
            </tr> 
            <tr> 
                <td>Nama Pembeli</td> 
                <td><input required type="text" name="Nama_Pembeli"
                    placeholder="William">
                </td> 
            </tr> 
            <tr> 
                <td>Password Pembeli</td> 
                <td><input required type="text" name="PWord_Pembeli"
                    placeholder="P065" 
                    pattern="[A-Z0-9]{5}" 
                    oninvalid="this.setCustomValidity('Sila masukkan 5 aksara')" 
                    oninput="this.setCustomValidity('')">
                </td> 
            </tr> 
        </table> 
         
        <button class="tambah" type="submit" name="submit">Daftar</button> 
        <button class="batal" type="button" onclick="window.location='index.php'">Batal</button> 
    </form> 
</body>



