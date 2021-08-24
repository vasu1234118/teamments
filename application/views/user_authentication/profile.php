<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>CodeIgniter Google Login by CodexWorld</title>
<link rel="stylesheet" href="<?php echo base_url().'assets/css/style.css'; ?>"/>
</head>
<body>
<div class="container">
	<div class="wrapper">
		<h2>Google Account Details</h2>
		<div class="ac-data">
			<!-- Display Google profile information -->
			<img src="<?php echo $userData['picture']; ?>"/>
			<p><b>Google ID:</b> <?php echo $userData['oauth_uid']; ?></p>
			<p><b>Name:</b> <?php echo $userData['fname'].' '.$userData['lname']; ?></p>
			<p><b>Email:</b> <?php echo $userData['email']; ?></p>
			<p><b>Gender:</b> <?php echo $userData['gender']; ?></p>
			<p><b>Locale:</b> <?php echo $userData['locale']; ?></p>
			<p><b>Logged in with:</b> Google</p>
			<p><a href="<?php echo $userData['link']; ?>" target="_blank">Click to visit Google+</a></p>
			<p>Logout from <a href="<?php echo base_url().'user_authentication/logout'; ?>">Google</a></p>
		</div>
	</div>
</div>
</body>
</html>