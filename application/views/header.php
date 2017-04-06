<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Online Course Library</title>

	  <!-- Bootstrap -->
    <link href="<?php echo site_url("public/bootstrap/css/bootstrap.min.css"); ?>" rel="stylesheet" type="text/css" />
    <!-- Custom css -->
    <link href="<?php echo site_url("public/css/navbar_style.css"); ?>" rel="stylesheet" type="text/css" />

	<?php for($i = 0; $i < sizeof($custom_css); $i++){ echo '<link href="'.site_url("public/css/".$custom_css[$i]) . '" rel="stylesheet" type="text/css" />'; } ?>
</head>
<body>
	<nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="<?php echo site_url(); ?>">OCL</a>
      </div>
      <div class="navbar-right">
        <ul class="nav navbar-nav">
          <li><a href="<?php echo site_url(); ?>">Home</a></li>
          <li><a href="#">About</a></li>
          <li><a href="<?php echo site_url("catalog"); ?>">Catalog</a></li>
          <?php if ($this->session->userdata('user_id')){
            echo '<div class="dropdown">
                    <button class="dropbtn"><small><span class="glyphicon glyphicon-user"></span></small>  '. $this->session->userdata('name') .'</button>
                    <div class="dropdown-content">
                      <a href="#">Profile</a>
                      <a href="'.site_url('account/logout').'">Logout</a>
                    </div>
                  </div>';
          } else { 
              echo '<li><a href="' . site_url("account") . '">Log In</a></li>' ;
              echo '<li id="register"><a href="' . site_url("account") . '" style="color: white; ">Register</a></li>';
            } ?>  
        </ul>
      </div>
    </div>
  </nav>