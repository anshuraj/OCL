</head>
<body>
	<div class="container">

		<div class="well col-md-4 col-md-offset-4">
		<h2>Create a course</h2><br>
			<form action="<?php echo site_url("teacher/createCourse"); ?>" method="post">
				<input type="hidden" name="teacher_id" value="<?php echo '2'; ?>">
				<div class="form-group">
				  <label for="name">Course Name</label>
				  <input type="text" name="name" class="form-control"  placeholder="Course name" id="name">
				</div>
				<div class="form-group">
				  <label for="description">Description</label>
				  <textarea type="text" name="description" class="form-control"  placeholder="Description" id="description"></textarea>
				</div>

				<button class="btn btn-primary" type="submit">Save</button>

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
                console.log(response);
                if(response.status == 1){

                  window.location.href = '<?php echo site_url("teacher/update/" ); ?>'+response.course_id;

                } else if(response.status == 0){

                  //window.location.href = "<?php echo site_url("teacher/dashboard"); ?>";

                }
            }
        });
    });
  });
</script>
</body>
</html>