<link href="<?php echo base_url(); ?>public/css/jasny-bootstrap.min.css" rel="stylesheet" media="screen">
</head>
<body>
	<div class="container">

	<button class="btn btn-default" id="add-lesson">Add Lesson</button>
			<button class="btn btn-default">Add Test</button>
			<button class="btn btn-default">Add Assignment</button>

		<div id="form-container"></div>
		<div class="well" style="display:none;" id="well-form">
			<div>
			<!-- <?php echo form_open('teacher/update/upload', 'id="form-upload"'); ?> -->

			<form action="<?php echo base_url('teacher/update/upload'); ?>" method="POST" id="form-upload">
				<div class="form-group">
				  <label for="lecture">New Lecture:</label>
				  <input type="text" name="l_name" class="form-control"  placeholder="Enter a title" id="lecture" required>
				</div>
				<div class="form-group">
				  <label for="lecture">Description</label>
				  <textarea type="text" name="desc" class="form-control"  placeholder="Description" id="description" required></textarea>
				</div>


				<div class="fileinput fileinput-new input-group" data-provides="fileinput">

                <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>

                <span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new"><i class="glyphicon glyphicon-paperclip"></i> Select file</span><span class="fileinput-exists"><i class="glyphicon glyphicon-repeat"></i> Change</span><input type="file" name="file" required></span>

                <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput"><i class="glyphicon glyphicon-remove"></i> Remove</a>

                <!-- <a href="#" id="upload-btn" class="input-group-addon btn btn-success fileinput-exists"><i class="glyphicon glyphicon-open"></i> Upload</a> -->
              </div>

              <input type="hidden" name="course_id" value="<?php echo $course_id; ?>">


				<button class="btn btn-primary" id="save">save</button>

			</form>
			</div>

			<!-- <progress id="progress-bar" max="100" value="0"></progress> -->
            <div class="progress" style="display:none;">
              <div id="progress-bar" class="progress-bar progress-bar-success progress-bar-striped " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
                20%
              </div>
            </div>

		</div>
	</div>

<script type="text/javascript" src="<?php echo site_url("public/bootstrap/js/jquery.js"); ?>"></script>
<script src="<?php echo base_url(); ?>public/js/jasny-bootstrap.min.js"></script>   

<script type="text/javascript">
	$("#add-lesson").click(function(){
		$("#well-form").fadeIn();
});
</script>

<script src="<?php echo base_url(); ?>public/js/upload.js"></script>   


</body>
</html>