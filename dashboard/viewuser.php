<?php require 'inc/header.php'; ?>
<?php
  if (!isset($_GET['userid']) || $_GET['userid']==NULL) {
    echo "<script>window.location = 'catlist.php';</script>";
    header("Location: catlist.php");
  }else{
    $id = $_GET['userid'];
  }
 ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">User Details</li>
      </ol>
      <!-- Icon Cards-->
      <?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo "<script>window.location = 'userlist.php';</script>";
        }

       ?>
       <?php
        $query = "SELECT * FROM users where id='$id'";
        $getuser = $db->select($query);
        if ($getuser) {
            while($result =  $getuser->fetch_assoc()){
        ?>
      <form action="" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>

        <div class="col-md-5 mb-3">
          <label for="validationCustom01">Name</label>
          <input type="text" readonly class="form-control" name="name" id="validationCustom01" value="<?php echo $result['name']; ?>">
          <small id="titleHelpInline" class="text-muted">
            Must be 5-20 characters long.
          </small>
        </div>

        <div class="col-md-5 mb-3">
          <label for="validationCustom01">Username</label>
          <input type="text" readonly class="form-control" name="username" id="validationCustom01" value="<?php echo $result['username']; ?>">
          <small id="titleHelpInline" class="text-muted">
            Must be 5-20 characters long.
          </small>
        </div>

        <div class="col-md-5 mb-3">
          <label for="validationCustom01">Email</label>
          <input type="email" readonly class="form-control" name="email" id="validationCustom01" value="<?php echo $result['email']; ?>">
          <small id="titleHelpInline" class="text-muted">
            Must be 5-20 characters long.
          </small>
        </div>

        <div class="col-md-5 mb-3">
          <label for="validationCustom05">Details</label>
          <textarea readonly class="form-control" name="details" rows="9" id="validationCustom05"><?php echo $result['details']; ?></textarea>
          <small id="titleHelpInline" class="text-muted">
            Must be 50-20000 characters long Text.
          </small>

        </div>



  <button class="btn btn-primary" type="submit">Update Profile</button>
</form>
<?php } }?>

</div>
</div>

    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php require 'inc/footer.php'; ?>
    <?php require 'inc/script.php'; ?>
