</head>
<body>
	<div class="container">
		<h3>Teacher Dashboard</h3>

		<button class="btn btn-primary">Create course</button>

		<?php for ($i=0; $i < 10; $i++) { 
			echo "<ul>
					<li><a href='#'>Course ".($i+1)."</a></li>
				</ul>" ;
		} ?>

	</div>



</body>
</html>