</head>
<body>
	<div class="container">
		<h3>Teacher Dashboard</h3>

		<button class="btn btn-primary" onclick="location.href='<?php echo site_url('teacher/create'); ?>'">Create course</button>

		<div class="row">
			<table class="table table-hover">
				<?php for ($i=0; $i < sizeof($courses); $i++) { 
					echo '
					    <tbody>
					      <tr>
					        <td><a href="'.site_url('classroom/'.$courses[$i]['id'].'/0').'">'.$courses[$i]['name'].'</a></td>
					        <td>Grade</td>
					        <td><a href="'.site_url('teacher/update/'.$courses[$i]['id']).'">Update</a></td>
					        <td>Remove</td>
					      </tr>
					    </tbody>
					  ';
				} ?>
				</table>
		</div>
	</div>



</body>
</html>