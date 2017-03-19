</head>
<body>
	<div class="container">

	<button class="btn btn-default" id="add-lesson">Add Lesson</button>
			<button class="btn btn-default">Add Test</button>
			<button class="btn btn-default">Add Assignment</button>

		<div id="form-container"></div>
		<div class="well">
			<form>
				<div class="form-group">
				  <label for="lecture">New Lecture:</label>
				  <input type="text" name="Lesson name" class="form-control"  placeholder="Enter a title" id="lecture">
				</div>
				<div class="form-group">
				  <label for="lecture">Description</label>
				  <textarea type="text" name="Lesson name" class="form-control"  placeholder="Description" id="description"></textarea>
				</div>
				<div class="form-group">
				  <label for="file">Select a file</label>
				  <input type="file" name="file" class="form-control" id="file">
				</div>

				<button class="btn btn-primary">save</button>

			</form>
		</div>
	</div>

<script type="text/javascript" src="<?php echo site_url("public/bootstrap/js/jquery.js"); ?>"></script>

<script type="text/javascript">
	$("#add-lesson").click(function(){
    	$("#form-container").append('<div class="well">			<form>				<div class="form-group">				  <label for="lecture">New Lecture:</label>				  <input type="text" name="Lesson name" class="form-control"  placeholder="Enter a title" id="lecture">				</div>				<div class="form-group">				  <label for="lecture">Description</label>				  <textarea type="text" name="Lesson name" class="form-control"  placeholder="Description" id="description"></textarea>				</div>				<div class="form-group">				  <label for="file">Select a file</label>				  <input type="file" name="file" class="form-control" id="file">				</div>				<button class="btn btn-primary">save</button>			</form>		</div>');
});
</script>
</body>
</html>