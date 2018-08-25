<?php require 'inc/header.php'; ?>
<?php
  if (!isset($_GET['catid']) || $_GET['catid']==NULL) {
    echo "<script>window.location = 'catlist.php';</script>";
    header("Location: catlist.php");
  }else{
    $id = $_GET['catid'];
  }
 ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Update Category</li>
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
       $query = "UPDATE Category SET name ='$name' WHERE id='$id'";
      $updated_row  = $db->update($query);
      if($updated_row){
        echo "<span class='success col-md-5 mb-3'>Category Updated Successfully </span>";
      }else{
         echo "<span class='error col-md-5 mb-3'>Category Not Updated </span>";
      }
     }
   }
     ?>
     <?php
        $query = "SELECT * FROM Category where id='$id' order by id desc";
        $category = $db->select($query);
        while($result = $category->fetch_assoc()){
      ?>

      <form action="" method="POST" class="needs-validation" novalidate>

        <div class="col-md-5 mb-3">
          <label for="validationCustom01">Update Category</label>
          <input type="text" class="form-control" name="name" id="validationCustom01" value="<?php echo $result['name']; ?>" required>
          <div class="invalid-feedback">
            Please provide a valid Name.
          </div>
          <small id="titleHelpInline" class="text-muted">
            Must be 5-20 characters long.
          </small>

        </div>
        <button class="btn btn-primary" type="submit">Submit form</button>

     </form>
  <?php } ?>
  </div>
</div>

    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php require 'inc/footer.php'; ?>
    <?php require 'inc/script.php'; ?>
