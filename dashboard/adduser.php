<?php require 'inc/header.php'; ?>
<?php if (!Session::get('userRole') == '3') {
      echo "<script>window.location = 'index.php';</script>";
}
  ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Add New User</li>
      </ol>
      <!-- Icon Cards-->

   <?php
   if ($_SERVER['REQUEST_METHOD'] == 'POST') {

     $name = $fm->validation($_POST['name']);
     $username = $fm->validation($_POST['username']);
     $password = $fm->validation($_POST['password']);
     $role = $fm->validation($_POST['role']);
     $email = $fm->validation($_POST['email']);
     $details = $fm->validation($_POST['details']);
     $password = md5($password);

     $name  = mysqli_real_escape_string($db->link, $name );
     $username  = mysqli_real_escape_string($db->link, $username );
     $password  = mysqli_real_escape_string($db->link, $password );
     $role  = mysqli_real_escape_string($db->link, $role );
     $email  = mysqli_real_escape_string($db->link, $email );
     $details  = mysqli_real_escape_string($db->link, $details );
     // echo "<span class='error col-md-5 mb-3'>No result found !!</span>";
     if(empty($name) || empty($username) || empty($password) || empty($role) || empty($email) || empty($details)){
        echo "<span class='error col-md-5 mb-3'>Field must not be empty ! </span>";
     }else{
      $mailquery = "SELECT * FROM users where email = '$email' limit 1";
      $mailcheck = $db->select($mailquery);
      if ($mailcheck != false) {
        echo "<span class='error col-md-5 mb-3'>Email Already Exist ! </span>";
      }
     else{
       $query = "INSERT INTO Users(name, username, password, role, email, details) VALUES('$name','$username','$password','$role','$email','$details')";
      $userinsert  = $db->insert($query);
      if($userinsert){
        echo "<span class='success col-md-5 mb-3'>User created Successfully </span>";
      }else{
         echo "<span class='error col-md-5 mb-3'>User Not Created </span>";
      }
     }
   }
 }
     ?>

      <form action="" method="POST">
        <div class="col-md-5 mb-3">
          <label for="validationCustom01">Name</label>
          <input type="text" class="form-control" name="name" id="validationCustom01" placeholder="өөрийн нэрээ оруулна уу!">
          <small id="titleHelpInline" class="text-muted">
            Must be 5-20 characters long.
          </small>
        </div>

        <div class="col-md-5 mb-3">
          <label for="validationCustom01">Username</label>
          <input type="text" class="form-control" name="username" id="validationCustom01" placeholder="Хэрэглэгчийн нэрээ оруулна уу!">
          <small id="titleHelpInline" class="text-muted">
            Must be 5-20 characters long.
          </small>
        </div>

        <div class="col-md-5 mb-3">
          <label for="validationCustom01">Password</label>
          <input type="password" class="form-control" name="password" id="validationCustom01" placeholder="Нууц үгээ оруулна уу!">
          <small id="titleHelpInline" class="text-muted">
            Must be 5-20 characters long.
          </small>
        </div>

        <div class="form-group col-md-5">
          <label for="validationCustom02">User Role</label>
          <select id="validationCustom02" name="role" class="form-control">
            <option selected>Select User Role</option>

            <option value="1">Author</option>
            <option value="2">Editor</option>
            <option value="3">Admin</option>
          </select>
          <small id="titleHelpInline" class="text-muted">
            Choose any Categories.
          </small>
        </div>

        <div class="col-md-5 mb-3">
          <label for="validationCustom01">email</label>
          <input type="email" class="form-control" name="email" id="validationCustom01" placeholder="Цахим хаягаа оруулна уу!">
          <small id="titleHelpInline" class="text-muted">
            Must be 5-20 characters long.
          </small>
        </div>

        <div class="col-md-5 mb-3">
          <label for="validationCustom05">Details</label>
          <textarea class="form-control" name="details" rows="9" id="validationCustom05" placeholder="Хэрэглэгчийн талаар тэмдэглэл оруулна уу!"></textarea>
          <small id="titleHelpInline" class="text-muted">
            Must be 50-20000 characters long Text.
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
