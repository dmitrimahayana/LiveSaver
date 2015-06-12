<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Life Saver</title>
        
        <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.9.1.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui-1.10.2.custom.min.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui-1.10.2.custom.js"></script>
        
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/validationEngine.jquery.css" type="text/css"/>
        <script src="<?php echo base_url(); ?>js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
        <script src="<?php echo base_url(); ?>js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
        
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/containerBody.css" type="text/css"/>
        
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery-ui-1.10.2.custom.css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery-ui-1.10.2.custom.min.css"/>
        
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/animated-menu.css"/>
        <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>js/menu/animated-menu.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>js/menu/jquery.easing.1.3.js"></script>
        
</head>
<script> 
$(document).ready(function(){
  $("#bank-btn").click(function(){
    $("#form-bank").animate({ top:'150px'},"slow");
    $("#box-small").animate({ left:'1000px' },"fast");
    $("#box-small").hide("fast");
  });
  $("#bank-cancel").click(function(){
    $("#form-bank").animate({top:'-550px'},"slow");
    $("#box-small").show();
    $("#box-small").animate({left:'0px'},"slow");
  });
  $("#donor-btn").click(function(){
    $("#form-donor").animate({top:'150px'},"slow");
    $("#box-small").animate({ left:'1000px' },"fast");
    $("#box-small").hide("fast");;
  });
  $("#donor-cancel").click(function(){
    $("#form-donor").animate({
      top:'-450px'
    },"slow");
    $("#box-small").show();
    $("#box-small").animate({left:'0px'},"slow");
  });
  
});
</script> 
<body>

<div id="container">