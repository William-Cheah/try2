<?php
    include("keselamatan.php");
    include("sambungan.php");
    include("admin_menu.php");
?>


<link rel="stylesheet" href="asenarai.css">
<link rel="stylesheet" href="abutton.css">


<div class="carian">
    <form class="carian" action="produk_senarai.php" method="post">
        <label>Harga Maksima<input class="carian" type="text" name="maksima"
        pattern="[0-9]{1,3}\.?[0-9]{1,}" title="Please enter at most 3 digit number with a dot and at most 2 decimal place, (e.g., 123.45)"></label>
        <label>Jenama<input class="carian" type="text" name="Jenama"
        pattern="[A-Za-z]+" title="Please enter the correct name instead of number or symbol"></label>
        <button class="cari" type="submit" name="submit">Cari</button>
    </form>
</div>


<table>
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Keterangan</th>
        <th>Harga</th>
        <th>Gambar</th>
        <th>Jenama</th>
        <th colspan="3">Tindakan</th>
    </tr>
    
    <?php
        $syarat = "";
        $tajuk = "SEMUA JENAMA";
        if(isset($_POST["submit"])){
            $Jenama=$_POST["Jenama"];
            $maksima = $_POST["maksima"];
            if($Jenama != NULL && $maksima == NULL){
                $tajuk = "JENAMA $Jenama";
                $syarat = "where Nama_Produk like '%$Jenama%'";
        }
        else if($Jenama == NULL && $maksima != NULL){
            $tajuk = "HARGA<= $maksima";
            $syarat = "where Harga<= $maksima";
        }
        else if($Jenama != NULL && $maksima != NULL){
            $tajuk = "JENAMA $Jenama DAN HARGA<= $maksima";
            $syarat = "where Nama_Produk like '%$Jenama%' and Harga<= $maksima";
        }
        }
    echo "<caption>SENARAI KASUT $tajuk</caption>";
    
    $sql="select * from produk join jenama on produk.ID_Jenama=jenama.ID_Jenama ".$syarat;
    $result = mysqli_query($sambungan, $sql);
    
    while($produk = mysqli_fetch_array($result)){
        $ID_Produk = $produk["ID_Produk"];
        echo "<tr><td>$produk[ID_Produk]</td>
            <td>$produk[Nama_Produk]</td>
            <td>$produk[Keterangan]</td>
            <td>RM $produk[Harga]</td>
            <td><img width=300 src='Gambar/$produk[Gambar]'></td>
            <td>$produk[Jenama]</td>
            <td>
                <a href='produk_update.php?ID_Produk=$ID_Produk' title='update'>
                    <img src='Gambar/update.png'>
                </a>
            </td>
            <td>
                <a href='javascript:padam(\"$ID_Produk\");' title='delete'>
                    <img src='Gambar/delete.png'>
                </a>
            </td>
            <td>
                <a href='produk_maklumat.php?ID_Produk=$ID_Produk' title='maklumat'>
                    <img src='Gambar/info2.png'>
                </a>
            </td>
        </tr>";
    }
    ?>
</table>
<center><button class="cetak" onclick="window.print()">Cetak</button></center>


<script>
    function padam(id){
        if(confirm("Adakah anda ingin padam?")==true){
            window.location = "produk_delete.php?ID_Produk="+id;
        }
    }
</script>