<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-info">
				<div class="panel-heading"> 
					<h3 class="panel-title">Basic Information</h3> 
				</div>
				<div class="panel-body"> 

					<div class="input-group">
						<span class="input-group-addon" id="name">Name</span>
					  	<input type="text" class="form-control" aria-describedby="name" disabled="disabled" value="<?php echo $profile['name']; ?>">
					</div><br>
					<div class="input-group">
						<span class="input-group-addon" id="email">Email</span>
					  	<input type="text" class="form-control" aria-describedby="email" disabled="disabled" value="<?php echo $profile['email']; ?>">
					</div><br>

					<div class="panel panel-info">
						
						<div class="panel-body">
							<p style="display: none" class="alert alert-danger" role="alert" id="err"></p>
							<form method="POST" action="<?php echo site_url('profile/changepass') ?>" id="passform">
								<div class="input-group">
								  	<input type="text" class="form-control" name="current" placeholder="Current password">
								</div><br>
								<div class="input-group">
								  	<input type="text" class="form-control" name="new" placeholder="New password">
								</div><br>
								<div class="input-group">
								  	<input type="text" class="form-control" name="verify" placeholder="Verify password">
								</div><br>
								<button class="btn btn-primary" type="submit">Change Password</button>
							</form>
						</div>
					</div>
				</div> 
	</div>
		</div>
	</div>
</div>
<script src='<?php echo site_url("public/bootstrap/js/jquery.js"); ?>'></script>
<script>
	$(function () {
    $('form').submit(function (e) {
        e.preventDefault();
        var postData = $(this).serialize();
        var url = $(this).attr('action');
        $('#err').empty();
        $('#err').hide();
        $.ajax({
            url: url,
            type: 'POST',
            data: postData,
            success: function (response) {
                var response = JSON.parse(response);
                if(response.status == 1){
                	alert('Password changed successfully');
                	$('#passform')[0].reset();
                } else if(response.status == 0){
                	$('#err').append(response.message);
                	$('#err').show();
                }
            }
        });
    });
  });
</script>
</body>
</html>