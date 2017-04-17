<div class="container">
	<hr>
	<div id="data">
		<?php if($questions != Null) for($i=0; $i<sizeof($questions); $i++){
				echo '<div class="panel panel-default">  <div class="panel-body"> '. $questions[$i]['question'] .' </div></div>';
			} ?>

	</div>
	<hr>
	<button class="btn btn-default form-control" id="more" >Add more question</button>
	<hr>
	<div id="form-div" style="display: none;" class="col-md-offset-4 col-md-4 well">
		<div class="container">
		<p id="err" style="display: none;" class="alert alert-danger col-md-3"></p>
		<form class="form-horizontal" action="<?php echo site_url('teacher/update/addassignques/add'); ?>" method="get">
		  	<div class="form-group">
		    	<div class="col-sm-10">
		    		<label>
			      		<textarea type="text" class="form-control" id="question" name="question" placeholder="Enter question"></textarea>
		      		</label>
		    	</div>
		  	</div>
		 	
		  	<input type="hidden" name="assign_id" value="<?php echo $id; ?>">
		  
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
        			$('form')[0].reset();
        			$('#form-div').hide();

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
