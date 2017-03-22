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
  	<?php echo print_r($data); ?>
	<div class="container">
		<h2><?php echo $data['course_name']; ?></h2>
		<br>
		By <?php echo $data['teacher_name']; ?>
		<br><br>
		<div class="row">
			<div class="col-md-8">
				Course Description
				<br>
				<p>
				<?php echo $data['description']; ?>
				</p>
			</div>
			<div class="col-md-4">
				<div class="panel panel-default">
			        <div class="panel-body">Introduction Video</div>
			    </div>
				<button class="btn btn-primary">Register</button>
			</div>
		</div>
	</div>
</body>
</html>