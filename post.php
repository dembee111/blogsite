<?php include 'inc/header.php'; ?>
<?php include 'inc/slider.php'; ?>
<?php
     $postid = mysqli_real_escape_string($db->link, $_GET['id']);
     if(!isset($postid) || $postid==null){
			 header("Location : 404.php");
		 }else{
			 $id = $postid;
		 }
 ?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<?php
           $query = "SELECT * FROM post where id = $id";
					 $post = $db->select($query);
					 if($post){
						 while($result = $post->fetch_assoc()){
				 ?>
				<h2><?php echo $result['title']; ?></h2>
				<h4><?php echo $fm->formatDate($result['date']); ?>, By <a href="#"><?php echo $result['author']; ?></a></h4>
				<img src="dashboard/<?php echo $result['image']; ?>" alt="post image"/>
				<?php echo $result['body']; ?>
        <a href="index.php" type="button" class="btn btn-info">Буцах</a>
				<div class="relatedpost clear">
					<h2>Related articles</h2>
					<?php
             $catid = $result['category_id'];;
						 $queryrelated = "SELECT * FROM post where category_id = '$catid' order by rand() limit 6";
						 $relatedpost = $db->select($queryrelated);
						 if($relatedpost){
							 while($rresult = $relatedpost->fetch_assoc()){
					 ?>

					<a href="post.php?id=<?php echo $rresult['id']; ?>">
						<img src="dashboard/<?php echo $rresult['image']; ?>" alt="post image"/>
					</a>
				<?php }} else{echo "No Related Post available !!";} ?>
				</div>
			<?php } } else { header("Location: 404.php"); } ?>
	</div>

		</div>
		<?php include 'inc/sidebar.php'; ?>
		<?php include 'inc/footer.php'; ?>
