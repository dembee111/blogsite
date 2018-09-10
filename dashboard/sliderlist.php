<?php require 'inc/header.php'; ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Эхлэл</a>
        </li>
        <li class="breadcrumb-item active"> Slider List</li>
      </ol>
      <!-- Table start-->
      <div class="card mb-3">
       <div class="card-header" style="background-color:#c2d6d6;">
         <i class="fa fa-table"></i> Slider List</div>
       <div class="card-body">
         <div class="table-responsive">
           <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="background-color:#c2d6d6;">
             <thead>
               <tr style="background-color:#c2d6d6;">
                 <th width="5%">#</th>
                 <th width="20%">Slider Title</th>
                 <th width="45%">Slider Image</th>
                 <th width="20%">Action</th>
               </tr>
             </thead>
             <tfoot>
               <th width="5%">#</th>
               <th width="20%">Slider Title</th>
               <th width="45%">Slider Image</th>
               <th width="20%">Action</th>
               </tr>
             </tfoot>
             <tbody>
               <?php
               $query = "SELECT * FROM slider";
               $slider = $db->select($query);
               if ($slider) {
                 $i =0;
                 while($result = $slider->fetch_assoc()){
                   $i++;
               ?>
               <tr>
                 <td><?php echo $i; ?></td>
                 <td><?php echo $result['title']; ?></td>
                 <td><img src="<?php echo $result['image']; ?>" height="280" width="960" /></td>
                 <td>
                  <?php if (Session::get('userRole') == '3')
                   { ?>
                     <a href="editslider.php?sliderid=<?php echo $result['id']; ?>" class="btn btn-info">&nbsp;  Edit  &nbsp;</a >
                     <a onclick="return confirm('Are you sure to Delete?'); " href="delslider.php?sliderid=<?php echo $result['id']; ?>" class="btn btn-danger">Delete</a></td>
                <?php  } ?>

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
