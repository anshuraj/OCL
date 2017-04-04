</head>
<body>
<div class="container">
	<h3>Enrolled Courses</h3>
	<div class="row">

		<?php for ($i=0; $i < sizeof($courses) ; $i++) { 
			echo '<div class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-heading"><a href="'. site_url("classroom/".$courses[$i]['id']) .'" >'. $courses[$i]['name'].'</a></div>
				<div class="panel-body">'. $courses[$i]['description'].'</div>
			</div>
		</div>' ;
		} ?>

	</div>

	
</div>

</body>
</html>