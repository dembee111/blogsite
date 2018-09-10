<?php require 'inc/header.php'; ?>
<?php
    $userid   = Session::get('userId');
    $userrole = Session::get('userRole');
 ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Update Profile</li>
      </ol>
      <!-- Icon Cards-->
      <?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $name = mysqli_real_escape_string($db->link, $_POST['name']);
        $username = mysqli_real_escape_string($db->link, $_POST['username']);
        $email = mysqli_real_escape_string($db->link, $_POST['email']);
        $details = mysqli_real_escape_string($db->link, $_POST['details']);



                $query = "UPDATE Users SET
                          name = '$name',
                          username = '$username',
                          email = '$email',
                          details = '$details'
                           WHERE id = '$userid'";

                $updated_rows = $db->update($query);
                    if ($updated_rows)
                    {
                     echo "<span class='success'>User Profile Updated Successfully.</span>";
                    }
                    else
                    {
                     echo "<span class='error'>User Profile Not Updated !</span>";
                    }
                  }

       ?>
       <?php
        $query = "SELECT * FROM users where id='$userid' AND role = '$userrole'";
        $getuser = $db->select($query);
        if ($getuser) {
            while($result =  $getuser->fetch_assoc()){
        ?>
      <form action="" method="POST">

        <div class="col-md-5 mb-3">
          <label for="validationCustom01">Name</label>
          <input type="text" class="form-control" name="name" id="validationCustom01" value="<?php echo $result['name']; ?>">
          <small id="titleHelpInline" class="text-muted">
            Must be 5-20 characters long.
          </small>
        </div>

        <div class="col-md-5 mb-3">
          <label for="validationCustom01">Username</label>
          <input type="text" class="form-control" name="username" id="validationCustom01" value="<?php echo $result['username']; ?>">
          <small id="titleHelpInline" class="text-muted">
            Must be 5-20 characters long.
          </small>
        </div>

        <div class="col-md-5 mb-3">
          <label for="validationCustom01">Email</label>
          <input type="email" class="form-control" name="email" id="validationCustom01" value="<?php echo $result['email']; ?>">
          <small id="titleHelpInline" class="text-muted">
            Must be 5-20 characters long.
          </small>
        </div>

        <div class="col-md-5 mb-3">
          <label for="validationCustom05">Details</label>
          <textarea class="form-control" name="details" rows="9" id="validationCustom05"><?php echo $result['details']; ?></textarea>
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
