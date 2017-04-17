<div class="container">
		<h2><?php echo $course['course_name'];   ?></h2>
		
		<div class="row">
			<div class="col-md-2 lectures">
				Lectures
				<hr>
				<?php 
				echo '<li>';
				for ($i=0; $i < sizeof($lesson) ; $i++) { 
					echo '<ul><a href="'. site_url('classroom/'.$lesson[$i]['course_id'].'/'.$i) .'"><button class="btn list-button">'.$lesson[$i]['name'].'</button></a></ul>';
				}
				echo '</li>'; ?>
				
			</div>
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading"><?php echo $lesson[$lid]['name']; ?></div>
					<div class="panel-body">
						<video width="640" height="360" controls style="width: 100%; height: auto;">
						  <?php 
						  	echo '<source src="'. site_url('uploads/'.$lesson[$lid]['content']) .'" type="video/mp4">'
						  ?>
						</video>
					</div>
				</div>
				<a href="<?php echo site_url('forum'); ?>">Have a query? Post in the forums.</a>
			</div>
			<div class="col-md-2">
				Available tests<br><hr>
				<?php 
				for($i=0; $i<sizeof($tests); $i++){
					echo '<a href="'.site_url('classroom/test/'.$tests[$i]['id']).'"><button class="btn list-button">'.$tests[$i]['title'].'</button></a>';
					} ?>
				<br><hr>
				Available assignments
				<?php for($i=0; $i<sizeof($assignments); $i++){
					echo '<a href="'.site_url('classroom/assign/'.$assignments[$i]['id']).'"><button class="btn list-button">'.$assignments[$i]['name'].'</button></a>';
					} ?>
			</div>
		</div>
	</div>
</body>
</html>