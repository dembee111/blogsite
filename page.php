<?php include 'inc/header.php'; ?>
<?php include 'inc/slider.php'; ?>
<?php
      $pageid = mysqli_real_escape_string($db->link, $_GET['pageid']);
      if (!isset($pageid) || $pageid==NULL) {
        header("Location: 404.php");

      }else{
        $pageid = $pageid;
      }
 ?>
 <?php
		$pagequery = "SELECT * FROM Page WHERE id='$pageid'";
		$pagedetails = $db->select($pagequery);
		if($pagedetails){
			while($result = $pagedetails->fetch_assoc()){

 ?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">

				<h2><?php echo $result['name']; ?></h2>

				<p><?php echo $result['body']; ?></p>

				</div>
		</div>
	<?php } } else { header("Location:404.php"); }?>
		<?php include 'inc/sidebar.php'; ?>
	  <?php include 'inc/footer.php'; ?>
