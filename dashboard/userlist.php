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
                 <th>Category Name</th>
                 <th>Title</th>
                 <th>Body</th>
                 <th>Image</th>
                 <th>Author</th>
                 <th>Tag</th>
                 <th>Date</th>
               </tr>
             </thead>
             <tfoot>
               <tr>
                 <th>id</th>
                 <th>Category Name</th>
                 <th>Title</th>
                 <th>Body</th>
                 <th>Image</th>
                 <th>Author</th>
                 <th>Tag</th>
                 <th>Date</th>
               </tr>
             </tfoot>
             <tbody>
               <tr>
                 <td>1</td>
                 <td>Javascript</td>
                 <td>Tsahim nom</td>
                 <td>There are many variations of passages of Lorem Ipsum available,
                   but the majority have suffered alteration in some form, by injected humour,
                   or randomised words which don't look even slightly believable.</td>
                   <td>Image/name</td>
                 <td>Admin</td>
                 <td>Programming, Design</td>
                 <td>2018.10.16</td>
               </tr>

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
