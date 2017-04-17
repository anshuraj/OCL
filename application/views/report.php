<div class="container">
	<h2>Report for <?php echo $course['course_name']; ?></h2>
	<hr>
	<div class="well">
		<table class="table table-hover">
			<tbody>
				<tr>
			        <td>Test</td>
			        <td>Score</td>
			        <td>Max marks</td>
			        <td>Date</td>
			      </tr>
			<?php for ($i=0; $i < sizeof($report); $i++) { 
				echo '<tr>
				        <td>'.$report[$i]['title'].'</td>
				        <td>'.$report[$i]['score'].'</td>
				        <td>'.$report[$i]['max_marks'].'</td>
				        <td>'.$report[$i]['time'].'</td>
				      </tr>
				    
				  '; 
			  }?>
			  </tbody>
		</table>

	</div>
</div>
</body>
</html>