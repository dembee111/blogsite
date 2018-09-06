<?php require 'inc/header.php'; ?>
<?php
  if (!isset($_GET['msgid']) || $_GET['msgid']==NULL) {
    echo "<script>window.location = 'inbox.php';</script>";
    header("Location: catlist.php");
  }else{
    $id = $_GET['msgid'];
  }
 ?>

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Replay Message</li>
      </ol>
      <!-- Icon Cards-->
      <?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $to = $fm->validation($_POST['toEmail']);
          $from = $fm->validation($_POST['fromEmail']);
          $subject = $fm->validation($_POST['subject']);
          $message = $fm->validation($_POST['message']);
          $sendmail = mail($to, $subject, $message, $from);

          if($sendmail){
            echo "<span class='success'>Message Sent Successfully.</span>";
          }
          else{
            echo "<span class='error'>Message Not Sent Successfully.</span>";
          }
      }
       ?>

      <form action="" method="POST">
        <?php
        $query = "SELECT * FROM Contact WHERE id = '$id'";
        $message = $db->select($query);
        if ($message) {
          $i =0;
          while($result = $message->fetch_assoc()){
            $i++;
        ?>
        <div class="col-md-5 mb-3">
          <label for="validationCustom01">To</label>
          <input type="text" readonly class="form-control" name="toEmail" id="validationCustom01" value="<?php echo $result['email']; ?>" required>
        </div>



        <div class="col-md-5 mb-3">
          <label for="validationCustom01">From</label>
          <input type="email" class="form-control" name="fromEmail" id="validationCustom01" placeholder="Please  Enter your Email Address" required>
        </div>

        <div class="col-md-5 mb-3">
          <label for="validationCustom01">Subject</label>
          <input type="text" class="form-control" name="subject" id="validationCustom01" placeholder="Please Enter Subject" required>
        </div>

          <div class="col-md-5 mb-3">
            <label for="validationCustom05">Message</label>
            <textarea class="form-control" name="message" rows="9" placeholder="Захидалаа бичнэ үү" id="validationCustom05" required></textarea>
          </div>


    <button class="btn btn-primary" type="submit">Илгээх</button>
  <?php } } ?>
</form>

</div>
</div>

    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php require 'inc/footer.php'; ?>
    <?php require 'inc/script.php'; ?>
