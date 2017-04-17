<div class="container">
	<div>
		<h2><?php print_r($tests[0]['title']) ?></h2>
		<h4><?php print_r($tests[0]['description']) ?></h4>
	</div>
	<div class="well" id="test-data">
		<div class="container">
			<?php if($questions != Null) for($i=0; $i<sizeof($questions); $i++){
				echo '<p><h3>'. ($i+1) . '. ' . $questions[$i]['question'].'</h3></p>';

				for($j=0; $j<sizeof($answers); $j++){
					if($answers[$j]['question_id'] == $questions[$i]['id'])
						echo '<p><input type="radio" name="'.$i.'" value="'.$answers[$j]['content'].'"> '.$answers[$j]['content'].'</p>';
				}

			} else echo 'No questions available at this time. Please try again later.' ?>
		</div>
		<button type="button" class="btn btn-primary" onclick="check()">Check</button>
	</div>
	<div class="well" id="result" style="display: none;"></div>
</div>
<script src='<?php echo site_url("public/bootstrap/js/jquery.js"); ?>'></script>
<script>
var q = JSON.parse('<?php echo json_encode($correct); ?>');
var score;
	function check(){
		var count = 0;
		for(var i=0; i<q.length; i++){ 
			if( $("input[name='"+i+"']:checked").val() == q[i].content){
				count++;
			} 
		}
		$("#result").html("You scored " + count + " out of " + q.length + '<p><button class="btn btn-default" id="retry"}">Retry</button>');
		$("#test-data").hide();
		$("#result").slideDown("slow");
		score = count;
		save();
	}
	$("#result").on("click", "#retry", function(){
  		$("#result").slideUp("slow");
  		$("#test-data").slideDown("slow");
	});
	function save(){
		$.ajax({
			url: '<?php echo site_url('classroom/test/save'); ?>' ,
			type: 'POST',
			data: {'score': score, 'test_id': <?php echo $tests[0]['id']; ?> , 'course_id': <?php echo $tests[0]['id']; ?> , 'max_marks': q.length} ,
			success: function(response){
				//var response = JSON.parse(response);
				console.log(response);

			}
		});
	}
</script>

</body>
</html>