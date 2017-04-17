<div class="container">
	<h2>Forums</h2>
	<a href="<?php echo site_url('forum/new'); ?>"><button  class="btn btn-primary">Ask a question</button></a>
	<hr>
	<div class="row">
	<?php for($i=0; $i<sizeof($threads); $i++) {

		echo '<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading"><a href="'. site_url('forum/thread/'.$threads[$i]['id']) .'">'.$threads[$i]['topic'].'</a></div>
				<div class="panel-body">Asked by '. $threads[$i]['name'] .'</div>
			</div>
		</div>'; 
			}?>
		</div>
		
	</div>
</body>
</html>