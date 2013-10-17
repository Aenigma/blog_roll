<!DOCTYPE html>
<html>
  <head>
    <?php echo $this->Html->charset(); ?>
    <meta content='width=device-width, initial-scale=1.0' name='viewport'>
    <link href='//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css' rel='stylesheet'>
    <link href='//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-theme.min.css' rel='stylesheet'>
	<?php echo $this->Html->css('custom'); ?>
    <script src='//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js'></script>
    <script src='//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js'></script>
    <script src='//cdnjs.cloudflare.com/ajax/libs/holder/2.0/holder.min.js'></script>
	<title>Blog So Hard</title>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src='//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js'></script>
      <script src='//cdnjs.cloudflare.com/ajax/libs/respond.js/1.3.0/respond.js'></script>
    <![endif]-->
  </head>
  <body class='floating-body'>
    <div class='navbar navbar-default navbar-fixed-top'>
      <div class='container'>
        <div class='navbar-header'>
          <button class='navbar-toggle' data-target='.navbar-collapse' data-toggle='collapse' type='button'>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
          </button>
          <a class='navbar-brand' href='#'>Blog Title</a>
        </div>
        <div class='collapse navbar-collapse'>
          <ul class='nav navbar-nav'>
            <li>
              <?php echo $this->Html->link('Home','/');?>
            </li>
            <li class='dropdown'>
              <?php
                echo $this->Html->link('Navigation' . $this->Html->tag('b', '',array('class'=>'caret')), '#',array('escape'=>false,'data-toggle'=>'dropdown'))
              ?>
              <ul class='dropdown-menu'>
                <li>
                <?php
                  echo $this->Html->link('Articles by Author...','/articles/index/sort:author/direction;asc');
                ?>
                </li>
                <li>
                <?php
                  echo $this->Html->link('Categories...','/categories');
                ?>
                </li>
                <li>
                <?php
                  echo $this->Html->link('Users...','/users');
                ?>
                </li>
              </ul>
            </li>
          </ul>
          <ul class='nav navbar-nav navbar-right'>
            <li>
              <a class='btn' data-toggle='modal' href='#signin'>
                Sign in
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class='container'>
		<?php if($alert = $this->Session->flash()): ?>
		  <div class="alert alert-info alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<?php echo $alert; ?>
		  </div>
		<?php endif; ?>
		<?php echo $this->fetch('content'); ?>
		<?php //echo $this->element('sql_dump'); ?>
    <div aria-hidden='true' aria-labeledby='signinmodal' class='modal fade' id='signin' role='dialog' tabindex='-1'>
      <div class='modal-dialog'>
        <div class='modal-content'>
          <div class='modal-header'>
            <button aria-hidden='true' class='close' data-dismiss='modal' type='button'>&times;</button>
            <h4 class='modal-title'>Sign In</h4>
          </div>
          <div class='modal-body'>
            <form role='form'>
              <div class='form-group'>
                <label for='signin-username'>Username</label>
                <input class='form-control' id='signin-username' placeholder='Your username' type='text'>
              </div>
              <div class='form-group'>
                <label for='signin-password'>Password</label>
                <input class='form-control' id='signin-password' placeholder='Password' type='password'>
              </div>
            </form>
          </div>
          <div class='modal-footer'>
            <button class='btn btn-primary'>Sign in</button>
            <button class='btn btn-default' data-target='#signup' data-toggle='modal'>Sign up</button>
            <button class='btn btn-default' data-dismiss='modal'>Cancel</button>
          </div>
        </div>
      </div>
    </div>
    <div aria-hidden='true' aria-labeledby='signupmodal' class='modal fade' id='signup' role='dialog' tabindex='-1'>
      <div class='modal-dialog'>
        <div class='modal-content'>
          <div class='modal-header'>
            <button aria-hidden='true' class='close' data-dismiss='modal' type='button'>&times;</button>
            <h4 class='modal-title'>Sign Up</h4>
          </div>
          <div class='modal-body'>
            <form role='form'>
              <div class='form-group'>
                <label for='signup-username'>Username</label>
                <input class='form-control' id='signup-username' placeholder='Your username' type='text'>
              </div>
              <div class='form-group'>
                <label for='signup-email'>Email</label>
                <input class='form-control' id='signup-email' placeholder='Your Email' type='email'>
              </div>
              <div class='form-group'>
                <label for='signup-password1'>Password</label>
                <input class='form-control' id='signup-password1' placeholder='Enter Your Password' type='password'>
              </div>
              <div class='form-group'>
                <label for='signup-password2'>Re-Enter Password</label>
                <input class='form-control' id='signup-password2' placeholder='Enter Password Again' type='password'>
              </div>
            </form>
          </div>
          <div class='modal-footer'>
            <button class='btn btn-primary'>Submit</button>
            <button class='btn btn-default' data-dismiss='modal'>Cancel</button>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
