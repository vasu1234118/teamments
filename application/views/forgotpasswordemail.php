<!DOCTYPE html>
<html>
<head>
	<title>Email</title>

</head>
<body>

<div style="font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2">
  <div style="margin:50px auto;width:70%;padding:20px 0">
    <div style="border-bottom:1px solid #eee">
      <!--<a href="" style="font-size:1.4em;color: #00466a;text-decoration:none;font-weight:600">Your Brand</a>-->
    </div>
    <p style="font-size:1.1em">Hi,</p>
    <p>This email is in response to your request. Please click on the link below to reset your "DigitoWork Task Management" Application password which will also provide you with your username.</p>
    <h2 style="background: #00466a;margin: 0 auto;width: max-content;padding: 0 10px;color:red; border-radius: 4px; text-decoration:none"><a href="<?php echo base_url() ?>welcome/resetpassword/<?php echo md5($id) ?>" style="color:#FFFFFF;text-decoration:none">Reset My Password</a></h2>
    <p style="font-size:0.9em;  ">Regards,<br />Your DigitoworkTeam</p>
    <hr style="border:none;border-top:1px solid #eee" />
    
  </div>
</div>
</body>
</html>