<?php
session_start();
include_once('function.php');
$username = $_POST['username'];
$password = $_POST['password'];
$con = mysqli_connect('localhost', 'root', '', 'psw2_proyek');
$query = mysqli_query($con, "SELECT * FROM t_akun");
while ($row = mysqli_fetch_array($query)) {
	$role = $row['role'];
	if ($username === $row["username"] && $password === $row['password']) {
		if ($role == "admin") {
			$_SESSION['admin'] = TRUE;
			$_SESSION['username'] = $username;
			$_SESSION['status'] = "masuk";
			print '<script>alert("Selamat datang admin");</script>';
			print '<script>window.location.assign("dashboard.php");</script>';
			exit;
		} else {
			$_SESSION['username'] = $username;
			$_SESSION['admin'] = FALSE;
			$_SESSION['status'] = "masuk";
			print "<script>alert('Selamat datang $username');</script>";
			print '<script>window.location.assign("dashboard.php");</script>';
			exit;
		}
	}
}
$eror = true;
if (isset($eror)) {
	print '<script>alert("username / password anda salah");</script>';
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=login.php">';
	exit;
}