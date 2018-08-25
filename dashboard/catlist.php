<?php require 'inc/header.php'; ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Эхлэл</a>
        </li>
        <li class="breadcrumb-item active">Post List</li>
      </ol>
      <!-- Table start-->
      <table class="table">
          <label>List of Category</label>
          <?php if (isset($_GET['delcat'])) {
             $delid = $_GET['delcat'];
             $delquery = "DELETE from Category WHERE id='$delid'";
             $deldata = $db->delete($delquery);
             if($deldata){
               echo "<span class='success col-md-5 mb-3'>Category Deleted Successfully </span>";
             }else{
                echo "<span class='error col-md-5 mb-3'>Category Not Deleted </span>";
             }
          } ?>
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                 $query = "SELECT * FROM Category ORDER BY id desc";
                 $category = $db->select($query);
                 if($category){
                   $i = 0;
                   while ($result = $category->fetch_assoc()){
                      $i++;

               ?>
              <tr>
                <th scope="row"><?php echo $i; ?></th>
                <td><?php echo $result['name']; ?></td>
                <td><a href="editcat.php?catid=<?php echo $result['id']; ?>" class="btn btn-info">Edit</a><a onclick="return confirm('Энэ Файлыг устагхдаа итгэлтэй байна уу?')" href="?delcat=<?php echo $result['id']; ?>" class="btn btn-danger">Delete</a></td>
              </tr>
              <?php    }
            } ?>
          </tbody>
      </table>
     <!--end table-->

  </div>
</div>

    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php require 'inc/footer.php'; ?>
    <?php require 'inc/script.php'; ?>
