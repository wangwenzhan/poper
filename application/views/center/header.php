<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html id="htmlid" >
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
    <base href="<?php echo base_url(); ?>" />
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>image/output.ico" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/output.css" />
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/output.js" type="text/javascript"></script>
	<title>百星云输出</title>
    
</head>

<body>
<form>
    <input type="hidden" name="opurl" value="<?php echo base_url(); ?>" id="opurl" />
	<div id="header" class="div_header fc_header">
        <img title="退出" class="img_header" src="<?php echo base_url(); ?>image/output.ico" 
            style="left: 1rem; " onclick="
            location.assign('<?php echo base_url().'welcome/index'; ?>');
            "/>
        <div class="div_title fs_title"><?php echo $_SESSION['staffname']; ?></div>
	</div><!-- theheader -->
	<div id="middle" class="div_middle fc_content">
        <div id="themenu" class="div_menu">
        <?php foreach($_SESSION['themenu'] as $mitem){ ?>
            <div class="div_menuitem" style="font-size: 1.3rem;left: <?php echo $mitem['layer']; ?>rem;<?php echo $mitem['forentry']==1 ? 'cursor: pointer;':''; ?> color: <?php echo $mitem['id']==$_SESSION['currentmenuid'] ? 'burlywood' :  'white'; ?>;" onclick="
                <?php if($mitem['forentry'] > 0){ ?>
                var theidname='currentmenuid';
                var theidvalue='<?php echo $mitem['id']; ?>';
                var thetitlename='';
                var thetitlevalue='';
                var theurl='<?php echo $mitem['action']; ?>';
                general_enter('','','currentmenuid',theidvalue,thetitlename,thetitlevalue,theurl);
                <?php } ?>
            "><?php echo $mitem['name']; ?>
           	</div>
        <?php  } ?>
        </div><!-- themenu -->
    	<div id="content" class="div_content">
