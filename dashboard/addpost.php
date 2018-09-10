<?php require 'inc/header.php'; ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Create Post</li>
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

        if ($title == "" || $catid == "" ||  $body == "" || $tags=="" || $author =="" ||  $userid =="" || $file_name =="") {
          echo "<span class='error col-md-5 mb-3'>Field must not be empty! </span>";
        }
        elseif ($file_size >1048567)
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
            $query = "INSERT INTO Post(category_id, title, body, image, author, tags, userid) VALUES('$catid', '$title', '$body', '$uploaded_image', '$author', '$userid','$tags')";
            $inserted_rows = $db->insert($query);
                if ($inserted_rows)
                {
                 echo "<span class='success'>Post Inserted Successfully.</span>";
                }
                else
                {
                 echo "<span class='error'>Post Not Inserted !</span>";
                }
      }


      }
       ?>

      <form action="addpost.php" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>

        <div class="col-md-5 mb-3">
          <label for="validationCustom01">Title</label>
          <input type="text" class="form-control" name="title" id="validationCustom01" placeholder="Enter Post Title" required>
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
              <option value="<?php echo $result['id']; ?>"><?php echo $result['name']; ?></option>
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
            <small id="titleHelpInline" class="text-muted">
              Please choose a Upload Picture.
            </small>
          </div>

          <div class="col-md-5 mb-3">
            <label for="validationCustom01">Author</label>
            <input type="text" class="form-control" name="author" readonly id="validationCustom06" value="<?php echo Session::get('username'); ?>" required>
            <input type="hidden" class="form-control" name="userid" readonly id="validationCustom06" value="<?php echo Session::get('userId'); ?>" required>
          </div>         


          <div class="col-md-5 mb-3">
            <label for="validationCustom05">Textarea</label>
            <textarea class="form-control" name="body" rows="9" id="validationCustom05" placeholder="Enter Post Body" required></textarea>
            <div class="invalid-feedback">
              Please provide a valid Textarea.
            </div>
            <small id="titleHelpInline" class="text-muted">
              Must be 50-20000 characters long Text.
            </small>

          </div>

          <div class="col-md-5 mb-3">
            <label for="validationCustom01">Tags</label>
            <input type="text" class="form-control" name="tags" id="validationCustom06" placeholder="Enter Tags name" required>
            <div class="invalid-feedback">
              Please provide a valid Tags.
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
