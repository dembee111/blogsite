<?php include 'inc/header.php'; ?>
<?php include 'inc/slider.php'; ?>
<?php
	 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		 $firstname =$fm->validation($_POST['firstname']);
		 $number =$fm->validation($_POST['number']);
		 $email =$fm->validation($_POST['email']);
		 $body =$fm->validation($_POST['body']);


		 $firstname = mysqli_real_escape_string($db->link, $firstname);
		 $number = mysqli_real_escape_string($db->link, $number);
		 $email = mysqli_real_escape_string($db->link, $email);
		 $body = mysqli_real_escape_string($db->link, $body);

		 $error = "";
		//  if (empty($firstname)) {
		//  	$error = "First name must not be empty !";
		// }
		// elseif (!filter_var($firstname, FILTER_SANITIZE_SPECIAL_CHARS)) {
		// 	$error = "Invalid First Name !";
		// }
		// elseif (empty($number)) {
		// 	$error = "Phone Number must not be empty !";
		// }
		// elseif (!filter_var($number, FILTER_VALIDATE_INT)) {
		// 	$error = "Invalid Phone Number !";
		// }
		// elseif (empty($email)) {
		// 	$error = "Email must not be empty !";
		// }
		// elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		// 	$error = "Invalid Email address !";
		// }
		// elseif (empty($body)) {
		// 	$error = "Body text must not be empty !";
		// }else{

		$errorf = "";
		$errorn = "";
		$errore = "";
		$errorb = "";
		 if(empty($firstname)){
			 $errorf = "First name must not be empty !";
		 }
		 if(empty($number)){
			 $errorn = "Number must not be empty !";
		 }
		 if(empty($email)){
			 $errore = "Email must not be empty !";
		 }
		 if(empty($body)){
			 $errorb = "Body Text must not be empty !";
		 }else{

					$query = "INSERT INTO Contact(firstname, number, email, body) VALUES('$firstname', '$number', '$email','$body')";
					$inserted_rows = $db->insert($query);
					if ($inserted_rows)
					{
					 $msg = "Message Sent Successfully.";
					}
					else
					{
					 $error = "Message not sent!";
					}
		}
	 }
	 ?>
	 <style>
	 	 .cuserror{
			 color: red;
			 float: left;
		 }
	 </style>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<h2>Contact us</h2>
				<?php
           // if (isset($error)) {
           // 	echo "<span style='color:red'>$error</span>";
           // }
					 if (isset($msg)) {
           	echo "<span style='color:green'>$msg</span>";
           }
				 ?>
			<form action="" method="post">
				<table>
				<tr>
					<td>Your First Name:</td>
					<td>
						<?php if (isset($errorf)) {
            	echo "<span class='cuserror'>$errorf</span>";
            } ?>
					<input type="text" name="firstname" placeholder="Enter first name" />
					</td>
				</tr>
				<tr>
					<td>Your Phone Number:</td>
					<td>
						<?php if (isset($errorn)) {
							echo "<span class='cuserror'>$errorf</span>";
						} ?>
					<input type="text" name="number" maxlength="8" placeholder="Enter Phone Number" />
					</td>
				</tr>

				<tr>
					<td>Your Email Address:</td>
					<td>
						<?php if (isset($errore)) {
							echo "<span class='cuserror'>$errore</span>";
						} ?>
					<input type="text" name="email" placeholder="Enter Email Address" />
					</td>
				</tr>
				<tr>
					<td>Your Message:</td>
					<td>
						<?php if (isset($errorb)) {
							echo "<span class='cuserror'>$errorb</span>";
						} ?>
					<textarea name="body"></textarea>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
					<input type="submit" name="submit" value="Send"/>
					</td>
				</tr>
		</table>
	<form>
 </div>

		</div>
		<?php include 'inc/sidebar.php'; ?>
	  <?php include 'inc/footer.php'; ?>
