<?php require 'inc/header.php'; ?>
<?php
      if (!isset($_GET['sliderid']) || $_GET['sliderid']==NULL) {
        echo "<script>window.location = 'sliderlist.php';</script>";

      }else{
        $sliderid = $_GET['sliderid'];
      }
 ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Update Slider Image</li>
      </ol>
      <!-- Icon Cards-->
      <?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = mysqli_real_escape_string($db->link, $_POST['title']);
        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "upload/slider/".$unique_image;

        if ($title == "") {
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
              $query = "UPDATE slider SET
                        title = '$title',
                        image = '$uploaded_image',
                         WHERE id = '$sliderid'";

              $updated_rows = $db->update($query);
                  if ($updated_rows)
                  {
                   echo "<span class='success'>Slider Updated Successfully.</span>";
                  }
                  else
                  {
                   echo "<span class='error'>Slider Not Updated !</span>";
                  }
                }
              }else{

                $query = "UPDATE slider SET
                          title = '$title'
                           WHERE id = '$sliderid'";

                $updated_rows = $db->update($query);
                    if ($updated_rows)
                    {
                     echo "<span class='success'>Slider Updated Successfully.</span>";
                    }
                    else
                    {
                     echo "<span class='error'>Slider Not Updated !</span>";
                    }
                  }
              }
            }
       ?>
       <?php
        $query = "SELECT * FROM slider where id='$sliderid'";
        $getslider = $db->select($query);
        while($result =  $getslider->fetch_assoc()){

        ?>
      <form action="" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>

        <div class="col-md-5 mb-3">
          <label for="validationCustom01">Title</label>
          <input type="text" class="form-control" name="title" id="validationCustom01" value="<?php echo $result['title']; ?>" required>
        </div>


          <div class="form-group col-md-5">
            <label for="validationCustom04">Example file input</label>

          <input type="file" class="form-control-file" name="image" id="validationCustom04" />
          <br/>
            <small id="titleHelpInline" class="text-muted">
              <img src="<?php echo $result['image']; ?>" height="80px" width="150px" alt="edit_image">
            </small>
          </div>

  <button class="btn btn-primary" type="submit">Update Slider</button>
  <a href="postlist.php"><button class="btn btn-warning" type="button">&nbsp;  Цуцлах  &nbsp;</button></a>
</form>
<?php } ?>

</div>
</div>

    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php require 'inc/footer.php'; ?>
    <?php require 'inc/script.php'; ?>
