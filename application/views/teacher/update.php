<link href="<?php echo base_url(); ?>public/css/jasny-bootstrap.min.css" rel="stylesheet" media="screen">
</head>
<body>
	<div class="container">

	<button class="btn btn-default" id="add-lesson">Add Lesson</button>
			<button class="btn btn-default" id="add-test">Add Test</button>
			<button class="btn btn-default">Add Assignment</button>

		<div id="data">
			<?php for($i=0; $i<sizeof($lesson); $i++){
					echo '<div class="panel panel-default">  <div class="panel-body">Lesson '.($i+1).': '.$lesson[$i]['name'].'</div></div>';
					}
				for($i=0; $i<sizeof($tests); $i++){
					echo '<div class="panel panel-default">  <div class="panel-body">Test '.($i+1).': '.$tests[$i]['title'].'<a href="'.site_url('teacher/update/addtestques/'.$tests[$i]['id']).'"><button class="btn btn-default" id="add-question-btn" style="float: right;">Add questions</button></a></div>  <div class="panel-footer"></div>  </div>';
				} ?>
		</div>
		<div class="well" style="display:none;" id="well-form">
			<div>

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


		<div id="test" style="display: none;">
			<div class="panel panel-primary">
		    	<div class="panel-heading">Add a test</div>
		    	<div class="panel-body">
		    		<form class="form-horizontal" action="<?php echo base_url('teacher/update/addtest'); ?>" method="POST" id="form-test">
					  <div class="form-group">
					    <label class="control-label col-sm-2" for="title">New test:</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="title" placeholder="Enter a title" name="title">
					    </div>
					  </div>
					  <div class="form-group">
					    <label class="control-label col-sm-2" for="desc">Description:</label>
					    <div class="col-sm-10">
					      <input type="textarea" class="form-control" id="desc" placeholder="Test description" name="desc">
					    </div>
					  </div>
              			<input type="hidden" name="course_id" value="<?php echo $course_id; ?>">
						
					  <div class="form-group"> 
					    <div class="col-sm-offset-2 col-sm-10">
					      <button type="submit" class="btn btn-default">Save</button>
					    </div>
					  </div>
					</form>
		      	</div>
		      	<div class="panel-footer">Add</div>
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
<script type="text/javascript">
	$("#add-test").click(function(){
		$("#test").toggle();
	});
</script>
<script src="<?php echo base_url(); ?>public/js/upload.js"></script>   
<script src="<?php echo base_url(); ?>public/js/test.js"></script>   



</body>
</html>