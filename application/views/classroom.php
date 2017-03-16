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
  	
	<div class="container">
		<h2>Course Name</h2>
		
		<div class="row">
			<div class="col-md-3">
				<?php 
				echo '<li>';
				for ($i=0; $i < 10 ; $i++) { 
					echo '<ul>Lesson</ul>';
				}
				echo '</li>'; ?>
				
			</div>
			<div class="col-md-9">
				<div class="panel panel-default">
					<div class="panel-heading">Lesson</div>
					<div class="panel-body">Video
						<video width="320" height="240" controls>
						  <source src="<?php echo site_url('public/ml1.mp4'); ?>" type="video/mp4">
						</video>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>