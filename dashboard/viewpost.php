<?php require 'inc/header.php'; ?>
<?php
      if (!isset($_GET['viewpostid']) || $_GET['viewpostid']==NULL) {
        echo "<script>window.location = 'postlist.php';</script>";

      }else{
        $postid = $_GET['viewpostid'];
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
             echo "<script>window.location = 'postlist.php';</script>";
        }
       ?>
       <?php
        $query = "SELECT * FROM post where id='$postid' order by id desc";
        $getpost = $db->select($query);
        while($postresult =  $getpost->fetch_assoc()){

        ?>
      <form action="" method="POST">

        <div class="col-md-5 mb-3">
          <label for="validationCustom01">Title</label>
          <input type="text" class="form-control" readonly id="validationCustom01" value="<?php echo $postresult['title']; ?>" required>
          <div class="invalid-feedback">
            Please provide a valid Title.
          </div>
          <small id="titleHelpInline" class="text-muted">
            Must be 5-20 characters long.
          </small>


        </div>

          <div class="form-group col-md-5">
            <label for="validationCustom02">Category</label>
            <select id="validationCustom02" readonly class="form-control">
              <option selected>Select Category</option>
              <?php
              $query = "SELECT * FROM Category";
              $category = $db->select($query);
              if($category){
                while($result = $category->fetch_assoc()){

               ?>
              <option readonly
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
            <label for="validationCustom04">Image</label>
          <br/>
            <small id="titleHelpInline" class="text-muted">
              <img src="<?php echo $postresult['image']; ?>" height="250px" width="300px" alt="edit_image">
            </small>
          </div>

          <div class="col-md-5 mb-3">
            <label for="validationCustom01">Author</label>
            <input type="text" class="form-control" name="author" readonly id="validationCustom06" value="<?php echo Session::get('username'); ?>" required>
            <input type="hidden" class="form-control" name="userid" readonly id="validationCustom06" value="<?php echo Session::get('userId'); ?>" required>
          </div>

          <div class="col-md-5 mb-3">
            <label for="validationCustom05">Textarea</label>
            <textarea class="form-control" readonly rows="9" id="validationCustom05" required><?php echo $postresult['body']; ?></textarea>
            <div class="invalid-feedback">
              Please provide a valid Textarea.
            </div>
            <small id="titleHelpInline" class="text-muted">
              Must be 50-20000 characters long Text.
            </small>

          </div>

          <div class="col-md-5 mb-3">
            <label for="validationCustom01">Tags</label>
            <input type="text" class="form-control" readonly id="validationCustom06" value="<?php echo $postresult['tags']; ?>" required>
            <div class="invalid-feedback">
              Please provide a valid Tags.
            </div>
            <small id="titleHelpInline" class="text-muted">
              Must be 5-20 characters long.
            </small>
          </div>


  <button class="btn btn-primary" type="submit">&nbsp;&nbsp;&nbsp;Буцах&nbsp;&nbsp;&nbsp;</button>

</form>
<?php } ?>

</div>
</div>

    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php require 'inc/footer.php'; ?>
    <?php require 'inc/script.php'; ?>
