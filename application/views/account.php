<!-- Custom css -->
<link href="<?php echo site_url("public/css/account_style.css"); ?>" rel="stylesheet" type="text/css" />

</head>
<body>
	<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">OCL</a>
    </div>
    <div class="navbar-right">
    <ul class="nav navbar-nav">
      <li><a href="<?php echo site_url(); ?>">Home</a></li>
      <li><a href="<?php echo site_url("catalog"); ?>">Catalog</a></li>
      <li><a href="#">About</a></li>
    </ul>
    </div>
  </div>

</nav>
	<div class='container'>
	  
  <div class="form">
      
      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Sign Up</a></li>
        <li class="tab"><a href="#login">Log In</a></li>
      </ul>
      
      <div class="tab-content">
        <div id="signup">   
          <h3>Sign Up for Free</h3>
          
          <form action="<?php echo site_url("account/signup"); ?>" method="post">

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
          
          <form action="<?php echo site_url("account/login"); ?>" method="post">
          
            <div class="field-wrap">
              <input type="email"required autocomplete="off" placeholder="Email" name="email" />
            </div>
          
          <div class="field-wrap">
            <input type="password"required autocomplete="off" placeholder="Password" name="password" />
          </div>
          <p class="forgot"><a href="#">Forgot Password?</a></p>
          
          <button class="button button-block"/>Log In</button>
          
          </form>

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->

<script src='<?php echo site_url("public/bootstrap/js/jquery.js"); ?>'></script>
<script src="<?php echo site_url("public/js/index.js"); ?>"></script>


	</div>
</body>
</html>