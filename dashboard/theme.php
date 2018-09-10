<?php require 'inc/header.php'; ?>

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Change Theme</li>
      </ol>
      <!-- Icon Cards-->

   <?php
   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     $theme = mysqli_real_escape_string($db->link, $_POST['theme']);
     $query = "UPDATE theme SET theme ='$theme' WHERE id = 1";
     $updated_row  = $db->update($query);
      if($updated_row){
        echo "<span class='success col-md-5 mb-3'>Theme Updated Successfully </span>";
      }else{
         echo "<span class='error col-md-5 mb-3'>Theme Not Updated </span>";
      }

   }
     ?>
     <?php
        $query = "SELECT * FROM theme where id='1'";
        $themes = $db->select($query);
        while($result = $themes->fetch_assoc()){
      ?>
        <hr>
      <form action="" method="POST">
        <div class="col-md-8 mb-3">
          <div style="width:250px;height:150px; background-color:#ca932f;">
            <div class="radio">
             <label><input  <?php if ($result['theme']=='default'){echo "checked";} ?>
               type="radio" name="theme" value="default">  Default Theme</label>
            </div>
           </div>
           <div style="width:250px;height:150px; background-color:green;">
             <div class="radio">
              <label><input <?php if ($result['theme']=='green'){echo "checked";} ?>
                type="radio" name="theme" value="green">  Green Theme</label>
             </div>
            </div>
            <div style="width:250px;height:150px; background-color:tomato;">
              <div class="radio">
               <label><input <?php if ($result['theme']=='red'){echo "checked";} ?>
                 type="radio" name="theme" value="red">  Red Theme</label>
              </div>
             </div>
   </div>
   <button type="submit" class="btn btn-info">Change Theme</button>
   </form>
  <?php  } ?>
  </div>
</div>

    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php require 'inc/footer.php'; ?>
    <?php require 'inc/script.php'; ?>
