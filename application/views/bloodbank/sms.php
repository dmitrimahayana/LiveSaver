
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Life Saver</title>
        
        <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.9.1.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui-1.10.2.custom.min.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui-1.10.2.custom.js"></script>
        
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/validationEngine.jquery.css" type="text/css"/>
        
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery-ui-1.10.2.custom.css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery-ui-1.10.2.custom.min.css"/>
        
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/animated-menu.css"/>
        <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>js/menu/animated-menu.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>js/menu/jquery.easing.1.3.js"></script>
        
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/blood.css" type="text/css"/>
        
        <link href="<?php echo base_url(); ?>css/tabs.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <?php
    foreach ($bisa_donor as $hasil){
                echo $hasil -> nama_pendonor; 
                echo $hasil -> telepon_pendonor." <br/>";
    }
    ?>
    
       
    <h1> Kirim sms </h1>
    <form action="<?php echo base_url()?>tracking/send_sms" method="post">
        <textarea rows="4" cols="50" name="message" wrap="physical">
            At w3schools.com you will learn how to make a website. We offer free tutorials in all web development technologies.
        </textarea> <br/>
        <input type="submit" value="Kirim"/>
    </form>
</body>
</html>