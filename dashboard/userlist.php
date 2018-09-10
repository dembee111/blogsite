<?php require 'inc/header.php'; ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Эхлэл</a>
        </li>
        <li class="breadcrumb-item active">All User List</li>
      </ol>
      <?php if (isset($_GET['deluser'])) {
         $delid = $_GET['deluser'];
         $delquery = "DELETE from Users WHERE id='$delid'";
         $deldata = $db->delete($delquery);
         if($deldata){
           echo "<span class='success col-md-5 mb-3'>User Deleted Successfully </span>";
         }else{
            echo "<span class='error col-md-5 mb-3'>User Not Deleted </span>";
         }
      } ?>
      <!-- Table start-->
      <div class="card mb-3">
       <div class="card-header">
         <i class="fa fa-table"></i> All user list</div>
       <div class="card-body">
         <div class="table-responsive">
           <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
             <thead>
               <tr>
                 <th>id</th>
                 <th>Name</th>
                 <th>Username</th>
                 <th>Email</th>
                 <th>Details</th>
                 <th>Role</th>
                 <th>Date</th>
                 <th>Actions</th>
               </tr>
             </thead>
             <tfoot>
               <tr>
                 <th>id</th>
                 <th>Name</th>
                 <th>Username</th>
                 <th>Email</th>
                 <th>Details</th>
                 <th>Role</th>
                 <th>Date</th>
                 <th>Actions</th>
               </tr>
             </tfoot>
             <tbody>
               <?php
               $query = "SELECT * FROM Users Order by id ASC";
               $userlist = $db->select($query);
               if ($userlist) {
                 $i =0;
                 while($result = $userlist->fetch_assoc()){
                   $i++;
               ?>
               <tr>
                 <td><?php echo $i; ?></td>
                 <td><?php echo $result['name']; ?></td>
                 <td><?php echo $result['username']; ?></td>
                 <td><?php echo $result['email']; ?></td>
                 <td><?php echo $fm->textShorten($result['details'], 30); ?></td>
                 <td>
                   <?php
                         if ($result['role'] == '3') {
                           echo "Admin";
                         }elseif($result['role'] == '1'){
                           echo "Author";
                         }elseif($result['role'] == '2'){
                           echo "Editor";
                         }
                    ?>
               </td>
                 <td><?php echo $result['date']; ?></td>
                 <td>
                   <a href="viewUser.php?userid=<?php echo $result['id']; ?>" class="btn btn-info">&nbsp;  View  &nbsp;</a >
                  <?php if (Session::get('userRole') == '3') { ?>
                   <a onclick="return confirm('Are you sure to Delete?'); " href="?deluser=<?php echo $result['id']; ?>" class="btn btn-danger">Delete</a>
                 <?php } ?>
                 </td>
               </tr>
              <?php } } ?>
             </tbody>
           </table>
         </div>
       </div>
       <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
     </div>
     <!--end table-->

  </div>
</div>

    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php require 'inc/footer.php'; ?>
    <?php require 'inc/script.php'; ?>
