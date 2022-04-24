<?php
//error_reporting(E_ERROR | E_PARSE);
require_once 'config.php';

$usern = $_POST['username'];
$pass = strtoupper(hash('sha256' , $_POST['password']));

$db = mysqli_connect(Host_name , Username , Password , Database_name);

$q = "SELECT * FROM users WHERE username = '".$usern."' AND password = '".$pass."' ;";
$p = mysqli_query($db , $q);
$res = mysqli_fetch_assoc($p);
$ex_time = time() + 900;
session_start();
if($res == true){
    $_SESSION['ID'] = $res['id'];
    $_SESSION['user'] = $usern;
    $_SESSION['pass'] = $_POST['password'];
    $_SESSION['name'] = $res['name'];
    $_SESSION['email'] = $res['email'];
    $_SESSION['time'] = $ex_time;
    echo 'خوش آمديد';
}else{
    echo "نام کاربری یا رمز عبور نادرست است. لطفا دوباره تلاش کنید";
}