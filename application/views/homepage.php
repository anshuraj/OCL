</head>
<body>
	<nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">OCL</a>
      </div>
      <div class="navbar-right">
        <ul class="nav navbar-nav">
          <li><a href="<?php echo site_url(); ?>">Home</a></li>
          <li><a href="#">About</a></li>
          <li><a href="<?php echo site_url("explore"); ?>">Catalog</a></li>
          <li><a href="<?php echo site_url("account"); ?>">Log In</a></li>
          <li id="register"><a href="<?php echo site_url("account"); ?>" style="color: white; ">Register</a></li>
        </ul>
      </div>
    </div>
  </nav>

	<div class='intro'>
	  <div class="container">
		  <h2>Welcome to Online Course Library</h2>

      <button class="btn btn-primary">Explore</button>
    </div>

	</div>




<script type="text/javascript" src="<?php echo site_url("public/bootstrap/js/jquery.js"); ?>"></script>
<script type="text/javascript" src="<?php echo site_url("public/bootstrap/js/bootstrap.min.js"); ?>"></script>

</body>
</html>