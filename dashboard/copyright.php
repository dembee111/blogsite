<?php require 'inc/header.php'; ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Add Copyright</li>
      </ol>
      <?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        //--validation--from fm object------
        $note = $fm->validation($_POST['note']);


        //-----real_scape------beltgel---------
        $note = mysqli_real_escape_string($db->link, $note);

        if ($note == "") {
          echo "<span class='error col-md-5 mb-3'>Field must not be empty! </span>";
        }else{
          $query = "UPDATE footer SET
                      note = '$note'
                     WHERE id = '1'";

          $updated_rows = $db->update($query);
              if ($updated_rows)
              {
               echo "<span class='success'>Social Updated Successfully.</span>";
              }
              else
              {
               echo "<span class='error'>Social Not Updated !</span>";
              }
        }
      }
         ?>

      <!--get note column from footer table DB-->
      <?php
         $query = "SELECT * FROM footer where id ='1'";
         $copyright = $db->select($query);
         if($copyright){
           while($result = $copyright->fetch_assoc()){

      ?>
      <form action="copyright.php" method="POST">

        <div class="col-md-5 mb-3">
          <label for="validationCustom01">Edit Copyright text</label>
          <input type="text" class="form-control" name="note" id="validationCustom01" value="<?php echo $result['note']; ?>">
          <div class="invalid-feedback">
            Please provide a valid Copyright.
          </div>
          <small id="titleHelpInline" class="text-muted">
            Must be 5-20 characters long Copyright.
          </small>

        </div>
        <button class="btn btn-primary" type="submit">Submit form</button>

     </form>
   <?php } } ?>

  </div>
</div>

    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php require 'inc/footer.php'; ?>
    <?php require 'inc/script.php'; ?>
