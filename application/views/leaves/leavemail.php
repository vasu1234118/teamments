<!DOCTYPE html>
<html>
<head>
  <title>Email</title>
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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
        
        
        <table id="customers">
            <tr>
                <td>Leave ID</td>
          <td>:</td>
        <td><b>LID-<?php echo $lid ?></b></td> 
            </tr>
            <tr>
             <td>Name</td>
          <td>:</td>
        <td><b><?php echo $name ?></b></td>
    </tr>
    <tr>
        <td>Subject</td>
          <td>:</td>
        <td><b><?php echo $title ?></b></td>
    </tr>
   
    <tr>
        <td>Leave From-To</td>
          <td>:</td>
        <td><b><?php echo $from_date ?>  To  <?php echo $to_date ?></b></td>
    </tr>
     <tr>
        <td>Leave Start Time</td>
         <td>:</td>
        <td><b><?php if($lstime=='firsthalf'){ echo  "First Half"; } else if($lstime=='secondhalf'){ echo  "Second Half"; }  ?></b></td>
    </tr>
    <tr>
        <td>Leave End Time</td>
        <td>:</td>
        <td><b><?php if($letime=='secondhalf'){ echo  "Second Half"; } else if($letime=='firsthalf'){ echo  "First Half"; }   ?><b></td>
    </tr>
     <tr>
        <td>Leave Days</td>
        <td>:</td>
        <td><b><?php echo $ldays ?><b></td>
    </tr>
    
     <tr>
        <td>Leave Type</td>
        <td>:</td>
        <td><b><?php if($lreason=='1'){ echo  "Special Leave"; } else if($lreason=='2'){ echo  "Sick Leave"; } else if($lreason=='3'){ echo  "Casual leave"; }  ?><b></td>
    </tr>
    
      
    
    
  
   
</table>
        
      <!--<h1 style='color:#002752; font-size: 25px; '>Leave From<?php echo $from_date ?>To <?php echo $to_date ?> </h1> -->
      <p><?php echo $description ?></p>
 <div style='padding: 50px 30px; text-align: center; font-family:Poppins; font-size: 14px;'>
          <p><a style='padding: 6px 15px; background: #002752; border-radius: 2px; color: #fff; text-decoration: none;' href='<?php echo base_url() ?>leaves/accept/<?php echo md5($task_id) ?>'>Accept</a><a style='padding: 6px 15px; background: #d8442c; border-radius: 2px; color: #fff; text-decoration: none;' href='<?php echo base_url() ?>leaves/reject/<?php echo md5($task_id) ?>'>Reject</a></p>
          
</div>
      <p><a style='padding: 6px 15px; background: #002752; border-radius: 2px; color: #fff; text-decoration: none;' href='<?php echo base_url() ?>'>Home</a></p>
    </div>

    <div style='padding: 8px 15px; background: #002752; text-align: center;'>
      <p style='font-family:Poppins; font-size: 13px; color: #fff;'>Copyright &copy; 2020 Digitowork. All Rights Reserved</p>
    </div>



  </div>
</body>
</html>