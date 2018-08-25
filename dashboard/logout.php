<?php
include '../lib/Session.php';



session_start();
unset($_SESSION['login']);
header('Location: login.php');
?>
