<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-4">
            <h3>Create a new thread, ask a question</h3>
        </div>
        <div class="well col-md-4 col-md-offset-4">
        	<form action="<?php echo site_url('forum/new/createthread') ?>" method="POST">
                <div class="form-group">
                  <label for="topic">Topic</label>
                  <input type="text" name="topic" class="form-control">
                </div>
                <div class="form-group">
                  <label for="content">Content</label>
                  <textarea type="text" name="content" class="form-control"></textarea>
                </div>
        		<button class="btn btn-primary" type="submit">Submit</button>
        	</form>
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

        $.ajax({
            url: url,
            type: 'POST',
            data: postData,
            success: function (response) {
                var response = JSON.parse(response);
                console.log(response);
                if(response.status == 1){

                  window.location.href = '<?php echo site_url("forum/thread/"); ?>'+response.course_id;

                } else if(response.status == 0){


                }
            }
        });
    });
  });
</script>
</body>
</html>