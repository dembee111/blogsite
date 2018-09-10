<?php
 include '../lib/Session.php';
Session::checkSession();

 include '../config/config.php';
 include '../lib/Database.php';
 include '../helpers/Format.php';

 $db = new Database();

 if (!isset($_GET['sliderid']) || $_GET['sliderid']==NULL) {
   echo "<script>window.location = 'sliderlist.php';</script>";

 }else{
   $sliderid = $_GET['sliderid'];

    $query = "SELECT * FROM slider WHERE id = '$sliderid'";
    $getData = $db->select($query);
    if($getData){
      while($delimg = $getData->fetch_assoc()){
        $dellink = $delimg['image'];
        unlink($dellink);
      }
    }

    $delquery = "DELETE from slider where id = '$sliderid'";
    $delData = $db->delete($delquery);
    if($delData){
      echo "<script>alert('Data Delete Successfully')</script>";
      echo "<script>window.location = 'sliderlist.php';</script>";
    }else{
      echo "<script>alert('Data Not Deleted')</script>";
      echo "<script>window.location = 'sliderlist.php';</script>";
    }
 }



 ?>
