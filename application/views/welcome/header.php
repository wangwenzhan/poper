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
        <img title="百星云输出" class="img_header" src="<?php echo base_url(); ?>image/output.jpg" 
            style="left: 1rem; " onclick="
            location.assign('<?php echo base_url().'welcome/index'; ?>');
            "/>
        <div class="div_title fs_title"><?php echo $webtitle; ?></div>
	</div><!-- header -->
	<div id="middle" class="div_middle fc_content">