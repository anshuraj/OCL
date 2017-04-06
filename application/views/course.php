<div class="container">
		<h2><?php echo $data['course_name']; ?></h2>
		<br>
		By <?php echo $data['teacher_name']; ?>
		<br><br>
		<div class="row">
			<div class="col-md-8">
				Course Description
				<br>
				<p>
				<?php echo $data['description']; ?>
				</p>
			</div>
			<?php if($lesson != Null) {
			echo '<div class="col-md-4">' ;
				echo '<div class="panel panel-default">';
			        echo '<div class="panel-body">Introduction Video</div>';
			        echo '<div class="panel-body">';
			        	echo '<video width="320" height="240" controls>';
						  		echo '<source src="'. site_url('uploads/'.$lesson[0]['content']) .'" type="video/mp4">';
						echo '</video>';
					echo '</div>';
			    echo '</div>';
			} ?>
				<button class="btn btn-primary" id="enroll-btn" onclick="enroll()" <?php if($check == 0){
					echo ">Register";
					} else { echo "disabled >Registered" ;  } ?>   </button>
			</div>
		</div>
	</div>
<script src='<?php echo site_url("public/bootstrap/js/jquery.js"); ?>'></script>

<script>
	function enroll(){
		var postData = {'course_id': <?php print_r($data['course_id']); ?> };
		$.ajax({
			url: '<?php echo site_url("course/enroll"); ?>',
			type: 'POST',
			data: postData,
			success: function(response){
				var response = JSON.parse(response);
				if(response.status == 1){
					$("#enroll-btn").prop('disabled', true);
					$("#enroll-btn").text("Registered");
				} else if(response.status == 0){
					alert(response.message);
				}
			}
		});
	}
</script>
</body>
</html>