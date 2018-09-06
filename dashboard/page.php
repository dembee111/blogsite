<?php require 'inc/header.php'; ?>
<?php
  if (!isset($_GET['pageid']) || $_GET['pageid']==NULL) {
    echo "<script>window.location = 'index.php';</script>";
    header("Location: catlist.php");
  }else{
    $id = $_GET['pageid'];
  }
 ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Page</li>
      </ol>
      <!-- Icon Cards-->
      <?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $name = mysqli_real_escape_string($db->link, $_POST['name']);
        $body = mysqli_real_escape_string($db->link, $_POST['body']);

        if ($name == "" || $body == "") {
          echo "<span class='error col-md-5 mb-3'>Field must not be empty! </span>";
        }
        else
        {

            $query = "UPDATE Page
                      SET
                      name = '$name',
                      body = '$body'
                      WHERE id = '$id'";
                $updated_row = $db->update($query);
                if ($updated_row)
                {
                 echo "<span class='success'>Page Updated Successfully.</span>";
                }
                else
                {
                 echo "<span class='error'>Page Not Updated !</span>";
                }
      }


      }
       ?>
       <?php
          $pagequery = "SELECT * FROM Page WHERE id='$id'";
          $pagedetails = $db->select($pagequery);
          if($pagedetails){
            while($result = $pagedetails->fetch_assoc()){

       ?>

      <form action="" method="POST">

        <div class="col-md-5 mb-3">
          <label for="validationCustom01">Name</label>
          <input type="text" class="form-control" name="name" id="validationCustom01" value="<?php echo $result['name']; ?>" required>
          <div class="invalid-feedback">
            Please provide a valid Title.
          </div>
          <small id="titleHelpInline" class="text-muted">
            Must be 5-20 characters long.
          </small>


        </div>



          <div class="col-md-5 mb-3">
            <label for="validationCustom05">Textarea</label>
            <textarea class="form-control" name="body" rows="9" id="validationCustom05" required><?php echo $result['body']; ?></textarea>
            <div class="invalid-feedback">
              Please provide a valid Textarea.
            </div>
            <small id="titleHelpInline" class="text-muted">
              Must be 50-20000 characters long Text.
            </small>

          </div>


  <button class="btn btn-primary" type="submit">Add Page</button>
  <a onclick="return confirm('Та устгахад бэлэн үү?');" href="deletepage.php?delpage=<?php echo $result['id']; ?>"><button class="btn btn-secondary" type="button">Delete Page</button></a>
</form>
<?php } } ?>
</div>
</div>

    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php require 'inc/footer.php'; ?>
    <?php require 'inc/script.php'; ?>
