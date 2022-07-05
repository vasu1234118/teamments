<!DOCTYPE html>
<html>
<head>
	<title>Email</title>
	<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}
</style>
</head>
<body>

<link href='https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap' rel='stylesheet'>
	<div style='width: 500px; margin:0 auto; border:1px solid #002752; border-radius: 5px;'>
		
		<div style='height: 70px; text-align: center; border-bottom:1px solid #002752;'>
			<img src='<?php echo site_url('public/img/logo.png'); ?>' height='70px' />
		</div>
       
		<div style='padding: 50px 30px; text-align: center; font-family:Poppins; font-size: 14px;'>
			<h1 style='color:#002752; font-size: 25px; '>Welcome!</h1> 
			<!--<p>The <?php echo $fname ?> is updated with an Article. <?php echo $fname ?> , please read and verify.</p>-->
             
             <table id="customers">
    
  
    <tr>
        <td> Name</td>
          <td>:</td>
        <td><?php echo $name ?></td>
    </tr>
    <tr>
        <td>Technology</td>
          <td>:</td>
        <td><?php echo $technology ?></td>
    </tr>

    <tr>
        <td>Date of Joining</td>
          <td>:</td>
        <td><?php echo $doj ?></td>
    </tr>
    <tr>
        <td>Email</td>
          <td>:</td>
        <td><?php echo $email ?></td>
    </tr>

    <tr>
        <td>Username</td>
          <td>:</td>
        <td><?php echo $username ?></td>
    </tr>

    <tr>
        <td>Password</td>
          <td>:</td>
        <td><?php echo $password ?></td>
    </tr>
     
    
    
  
   
</table>
          <p>We're excited to have you get started. First, you need to login your account. Just press the button below.</p>

			<p><a style='padding: 6px 15px; background: #002752; border-radius: 2px; color: #fff; text-decoration: none;' href='<?php echo base_url() ?>'>Home</a></p>
		</div>

		<div style='padding: 8px 15px; background: #002752; text-align: center;'>
			<p style='font-family:Poppins; font-size: 13px; color: #fff;'>Copyright &copy; 2020 Digitowork. All Rights Reserved</p>
		</div>



	</div>
</body>
</html>