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
      <div class="card mb-3">
       <div class="card-header" style="background-color:#c2d6d6;">
         <i class="fa fa-envelope-o"></i> All Message List</div>
       <div class="card-body">
         <div class="table-responsive">
           <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="background-color:#c2d6d6;">
             <thead>
               <tr style="background-color:#c2d6d6;">
                 <th width="2%">#</th>
                 <th width="10%">Name</th>
                 <th width="13%">Number</th>
                 <th width="20%">Email</th>
                 <th width="15%">Message</th>
                 <th width="10%">Date</th>
                 <th width="10%">Action</th>
               </tr>
             </thead>
             <tfoot>
               <th width="2%">#</th>
               <th width="10%">Name</th>
               <th width="13%">Number</th>
               <th width="13%">Email</th>
               <th width="20%">Message</th>
               <th width="10%">Date</th>
               <th width="15%">Action</th>
               </tr>
             </tfoot>
             <tbody>
               <?php
               $query = "SELECT * FROM Contact WHERE status ='0' order by id DESC";
               $message = $db->select($query);
               if ($message) {
                 $i =0;
                 while($result = $message->fetch_assoc()){
                   $i++;
               ?>
               <tr>
                 <td><?php echo $i; ?></td>
                 <td><?php echo $result['firstname']; ?></td>
                 <td><?php echo $result['number']; ?></td>
                 <td><?php echo $result['email']; ?></td>
                 <td><?php echo $fm->textShorten($result['body'], 50); ?></td>
                 <td><?php echo $fm->formatDate($result['date']); ?></td>
                 <td>
                   <a href="viewmsg.php?msgid=<?php echo $result['id']; ?>"><button type="button" class="btn btn-primary">View</button></a>
                   <a href="replaymsg.php?msgid=<?php echo $result['id']; ?>"><button type="button" class="btn btn-success">Repley</button></a>
                   <a href="?seenid=<?php echo $result['id']; ?>"><button type="button" class="btn btn-info">Seen</button></a>
                 </td>
               </tr>
            <?php } } ?>
             </tbody>
           </table>
         </div>
       </div>
       <div class="card mb-3">
        <div class="card-header" style="background-color:#c2d6d6;">
          <i class="fa fa-envelope-open-o"></i> Seen Message</div>
       <div class="card-body">
         <div class="table-responsive">
           <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="background-color:#c2d6d6;">
             <thead>
               <tr style="background-color:#c2d6d6;">
                 <th width="2%">#</th>
                 <th width="10%">Name</th>
                 <th width="13%">Number</th>
                 <th width="20%">Email</th>
                 <th width="15%">Message</th>
                 <th width="10%">Date</th>
                 <th width="10%">Action</th>
               </tr>
             </thead>
             <tfoot>
               <th width="2%">#</th>
               <th width="10%">Name</th>
               <th width="13%">Number</th>
               <th width="13%">Email</th>
               <th width="20%">Message</th>
               <th width="10%">Date</th>
               <th width="15%">Action</th>
               </tr>
             </tfoot>
             <tbody>
               <?php
               $query = "SELECT * FROM Contact";
               $message = $db->select($query);
               if ($message) {
                 $i =0;
                 while($result = $message->fetch_assoc()){
                   $i++;
               ?>
               <tr>
                 <td><?php echo $i; ?></td>
                 <td><?php echo $result['firstname']; ?></td>
                 <td><?php echo $result['number']; ?></td>
                 <td><?php echo $result['email']; ?></td>
                 <td><?php echo $fm->textShorten($result['body'], 50); ?></td>
                 <td><?php echo $fm->formatDate($result['date']); ?></td>
                 <td>
                   <a href="viewmsg.php?msgid=<?php echo $result['id']; ?>"><button type="button" class="btn btn-primary">View</button></a>
                   <a href="replaymsg.php?msgid=<?php echo $result['id']; ?>"><button type="button" class="btn btn-success">Repley</button></a>
                   <a href="?seenid=<?php echo $result['id']; ?>"><button type="button" class="btn btn-info">Seen</button></a>
                 </td>
               </tr>
            <?php } } ?>
             </tbody>
           </table>
         </div>
       </div>
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
