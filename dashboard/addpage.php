<?php require 'inc/header.php'; ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Update Page</li>
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

            $query = "INSERT INTO Page(name, body) VALUES('$name', '$body')";
            $inserted_rows = $db->insert($query);
                if ($inserted_rows)
                {
                 echo "<span class='success'>Page Created Successfully.</span>";
                }
                else
                {
                 echo "<span class='error'>Page Not Created !</span>";
                }
      }


      }
       ?>

      <form action="" method="POST">

        <div class="col-md-5 mb-3">
          <label for="validationCustom01">Name</label>
          <input type="text" class="form-control" name="name" id="validationCustom01" placeholder="Enter Post Title" required>
          <div class="invalid-feedback">
            Please provide a valid Title.
          </div>
          <small id="titleHelpInline" class="text-muted">
            Must be 5-20 characters long.
          </small>


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


  <button class="btn btn-primary" type="submit">Update page</button>
  
</form>

</div>
</div>

    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php require 'inc/footer.php'; ?>
    <?php require 'inc/script.php'; ?>
