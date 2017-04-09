<div class="container">
	
	<div id="data">
		<?php for($i=0; $i<sizeof($questions); $i++){
				echo '<div class="panel panel-default">  <div class="panel-body"> '. $questions[$i]['question'] .' </div></div>';
			} ?>

	</div>
	<hr>
	<button class="btn btn-default form-control" id="more" >Add more question</button>
	<hr>
	<div id="form-div" style="display: none;" class="col-md-offset-4 col-md-4 well">
		<div class="container">
		<p id="err" style="display: none;" class="alert alert-danger col-md-3"></p>
		<form class="form-horizontal" action="<?php echo site_url('teacher/update/addtestques/add'); ?>" method="get">
		  	<div class="form-group">
		    	<div class="col-sm-10">
		    		<label>
			      		<textarea type="text" class="form-control" id="question" name="question" placeholder="Enter question"></textarea>
		      		</label>
		    	</div>
		  	</div>
		 	<div class="form-group">
				<div class="radio">
					<label>
						<input type="radio" name="correct" value="1">
		      			<input type="text" class="form-control" id="ans1" name="ans1" placeholder="Add an answer">
					</label>
			  	</div>
		  	</div>
		  	<div class="form-group">
			  	<div class="radio">
					<label>
						<input type="radio" name="correct" value="2">
		      			<input type="text" class="form-control" id="ans2" name="ans2" placeholder="Add an answer">
				</label>
			  </div>
		  	</div>
		  	<div class="form-group">
			  	<div class="radio">
					<label>
						<input type="radio" name="correct" value="3">
		      			<input type="text" class="form-control" id="ans3" name="ans3" placeholder="Add an answer">
					</label>
			  </div>
		  	</div>
		  	<div class="form-group">
			  	<div class="radio">
					<label>
						<input type="radio" name="correct" value="4">
			      		<input type="text" class="form-control" id="ans4" name="ans4" placeholder="Add an answer">
					</label>
			 	</div>
		  	</div>
		  	<input type="hidden" name="test_id" value="<?php echo $id; ?>">
		  
		  	<div class="form-group"> 
		    	<div class="col-sm-2">
		      		<button type="submit" class="btn btn-danger">Save</button>
		    	</div>
		  	</div>
		</form></div>
	</div>
</div>
<script type="text/javascript" src="<?php echo site_url("public/bootstrap/js/jquery.js"); ?>"></script>
<script>
	$("#more").click(function(){
		$("#form-div").toggle();
	});
</script>
<script>
	$(function() {
    $('form').submit(function (e) {
        e.preventDefault();
		$("#err").hide();
        var postData = $(this).serialize();
        var url = $(this).attr('action');

        $.ajax({
            url: url,
            type: 'POST',
            data: postData,
            success: function (response) {
				var response = JSON.parse(response);
                console.log(response);
        		if(response.status == 1){
        			$("#data").append('<div class="panel panel-default">  <div class="panel-body"> '+ $("#question").val() + '</div></div>');
        		} else if(response.status == 0){
        			$("#err").html(response.message);
        			$("#err").show();
        		}
                
            } 
        }); 
    });
}); 
</script>
</body>
</html>
