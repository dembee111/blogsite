
<?php include 'inc/header.php'; ?>
<?php include 'inc/slider.php'; ?>
<style>
.pagination{
  display: block;font-size: 20px; margin-top: 10px; padding: 10px; text-align: center;
}
.pagination a{
   background: #e6af4b none repeat scroll 0 0;
   border: 1px solid #a7700c;
   border-radius: 3px;
   text-decoration: none;
   color: #333;
   padding: 2px 10px;
   margin-left:2px;

}

.pagination a:hover{
   background: #be8723 none repeat scroll 0 0;
   color: #fff;
}
</style>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
    <!--pagination-->
    <?php
        $per_page = 3;
        if(isset($_GET["page"])){
          $page =$_GET["page"];

        }else{
          $page = 1;

        }
        $start_form = ($page-1) * $per_page;
    ?>
    <!--pagination_end-->
    <?php
       $query = "SELECT * FROM post limit $start_form, $per_page";
			 $post = $db->select($query);
			 if($post){
            while($result = $post->fetch_assoc()){

		 ?>

			<div class="samepost clear">
				<h2><a href="post.php?id=<?php echo $result['id']; ?>"><?php echo $result['title']; ?></a></h2>
				<h4><?php echo $fm->formatDate($result['date']); ?>, By <a href="#"><?php echo $result['author']; ?></a></h4>
				 <a href="post.php?id=<?php echo $result['id']; ?>"><img src="dashboard/<?php echo $result['image']; ?>" alt="post image"/></a>

				<?php echo $fm->textShorten($result['body']); ?>

				<div class="readmore clear">
					<a href="post.php?id=<?php echo $result['id']; ?>">Read More</a>
				</div>
			</div>

		<?php } ?><!--end while-->

    <!--pagination----->
      <?php
      $query = "SELECT * FROM post";
      $result = $db->select($query);
      $total_rows = mysqli_num_rows($result);
      $total_pages = ceil($total_rows/$per_page);
      echo "<span class='pagination'><a href='index.php?page=1'>".'First Page'."</a>";

       for($i = 1; $i<= $total_pages; $i++){

           echo "<a href='index.php?page=".$i."'>".$i."</a>";
       };

       echo "<a href='index.php?page=$total_pages'>".'Last Page'."</a></span>" ?>
    <!--end---->
    <?php }else{ header("Location:404.php");} ?>




		</div>
		<?php include 'inc/sidebar.php'; ?>
	  <?php include 'inc/footer.php'; ?>
