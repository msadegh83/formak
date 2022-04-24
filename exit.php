<?php
session_start();
if($_GET['exit'] == 'true'){
    unset($_SESSION['user']);
    unset($_SESSION['pass']);
    unset($_SESSION['time']);
    header("Location: ./login.php");
}
