<div class="container">
	<h3>Question</h3>

	<div class="row">
	<?php echo '<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading"><div class="row"><div class="col-md-5"><h3>'.$thread[0]['topic'].'</h3></div><div class="col-md-3 col-md-offset-4">Asked by '.$thread[0]['user_name'].'</div></div></div>
				<div class="panel-body">'.$thread[0]['content'].'</div>
			</div>
		</div>' ?>
	</div>
	<h3>Replies</h3>
	<div id="reply" class="row">
		<?php if($replies != Null) for($i=0; $i<sizeof($replies); $i++){
			echo '<div class="col-md-8"><div class="panel panel-default">
				<div class="panel-body">'.$replies[$i]['message'].'</div>
				<div class="panel-footer">Answered by '.$replies[$i]['user_name'].'</div>
			</div>
		</div>';
			} ?>
	</div>	

	<div class="well col-md-8">
		<h4>Post a reply</h4><br>
			<form action="<?php echo site_url("forum/thread/reply"); ?>" method="post">
				<div class="form-group">
					<input type="hidden" name="thread_id" value="<?php echo $id; ?>">
					<label for="message">Message</label>
					<textarea type="text" name="message" class="form-control" id="message"></textarea>
				</div>

				<button class="btn btn-primary" type="submit">Post</button>

			</form>
		</div>
</div>
<script src='<?php echo site_url("public/bootstrap/js/jquery.js"); ?>'></script>
<script>
	$(function () {
    $('form').submit(function (e) {
        e.preventDefault();
        var postData = $(this).serialize();
        var url = $(this).attr('action');

        $.ajax({
            url: url,
            type: 'POST',
            data: postData,
            success: function (response) {
                var response = JSON.parse(response);
                if(response.status == 1){
                	$('#reply').append('<div class="col-md-8"><div class="panel panel-default">				<div class="panel-body">'+ response.data[0]['message'] +'</div>				<div class="panel-footer">Answered by ' + response.data[0]['user_name'] +'</div>			</div>		</div>');
                	$('form')[0].reset();

                } else if(response.status == 0){

                }
            }
        });
    });
  });
</script>
</body>
</html>