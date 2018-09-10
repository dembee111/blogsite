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
         <i class="fa fa-table"></i> All post list</div>
       <div class="card-body">
         <div class="table-responsive">
           <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="background-color:#c2d6d6;">
             <thead>
               <tr style="background-color:#c2d6d6;">
                 <th width="2%">#</th>
                 <th width="10%">Category</th>
                 <th width="13%">Post Title</th>
                 <th width="18%">Body</th>
                 <th width="10%">Image</th>
                 <th width="5%">Author</th>
                 <th width="5%">Tags</th>
                 <th width="5%">Date</th>
                 <th width="15%">Action</th>
               </tr>
             </thead>
             <tfoot>
               <th width="2%">#</th>
               <th width="10%">Category</th>
               <th width="13%">Post Title</th>
               <th width="18%">Body</th>
               <th width="10%">Image</th>
               <th width="8%">Author</th>
               <th width="8%">Tags</th>
               <th width="8%">Date</th>
               <th width="15%">Action</th>
               </tr>
             </tfoot>
             <tbody>
               <?php
               $query = "SELECT Post.*, Category.name
               FROM Post INNER JOIN Category
               ON Post.category_id = Category.id ORDER BY Post.title DESC";
               $post = $db->select($query);
               if ($post) {
                 $i =0;
                 while($result = $post->fetch_assoc()){
                   $i++;
               ?>
               <tr>
                 <td><?php echo $i; ?></td>
                 <td><?php echo $result['name']; ?></td>
                 <td><?php echo $result['title']; ?></td>
                 <td><?php echo $fm->textShorten($result['body'], 50); ?></td>
                 <td><img src="<?php echo $result['image']; ?>" height="60px" width="80px" /></td>
                 <td><?php echo $result['author']; ?></td>
                 <td><?php echo $result['tags']; ?></td>
                 <td><?php echo $fm->formatDate($result['date']); ?></td>
                 <td>
                   <a href="viewpost.php?viewpostid=<?php echo $result['id']; ?>" class="btn btn-primary">&nbsp;  View  &nbsp;</a >
                  <?php if (Session::get('userId') == $result['userid'] || Session::get('userRole') == '3')
                   { ?>
                     <a href="editpost.php?editpostid=<?php echo $result['id']; ?>" class="btn btn-info">&nbsp;  Edit  &nbsp;</a >
                     <a onclick="return confirm('Are you sure to Delete?'); " href="deletepost.php?delpostid=<?php echo $result['id']; ?>" class="btn btn-danger">Delete</a></td>
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
