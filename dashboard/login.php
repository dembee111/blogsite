<?php include '../lib/Session.php';
Session::checkLogin();
?>
<?php include '../config/config.php'; ?>
<?php include '../lib/Database.php'; ?>
<?php include '../helpers/Format.php'; ?>
<?php
 $db = new Database();
 $fm = new Format();

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Login page</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Нэвтрэх</div>
      <div class="card-body">
        <?php
           if ($_SERVER['REQUEST_METHOD'] == 'POST') {
             $username =$fm->validation($_POST['username']);
             $password =$fm->validation(md5($_POST['password']));
             $username = mysqli_real_escape_string($db->link, $username);
             $password = mysqli_real_escape_string($db->link, $password);


             $query ="SELECT * FROM users WHERE username = '$username' AND password='$password'";

             $result = $db->select($query);
             if($result != false){
               // $value = mysqli_fetch_array($result);
               // $row = mysqli_num_rows($result);
                  $value = $result->fetch_assoc();

                    Session::set("login", true);
                    Session::set("username", $value['username']);
                    Session::set("userId", $value['id']);
                    Session::set("userRole", $value['role']);
                    header("Location:index.php");

             }else{
               echo "<span style='color:red; font-size:18px;'>Username or Password not matched !!.</span>";
             }

           }
         ?>
        <form action="login.php" method="POST">
          <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input class="form-control" name="username" type="text" aria-describedby="emailHelp" placeholder="Enter Username">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control" name="password" id="exampleInputPassword1" type="password" placeholder="Password">
          </div>
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Remember Password</label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block" >Login</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="register.html">Register an Account</a>
          <a class="d-block small" href="forgetpass.php">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
