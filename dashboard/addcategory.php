<?php require 'inc/header.php'; ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Add Category</li>
      </ol>
      <!-- Icon Cards-->

   <?php
   if ($_SERVER['REQUEST_METHOD'] == 'POST') {

     $name = $_POST['name'];
     $name = mysqli_real_escape_string($db->link, $name);
     // echo "<span class='error col-md-5 mb-3'>No result found !!</span>";
     if(empty($name)){
        echo "<span class='error col-md-5 mb-3'>Field must not be empty ! </span>";
     }else{
       $query = "INSERT INTO Category(name) VALUES('$name')";
      $catinsert  = $db->insert($query);
      if($catinsert){
        echo "<span class='success col-md-5 mb-3'>Category Inserted Successfully </span>";
      }else{
         echo "<span class='error col-md-5 mb-3'>Category Not Inserted </span>";
      }
     }
   }
     ?>

      <form action="" method="POST" class="needs-validation" novalidate>

        <div class="col-md-5 mb-3">
          <label for="validationCustom01">Add Category</label>
          <input type="text" class="form-control" name="name" id="validationCustom01" placeholder="Категорийн нэрээ оруулна уу!" required>
          <div class="invalid-feedback">
            Please provide a valid Name.
          </div>
          <small id="titleHelpInline" class="text-muted">
            Must be 5-20 characters long.
          </small>

        </div>
        <button class="btn btn-primary" type="submit">Submit form</button>

     </form>

  </div>
</div>

    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php require 'inc/footer.php'; ?>
    <?php require 'inc/script.php'; ?>
