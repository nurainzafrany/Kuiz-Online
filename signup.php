<?php
include('sambungan.php'); 
if(isset($_POST['idpelajar'])) {   
    
    //bahagian ini untuk mendaftar masuk pengguna//
    $idpelajar = $_POST["idpelajar"];
    $namapelajar = $_POST["namapelajar"];
    $idkelas = $_POST["idkelas"];
    $password = $_POST["password"];
    $sql = "insert into pelajar values('$idpelajar', '$namapelajar', '$idkelas', '$password')";
    $result = mysqli_query($sambungan, $sql);
    if ($result)
        
//bahagian ini untuk pop-up signup//
        echo "<script>alert('Berjaya signup')</script>";
    else 
        echo "<script>alert('Tidak berjaya signup')</script>";
    echo "<script>window.location='login.php'</script>";
}
?> 

<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">
<body background='wood.jpg'>
    <center>
    <img src='tajuk1.png'><br>
    <img src='tajuk2.png'>
    </center>

    <h3 class="panjang">SIGN UP</h3>
    <form class="panjang" action="signup.php" method="post">
    <table>
        <tr>
            <td>ID Pelajar</td>
            <td><input type="text" name="idpelajar" placeholder="P001 max 4 char"></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td><input type="text" name="namapelajar"></td>        
        </tr>
        <tr>
            <td>Kelas</td>
            <td>
            <select name="idkelas">
            <?php
            $sql = "select * from kelas";
            $data = mysqli_query($sambungan, $sql);
            while ($kelas = mysqli_fetch_array($data)) {
                echo "<option value='$kelas[idkelas]'>$kelas[namakelas]</option>";		
            }
            ?>
            </select>
            </td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="password" placeholder="max: 8 char"></td>
        </tr>
    </table>
    <button class="tambah" type="submit">Daftar</button>
    <button class="padam" type="button" onclick="window.location='login.php'">Batal</button>
</form>
</body>