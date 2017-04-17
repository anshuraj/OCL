<div class="container">
	<div>
		<h2><?php print_r($assign[0]['name']) ?></h2>
		<h4><?php print_r($assign[0]['description']) ?></h4>
	</div>
	<div class="well" id="test-data">
		<?php if($questions != Null) for($i=0; $i<sizeof($questions); $i++){
				echo '<p><h3>'. ($i+1) .'. '. $questions[$i]['question'] .'</p></h3>';
			} else echo 'No questions available at this time. Please try again later.'?>
	</div>
</div>
</body>
</html>