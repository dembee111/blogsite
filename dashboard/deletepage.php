<?php
 include '../lib/Session.php';
Session::checkSession();

 include '../config/config.php';
 include '../lib/Database.php';


 $db = new Database();

 if (!isset($_GET['delpage']) || $_GET['delpage']==NULL) {
   echo "<script>window.location = 'index.php';</script>";

 }else{
    $pageid = $_GET['delpage'];
    $delquery = "DELETE from Page where id = '$pageid'";
    $delData = $db->delete($delquery);
    if($delData){
      echo "<script>alert('Page Delete Successfully')</script>";
      echo "<script>window.location = 'index.php';</script>";
    }else{
      echo "<script>alert('Page Not Deleted')</script>";
      echo "<script>window.location = 'index.php';</script>";
    }
 }



 ?>
