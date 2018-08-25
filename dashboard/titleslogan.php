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
      <!-- Icon Cards-->



      <form class="needs-validation" novalidate>

        <div class="col-md-5 mb-3">
          <label for="validationCustom01">Website title</label>
          <input type="text" class="form-control" name="website_title" id="validationCustom01" placeholder="Enter Copyright" required>
          <div class="invalid-feedback">
            Please provide a valid Website titles.
          </div>
          <small id="titleHelpInline" class="text-muted">
            Must be 5-20 characters long Website title.
          </small>

        </div>

        <div class="col-md-5 mb-3">
          <label for="validationCustom01">Slogan</label>
          <input type="text" class="form-control" name="website_slogan" id="validationCustom02" placeholder="Enter Copyright" required>
          <div class="invalid-feedback">
            Please provide a valid Slogan.
          </div>
          <small id="titleHelpInline" class="text-muted">
            Must be 5-20 characters long Slogan.
          </small>

        </div>


        <button class="btn btn-primary" type="submit">Update</button>

     </form>

  </div>
</div>

    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php require 'inc/footer.php'; ?>
    <?php require 'inc/script.php'; ?>
