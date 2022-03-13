<?php
session_start();
$pw = $_GET['newpassword'];
$uname = $_GET['user'];
if ($_GET['t1'] == $_SESSION['my_captcha']) {
    $mysql = new mysqli("localhost", "root", "", "psw2_proyek");
    $query = $mysql->query("SELECT * FROM t_akun");
    while ($row = $query->fetch_array()) {
        $nama = $row['username'];
        if ($uname == $nama) {
            $id = $row['id_akun'];
            $mysql->query("UPDATE t_akun SET password='$pw' WHERE id_akun ='$id'");
            print '<script>alert("Berhasil mengganti password")</script>';
            echo '<META HTTP-EQUIV="Refresh" Content="0; URL=login.php">';
            exit;
        }
    }
    $cek = true;
    if (isset($cek)) {
        print '<script>alert("Username tidak sesuai")</script>';
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=lupapassword.php">';
        exit;
    }
} else {
    print '<script>alert("Captcha yang anda masukkan tidak sesuai")</script>';
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=lupapassword.php">';
}