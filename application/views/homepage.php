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
    <link href="<?php echo site_url("public/css/style.css"); ?>" rel="stylesheet" type="text/css" />

	
</head>
<body>
	<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">OCL</a>
    </div>
    <div class="navbar-right">
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Catalog</a></li>
      <li><a href="#">Log In</a></li>
      <li><a href="#">About</a></li>
    </ul>
    </div>
  </div>

</nav>
	<div class='container'>
	  <div class="">
		  <h2>Welcome to Online Course Library</h2>

      <button class="btn btn-primary">Explore</button>
    </div>
	</div>
</body>
</html>