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
        <li class="breadcrumb-item active">View Message</li>
      </ol>
      <!-- Icon Cards-->
      <?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          echo "<script>window.location = 'inbox.php';</script>";
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
          <label for="validationCustom01">Name</label>
          <input type="text" readonly class="form-control" name="firstname" id="validationCustom01" value="<?php echo $result['firstname']; ?>" required>
        </div>

        <div class="col-md-5 mb-3">
          <label for="validationCustom01">Phone Number</label>
          <input type="text" readonly class="form-control" name="number" id="validationCustom01" value="<?php echo $result['number']; ?>" required>
        </div>

        <div class="col-md-5 mb-3">
          <label for="validationCustom01">Email Address</label>
          <input type="email" readonly class="form-control" name="email" id="validationCustom01" value="<?php echo $result['email']; ?>" required>
        </div>

          <div class="col-md-5 mb-3">
            <label for="validationCustom05">Message</label>
            <textarea readonly class="form-control" name="body" rows="9" id="validationCustom05" required><?php echo $result['body']; ?></textarea>
          </div>

          <div class="col-md-5 mb-3">
            <label for="validationCustom01">Date</label>
            <input type="text" readonly class="form-control" name="date" id="validationCustom01" value="<?php echo $fm->formatDate($result['date']); ?>" required>
          </div>
    <button class="btn btn-primary" type="submit">Хаах</button>
  <?php } } ?>
</form>

</div>
</div>

    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php require 'inc/footer.php'; ?>
    <?php require 'inc/script.php'; ?>
