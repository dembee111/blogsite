<?php require 'inc/header.php'; ?>
<div class="content-wrapper">

  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Эхлэл</a>
      </li>
      <li class="breadcrumb-item active">Add Title and Slogan</li>
    </ol>
    
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  //--validation--from fm object------
  $title = $fm->validation($_POST['title']);
  $slogan = $fm->validation($_POST['slogan']);

  //-----real_scape------beltgel---------
  $title = mysqli_real_escape_string($db->link, $title);
  $slogan = mysqli_real_escape_string($db->link, $slogan);



  $permited  = array('png');
  $file_name = $_FILES['logo']['name'];
  $file_size = $_FILES['logo']['size'];
  $file_temp = $_FILES['logo']['tmp_name'];

  $div = explode('.', $file_name);
  $file_ext = strtolower(end($div));
  $same_image = 'logo'.'.'.$file_ext;
  $uploaded_image = "upload/".$same_image;

  if ($title == "" || $slogan == "") {
    echo "<span class='error col-md-5 mb-3'>Field must not be empty! </span>";
  }else{

  if(!empty($file_name)){

    if ($file_size >1048567)
    {
        echo "<span class='error'>Image Size should be less then 1MB!</span>";
    }
     elseif (in_array($file_ext, $permited) === false)
     {
        echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
     }
    else
    {
        move_uploaded_file($file_temp, $uploaded_image);
        $query = "UPDATE title_slogan SET
                  title = '$title',
                  slogan = '$slogan',
                  logo = '$uploaded_image'
                   WHERE id = '1'";

        $updated_rows = $db->update($query);
            if ($updated_rows)
            {
             echo "<span class='success'>Post Updated Successfully.</span>";
            }
            else
            {
             echo "<span class='error'>Post Not Updated !</span>";
            }
          }
        }else{

          $query = "UPDATE title_slogan SET
                      title = '$title',
                      slogan = '$slogan'
                     WHERE id = '1'";

          $updated_rows = $db->update($query);
              if ($updated_rows)
              {
               echo "<span class='success'>Post Updated Successfully.</span>";
              }
              else
              {
               echo "<span class='error'>Post Not Updated !</span>";
              }
            }
        }
      }
 ?>


    <?php
       $query = "SELECT * FROM title_slogan where id ='1'";
       $blog_title = $db->select($query);
       if($blog_title){
         while($result = $blog_title->fetch_assoc()){

    ?>

      <!-- Icon Cards-->



      <form action="" method="POST" enctype="multipart/form-data">

              <div class="col-md-5 mb-3">
                <label for="validationCustom01">Website title</label>
                <input type="text" class="form-control" name="title" id="validationCustom01" value="<?php echo $result['title']; ?>" required>
                <div class="invalid-feedback">
                  Please provide a valid Website titles.
                </div>
                <small id="titleHelpInline" class="text-muted">
                  Must be 5-20 characters long Website title.
                </small>
        </div>

        <div class="col-md-5 mb-3">
          <label for="validationCustom01">Slogan</label>
          <input type="text" class="form-control" name="slogan" id="validationCustom02" value="<?php echo $result['slogan']; ?>" required>
          <div class="invalid-feedback">
            Please provide a valid Slogan.
          </div>
          <small id="titleHelpInline" class="text-muted">
            Must be 5-20 characters long Slogan.
          </small>

        </div>
        <div class="col-md-6 mb-3">
          <img src="<?php echo $result['logo']; ?>" height="200px" width="250px" alt="edit_image">
        </div>
        <div class="form-group col-md-5">

          <label for="validationCustom04">Logo input</label>

        <input type="file" class="form-control-file" name="logo" id="validationCustom04" />
          <small id="titleHelpInline" class="text-muted">
            Please choose a Logo image.
          </small>
        </div>


        <button class="btn btn-primary" type="submit">Update</button>

     </form>
  </div>

  <?php
}
} ?>
</div>

    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php require 'inc/footer.php'; ?>
    <?php require 'inc/script.php'; ?>
