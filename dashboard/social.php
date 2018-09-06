<?php require 'inc/header.php'; ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Эхлэл</a>
        </li>
        <li class="breadcrumb-item active">Add Social</li>
      </ol>
      <!-- Icon Cards-->
      <?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        //--validation--from fm object------
        $gp = $fm->validation($_POST['gp']);
        $fb = $fm->validation($_POST['fb']);
        $tw = $fm->validation($_POST['tw']);
        $ln = $fm->validation($_POST['ln']);

        //-----real_scape------beltgel---------
        $gp = mysqli_real_escape_string($db->link, $gp);
        $fb = mysqli_real_escape_string($db->link, $fb);
        $tw = mysqli_real_escape_string($db->link, $tw);
        $ln = mysqli_real_escape_string($db->link, $ln);
        if ($gp == "" || $fb == "" || $tw == "" || $ln == "") {
          echo "<span class='error col-md-5 mb-3'>Field must not be empty! </span>";
        }else{
          $query = "UPDATE social SET
                      gp = '$gp',
                      fb = '$fb',
                      tw = '$tw',
                      ln = '$ln'
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


      <?php
         $query = "SELECT * FROM social where id ='1'";
         $social = $db->select($query);
         if($social){
           while($result = $social->fetch_assoc()){

      ?>
      <form action="" method="POST" class="needs-validation" novalidate>

        <div class="col-md-5 mb-3">
          <label for="validationCustom01">Google plus</label>
          <input type="text" class="form-control" name="gp" id="validationCustom01" value="<?php echo $result['gp']; ?>" required>
          <div class="invalid-feedback">
            Please provide a valid Google plus Links.
          </div>
          <small id="titleHelpInline" class="text-muted">
            Must be 5-20 characters long Google plus Links.
          </small>

        </div>

        <div class="col-md-5 mb-3">
          <label for="validationCustom01">Facebook</label>
          <input type="text" class="form-control" name="fb" id="validationCustom02" value="<?php echo $result['fb']; ?>" required>
          <div class="invalid-feedback">
            Please provide a valid Facebook Links.
          </div>
          <small id="titleHelpInline" class="text-muted">
            Must be 5-20 characters long Facebook Links.
          </small>

        </div>

        <div class="col-md-5 mb-3">
          <label for="validationCustom01">Twitter</label>
          <input type="text" class="form-control" name="tw" id="validationCustom03" value="<?php echo $result['tw']; ?>" required>
          <div class="invalid-feedback">
            Please provide a valid Twitter Links.
          </div>
          <small id="titleHelpInline" class="text-muted">
            Must be 5-20 characters long Twitter Links.
          </small>

        </div>

        <div class="col-md-5 mb-3">
          <label for="validationCustom01">Linkedin</label>
          <input type="text" class="form-control" name="ln" id="validationCustom04" value="<?php echo $result['ln']; ?>" required>
          <div class="invalid-feedback">
            Please provide a valid Linkedin Links.
          </div>
          <small id="titleHelpInline" class="text-muted">
            Must be 5-20 characters long Linkedin Links.
          </small>

        </div>
        <button class="btn btn-primary" type="submit">Update</button>

     </form>
  <?php } } ?>
  </div>
</div>

    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php require 'inc/footer.php'; ?>
    <?php require 'inc/script.php'; ?>
