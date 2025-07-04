<!--Langkah 1: Masukkan ID anda dan Password anda
    Langkah 2: Tekan login
    Jika belum login, pembeli boleh tekan signup
    Boleh digunakan oleh pembeli dan admin untuk login sistem ini -->
    
    <?php
     session_start();

     include("sambungan.php");

    if(isset($_POST["submit"])){
          $userid=$_POST["userid"];
          $password=$_POST["password"];
        
          $jumpa=FALSE;
          if($jumpa==FALSE){
              $sql="SELECT * FROM pembeli";
              $result=mysqli_query($sambungan,$sql);
              while($pembeli=mysqli_fetch_array($result)) {
                  if($pembeli["ID_Pembeli"]==$userid&&$pembeli["PWord_Pembeli"]==$password){
                      $jumpa=TRUE;
                      $_SESSION["idpengguna"]=$pembeli["ID_Pembeli"];
                      $_SESSION["nama"]=$pembeli["Nama_Pembeli"];
                      $_SESSION["status"]="pembeli";
                      break;
                  }
              }
          }
          if($jumpa==FALSE){
              $sql="SELECT * FROM admin";
              $result=mysqli_query($sambungan,$sql);
              while($admin=mysqli_fetch_array($result)) {
                  if($admin["ID_Admin"]==$userid&&$admin["PWord_Admin"]==$password){
                      $jumpa=TRUE;
                      $_SESSION["idpengguna"]=$admin["ID_Admin"];
                      $_SESSION["nama"]=$admin["Nama_Admin"];
                      $_SESSION["status"]="admin";
                      break;
                  }
              }
          }
          if($jumpa==TRUE){
              if($_SESSION["status"]=="pembeli")
                  header("Location:pembeli_home.php");
              else if($_SESSION["status"]=="admin")
                  header("Location:admin_home.php");
          }
           else{
               echo"<script>
                       alert('kesalahan pada username atau password');
                       window.location='index.php';
                    </script>";
           }
    }
?>

<link rel="stylesheet"href="abutton.css">
<link rel="stylesheet"href="aborang.css">

<center>
    <h3>SELAMAT DATANG KE WILLIAM SHOES SHOP</h3>
    <h2><marquee behavior="alternate">Sila login untuk memilih kasut anda</marquee></h2>
     <img class="tajuk" src="Gambar/tajuk.gif" width="auto" height="120px">
</center>

<h3 class="pendek">LOG IN</h3>
<form class="pendek" action="index.php" method="post">
      <table>
           <tr>
                <td><img src="Gambar/user.png"></td>
                <td><input required type="text" name="userid" placeholder="ID Pengguna"></td>
          </tr>
          <tr>
                <td><img src="Gambar/lock.png"></td>
                <td><input required type="password" name="password" placeholder="Password Pengguna"></td>
          </tr>
    </table>
    <button class ="signup" type="button"onclick="window.location='signup.php'">Sign UP</button>
    <button class="login" type="submit" name="submit">Login</button>
</form>