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



      <form class="needs-validation" novalidate>

        <div class="col-md-5 mb-3">
          <label for="validationCustom01">Google plus</label>
          <input type="text" class="form-control" name="google" id="validationCustom01" placeholder="Enter Copyright" required>
          <div class="invalid-feedback">
            Please provide a valid Google plus Links.
          </div>
          <small id="titleHelpInline" class="text-muted">
            Must be 5-20 characters long Google plus Links.
          </small>

        </div>

        <div class="col-md-5 mb-3">
          <label for="validationCustom01">Facebook</label>
          <input type="text" class="form-control" name="facebook" id="validationCustom02" placeholder="Enter Copyright" required>
          <div class="invalid-feedback">
            Please provide a valid Facebook Links.
          </div>
          <small id="titleHelpInline" class="text-muted">
            Must be 5-20 characters long Facebook Links.
          </small>

        </div>

        <div class="col-md-5 mb-3">
          <label for="validationCustom01">Twitter</label>
          <input type="text" class="form-control" name="twitter" id="validationCustom03" placeholder="Enter Copyright" required>
          <div class="invalid-feedback">
            Please provide a valid Twitter Links.
          </div>
          <small id="titleHelpInline" class="text-muted">
            Must be 5-20 characters long Twitter Links.
          </small>

        </div>

        <div class="col-md-5 mb-3">
          <label for="validationCustom01">Linkedin</label>
          <input type="text" class="form-control" name="linkedin" id="validationCustom04" placeholder="Enter Copyright" required>
          <div class="invalid-feedback">
            Please provide a valid Linkedin Links.
          </div>
          <small id="titleHelpInline" class="text-muted">
            Must be 5-20 characters long Linkedin Links.
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
