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
          <li><a href="<?php echo site_url("catalog"); ?>">Catalog</a></li>
          <li><a href="<?php echo site_url("account"); ?>">Log In</a></li>
          <li id="register"><a href="<?php echo site_url("account"); ?>" style="color: white; ">Register</a></li>
        </ul>
      </div>
    </div>
  </nav>

	<div class='intro'>
	  <div class="container">
		  <h2>Course Available</h2>
      <div class="row">

    <?php for ($i=0; $i < sizeof($courses) ; $i++) { 
      echo '<div class="col-md-3">
      <div class="panel panel-default">
        <div class="panel-heading"><a href="'. site_url("course/".$courses[$i]['id']) .'" >'. $courses[$i]['name'] .'</a></div>
        <div class="panel-body">'. $courses[$i]['description'] .'</div>
      </div>
    </div>' ;
    } ?>

  </div>

    </div>

	</div>




<script type="text/javascript" src="<?php echo site_url("public/bootstrap/js/jquery.js"); ?>"></script>
<script type="text/javascript" src="<?php echo site_url("public/bootstrap/js/bootstrap.min.js"); ?>"></script>

</body>
</html>