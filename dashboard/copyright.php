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
      <!-- Icon Cards-->



      <form class="needs-validation" novalidate>

        <div class="col-md-5 mb-3">
          <label for="validationCustom01">Edit Copyright text</label>
          <input type="text" class="form-control" name="name" id="validationCustom01" placeholder="Enter Copyright" required>
          <div class="invalid-feedback">
            Please provide a valid Copyright.
          </div>
          <small id="titleHelpInline" class="text-muted">
            Must be 5-20 characters long Copyright.
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
