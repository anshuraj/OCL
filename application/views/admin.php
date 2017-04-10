<div class="container">
	<h2>Welcome admin</h2>
  <button class="btn btn-default" id="cr-acc">Create teacher account</button>
  <br>
	<div class="well col-md-6" style="display: none;" id="create">
	<h3>Create a teacher account</h3>
	<p id="err" style="display: none;"></p>
		<form action="<?php echo site_url('admin/createteacher'); ?>" method="POST">
			<div class="form-group">
              <label for="name">Name</label>
              <input type="text" name="name" class="form-control" required="required">
            </div>
			<div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" class="form-control" required="required">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" class="form-control" required="required">
            </div>
            <input type="hidden" name="user_type" value="2" />
    		<button class="btn btn-primary" type="submit">Submit</button>
		</form>
	</div>	
</div>
<script src='<?php echo site_url("public/bootstrap/js/jquery.js"); ?>'></script>
<script>
  $("#cr-acc").click(function(){
    $("#create").toggle();
  });
</script>
<script>
	$(function () {
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
                  $('form')[0].reset();
                  $("#create").hide();
                  alert('Success');

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