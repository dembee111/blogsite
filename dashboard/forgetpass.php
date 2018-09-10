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
      <div class="card-header">Нууц үгээ сэргээх</div>
      <div class="card-body">
        <div class="text-center mt-4 mb-5">
          <h4>Нууц үгээ мартсан уу ?</h4>
          <p>Имэйл хаягаа оруулнауу бид таны хаяг руу нууц үг сэргээх линкийг илгээх болноо.</p>
        </div>
        <?php
           if ($_SERVER['REQUEST_METHOD'] == 'POST') {
             $email = $fm->validation($_POST['email']);
             $email = mysqli_real_escape_string($db->link, $email);
             if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
               
               echo "<span style='color:red; font-size:18px;'>Invalid Email Address !</span>";
             }else{

             $mailquery = "SELECT * FROM users where email = '$email' limit 1";
             $mailcheck = $db->select($mailquery);

             if($mailcheck != false){
                     while ($value = $mailcheck->fetch_assoc()){
                       $userid   = $value['id'];
                       $username = $value['username'];
                     }
                $text = substr($email, 0, 3);
                $rand = rand(10000, 99999);
                $newpass = "$text$rand";
                $password = md5($newpass);
                $updatequery = "UPDATE Users SET password = '$password' WHERE id = '$userid'";
                $updated_row = $db->update($updatequery);
                $to = "$email";
                $from = "minion.ck@gmail.com";
                $headers = "From: $from\n";
                $headers .= 'MIME-Version: 1.0';
                $headers .= 'Content-type: text/html; charset=iso-8859-1';
                $subject = "Your password";
                $message = "Your Username is ".$username." and Password is ".$newpass." Please visit website to login.";

                $sendmail = mail($to, $subject, $message, $headers);
                if ($sendmail) {
                  echo "<span style='color:green; font-size:18px;'>Please Check Your Email fo new password !!.</span>";
                }else{
                  echo "<span style='color:red; font-size:18px;'>Email Not Sent !! </span>";
               }
             }
             else{
               echo "<span style='color:red; font-size:18px;'>Email Not Exists !!.</span>";
             }
           }

           }
         ?>
         <form action="" method="POST">
           <div class="form-group">
             <input class="form-control" id="exampleInputEmail1" name="email" type="email" aria-describedby="emailHelp" placeholder="Enter email address">
           </div>
           <button class="btn btn-primary btn-block" type="submit">Reset Password</button>
         </form>
         <div class="text-center">
            <a class="d-block small" href="login.php">Login Page</a>
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
