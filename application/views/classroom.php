<div class="container">
		<h2><?php echo $course['course_name'];   ?></h2>
		
		<div class="row">
			<div class="col-md-3">
				<?php 
				echo '<li>';
				for ($i=0; $i < sizeof($lesson) ; $i++) { 
					echo '<ul><a href="'. site_url('classroom/'.$lesson[$i]['course_id'].'/'.$i) .'">'.$lesson[$i]['name'].'</a></ul>';
				}
				echo '</li>'; ?>
				
			</div>
			<div class="col-md-9">
				<div class="panel panel-default">
					<div class="panel-heading"><?php echo $lesson[$lid]['name']; ?></div>
					<div class="panel-body">
						<video width="640" height="360" controls>
						  <?php 
						  	echo '<source src="'. site_url('uploads/'.$lesson[$lid]['content']) .'" type="video/mp4">'
						  ?>
						</video>
					</div>
				</div>
				<a href="<?php echo site_url('forum'); ?>">Have a query? Post in the forums.</a>
			</div>
		</div>
	</div>
</body>
</html>