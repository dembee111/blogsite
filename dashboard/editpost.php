<?php require 'inc/header.php'; ?>
<?php
      if (!isset($_GET['editpostid']) || $_GET['editpostid']==NULL) {
        echo "<script>window.location = 'postlist.php';</script>";

      }else{
        $postid = $_GET['editpostid'];
      }
 ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Update Post</li>
      </ol>
      <!-- Icon Cards-->
      <?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $title = mysqli_real_escape_string($db->link, $_POST['title']);
        $catid = mysqli_real_escape_string($db->link, $_POST['category_id']);
        $body = mysqli_real_escape_string($db->link, $_POST['body']);
        $tags = mysqli_real_escape_string($db->link, $_POST['tags']);
        $author = mysqli_real_escape_string($db->link, $_POST['author']);
        $userid = mysqli_real_escape_string($db->link, $_POST['userid']);


        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "upload/".$unique_image;

        if ($title == "" || $catid == "" ||  $body == "" || $tags=="" || $author =="" || $userid =="") {
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
              $query = "UPDATE Post SET
                        category_id = '$catid',
                        title = '$title',
                        body = '$body',
                        image = '$uploaded_image',
                        author = '$author',
                        userid = '$userid',
                        tags = '$tags'
                         WHERE id = '$postid'";

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

                $query = "UPDATE post SET
                          category_id = '$catid',
                          title = '$title',
                          body = '$body',
                          author = '$author',
                          userid = '$userid',
                          tags = '$tags'
                           WHERE id = '$postid'";

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
        $query = "SELECT * FROM post where id='$postid' order by id desc";
        $getpost = $db->select($query);
        while($postresult =  $getpost->fetch_assoc()){

        ?>
      <form action="" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>

        <div class="col-md-5 mb-3">
          <label for="validationCustom01">Title</label>
          <input type="text" class="form-control" name="title" id="validationCustom01" value="<?php echo $postresult['title']; ?>" required>
          <div class="invalid-feedback">
            Please provide a valid Title.
          </div>
          <small id="titleHelpInline" class="text-muted">
            Must be 5-20 characters long.
          </small>


        </div>

          <div class="form-group col-md-5">
            <label for="validationCustom02">Category</label>
            <select id="validationCustom02" name="category_id" class="form-control">
              <option selected>Select Category</option>
              <?php
              $query = "SELECT * FROM Category";
              $category = $db->select($query);
              if($category){
                while($result = $category->fetch_assoc()){

               ?>
              <option
              <?php
              if($postresult['category_id'] == $result['id'] ){ ?>

                  selected ="selected"

            <?php  } ?>
              value="<?php echo $result['id']; ?>"><?php echo $result['name']; ?>
            </option>
            <?php  } }  ?>
            </select>
            <div class="invalid-feedback">
              Please choose a Category.
            </div>
            <small id="titleHelpInline" class="text-muted">
              Choose any Categories.
            </small>


          </div>

          <div class="form-group col-md-5">
            <label for="validationCustom04">Example file input</label>

          <input type="file" class="form-control-file" name="image" id="validationCustom04" />
          <br/>
            <small id="titleHelpInline" class="text-muted">
              <img src="<?php echo $postresult['image']; ?>" height="80px" width="150px" alt="edit_image">
            </small>
          </div>

          <div class="col-md-5 mb-3">
            <label for="validationCustom01">Author</label>
            <input type="text" class="form-control" name="author" readonly id="validationCustom06" value="<?php echo Session::get('username'); ?>" required>
            <input type="hidden" class="form-control" name="userid" readonly id="validationCustom06" value="<?php echo Session::get('userId'); ?>" required>
          </div>

          <div class="col-md-5 mb-3">
            <label for="validationCustom05">Textarea</label>
            <textarea class="form-control" name="body" rows="9" id="validationCustom05" required><?php echo $postresult['body']; ?></textarea>
            <div class="invalid-feedback">
              Please provide a valid Textarea.
            </div>
            <small id="titleHelpInline" class="text-muted">
              Must be 50-20000 characters long Text.
            </small>

          </div>

          <div class="col-md-5 mb-3">
            <label for="validationCustom01">Tags</label>
            <input type="text" class="form-control" name="tags" id="validationCustom06" value="<?php echo $postresult['tags']; ?>" required>
            <div class="invalid-feedback">
              Please provide a valid Tags.
            </div>
            <small id="titleHelpInline" class="text-muted">
              Must be 5-20 characters long.
            </small>
          </div>


  <button class="btn btn-primary" type="submit">Update Post</button>
  <a href="postlist.php"><button class="btn btn-warning" type="button">&nbsp;  Цуцлах  &nbsp;</button></a> 
</form>
<?php } ?>

</div>
</div>

    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php require 'inc/footer.php'; ?>
    <?php require 'inc/script.php'; ?>
