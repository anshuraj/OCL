<div class='intro'>
	  <div class="container">
		  <h2>Course Available</h2>
      <div class="row">

    <?php for ($i=0; $i < sizeof($courses) ; $i++) { 
      echo '<div class="col-md-3">
      <div class="panel panel-default">
        <div class="panel-heading"><a href="'. site_url("course/".$courses[$i]['id']) .'" >'. $courses[$i]['name'] .'</a></div>
        <div class="panel-body">'. $courses[$i]['description'] .'</div>
      </div>
    </div>' ;
    } ?>

  </div>

    </div>

	</div>




<script type="text/javascript" src="<?php echo site_url("public/bootstrap/js/jquery.js"); ?>"></script>
<script type="text/javascript" src="<?php echo site_url("public/bootstrap/js/bootstrap.min.js"); ?>"></script>

</body>
</html>