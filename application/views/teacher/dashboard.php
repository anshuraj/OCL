</head>
<body>
	<div class="container">
		<h3>Teacher Dashboard</h3>

		<button class="btn btn-primary" onclick="location.href='<?php echo site_url('teacher/create'); ?>'">Create course</button>

		<?php for ($i=0; $i < sizeof($courses); $i++) { 
			echo "<ul>
					<li><a href='#'>".$courses[$i]['name']."</a></li>
				</ul>" ;
		} ?>

	</div>



</body>
</html>