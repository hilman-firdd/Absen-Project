<?php
//panggil file config.php untuk menghubung ke server
include 'system/config/conn.php';

session_start();

$user = $_POST['user'];
$pass = $_POST['pass'];
$pass = md5($pass);


$data = mysqli_query($connect,"SELECT * FROM user WHERE user='$user' AND pass='$pass'");
if (mysqli_num_rows($data) == 1) {

$row = mysqli_fetch_array($data);
$_SESSION['id_user'] = $row['id_user'];
$_SESSION['user'] = $row['user'];
$_SESSION['nama'] = $row['nama'];
$_SESSION['level'] = $row['level'];
$_SESSION['foto'] = $row['foto'];

if($row['level']=="Admin"){
    //redirect ke halaman admin
    header('location:page.php?home&sign-in=succes');
    } 
    else if($row['level']=="Guru-Piket"){
    //redirect ke halaman user
    header('location:page.php?g-home&sign-in=succes');
    } 
    else if($row['level']=="Sekretaris"){
    //redirect ke halaman user
    header('location:page.php?s-home&sign-in=succes');
    }
    } else {
    //kalau username ataupun password tidak terdaftar di database
    header('location:page.php?masuk&data=error');
    }

?>