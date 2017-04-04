<div class='container'>
	  
  <div class="form">
      
      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Sign Up</a></li>
        <li class="tab"><a href="#login">Log In</a></li>
      </ul>
      
      <div class="tab-content">
        <div id="signup">   
          <h3>Sign Up for Free</h3>
          
          <form action="<?php echo site_url("account/signup"); ?>" method="post" id="signup-form">

          <div class="field-wrap">
              <input type="text"required autocomplete="off" placeholder="Name" name="name" />
            </div>

          <div class="field-wrap">
            <input type="email"required autocomplete="off" placeholder="Email address" name="email" />
          </div>
          
          <div class="field-wrap">
            <input type="password"required autocomplete="off" placeholder="Password" name="password" />
          </div>
            <input type="hidden" name="user_type" value="1" />
          
          <button type="submit" class="button button-block"/>Get Started</button>
          
          </form>

        </div>
        
        <div id="login">   
          <h3>Welcome Back!</h3>
          
          <form action="<?php echo site_url("account/login"); ?>" method="post" id="login-form">
          
            <div class="field-wrap">
              <input type="email"required autocomplete="off" placeholder="Email" name="email" />
            </div>
          
          <div class="field-wrap">
            <input type="password"required autocomplete="off" placeholder="Password" name="password" />
          </div>
          <p class="forgot"><a href="#">Forgot Password?</a></p>
          
          <button type="submit" class="button button-block"/>Log In</button>
          
          </form>

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
</div>
<script src='<?php echo site_url("public/bootstrap/js/jquery.js"); ?>'></script>
<script src="<?php echo site_url("public/js/index.js"); ?>"></script>

<script>
  $(function () {
    $('#login-form').submit(function (e) {
        e.preventDefault();
        var postData = $(this).serialize();
        var url = $(this).attr('action');

        $.ajax({
            url: url,
            type: 'POST',
            data: postData,
            success: function (response) {
              var response = JSON.parse(response);
                console.log(typeof(response));
                if(response.status == 1 && response.user_type == 1){

                  window.location.href = "<?php echo site_url("dashboard"); ?>";

                } else if(response.status == 1 && response.user_type == 2){

                  window.location.href = "<?php echo site_url("teacher/dashboard"); ?>";

                }
            } // end of ajax success function
        }); // end of ajax
    });
  }); // end of login-form submit  

  $(function () {
    $('#signup-form').submit(function (e) {
        e.preventDefault();
        var postData = $(this).serialize();
        var url = $(this).attr('action');

        $.ajax({
            url: url,
            type: 'POST',
            data: postData,
            success: function (response) {
                console.log(response);
                
            } // end of ajax success function
        }); // end of ajax
    });
  }); // end of submit-form submit  

</script>

</body>
</html>