<?php
include ('sambungan.php');
session_start();

//bahagian ini untuk login pengguna//
if (isset($_POST['userid'])) {
    $userid = $_POST['userid'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM pelajar";
    $result = mysqli_query($sambungan, $sql);
    $jumpa = FALSE;
    while($pelajar = mysqli_fetch_array($result))   {
        if ($pelajar['idpelajar'] == $userid && $pelajar["password"] == $password) {
            $jumpa = TRUE;
            $_SESSION['username'] = $pelajar['idpelajar'];
            $_SESSION['nama'] = $pelajar['namapelajar'];
            $_SESSION['status'] = 'pelajar';
            break;
        }
    }
    
    
//jika pelajar tak jumpa, cari pula pada jadual guru//
    if ($jumpa == FALSE) {
        $sql = "SELECT * FROM guru";
        $result = mysqli_query($sambungan, $sql);
        while($guru = mysqli_fetch_array($result))   {
            if ($guru['idguru'] == $userid && $guru["password"] == $password) {
                $jumpa = TRUE;
                $_SESSION['username'] = $guru['idguru'];
                $_SESSION['nama'] = $guru['namaguru'];
                $_SESSION['status'] = 'guru';
                break;
            }
        }
    }
  
//bahagian ini untuk pop-up mesej login//
    if ($jumpa == TRUE) {     
        header("Location: utama.html");
    }
    else 
        echo " <script>
        alert('kesalahan pada username atau password'); 
        window.location='login.php'</script>"; 
}      ?>

<html>
<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">
<body background='wood.jpg'>
    <center>
    <img src='tajuk1.png'><br>
    <img src='tajuk2.png'>
    </center>
    
    <h3 class="pendek">SIGN IN</h3>
    <form class="pendek" action=login.php method=post class="login">
        <table>
            <tr>
                <td><img src="user.png"></td>
                <td>
                    <input type="text" name="userid" placeholder="idpengguna">
                </td>
            <tr>
            <tr>
                <td><img src="lock.png"></td>
                <td>
                    <input type="password" name="password" placeholder="password">
                </td>
            </tr>
        </table>
        <button class="login" type="submit">Login</button>
        <button class="signup" type="button" onclick="window.location='signup.php'">Sign Up</button>
    </form>
</body>
</html>