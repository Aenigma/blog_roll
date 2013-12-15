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
    <?php
    // JS hosted locally
    echo $this->Html->script('voting');
    ?>
    <!-- Start Social Media Libraries -->
    <script type="text/javascript">
      (function() {
        var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
        po.src = 'https://apis.google.com/js/platform.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
      })();
    </script>
    <script>
      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=1434525856763811";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
    <script>
      !function(d,s,id){
        var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');
    </script>
    <?php if(isset($viewTitle)): ?>
    <title>Blog So Hard | <?php echo $viewTitle; ?></title>
    <?php else: ?>
    <title>Blog So Hard</title>
    <?php endif ?>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src='//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js'></script>
      <script src='//cdnjs.cloudflare.com/ajax/libs/respond.js/1.3.0/respond.js'></script>
    <![endif]-->
  </head>
  <body class='floating-body'>
    <div id="fb-root"></div>
    <div class='navbar navbar-default navbar-fixed-top'>
      <div class='container'>
        <div class='navbar-header'>
          <button class='navbar-toggle' data-target='.navbar-collapse' data-toggle='collapse' type='button'>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
          </button>
          <?php echo $this->Html->link('Blog So Hard','/',array('class'=>'navbar-brand blogroll-brand')); ?>
        </div>
        <div class='collapse navbar-collapse'>
          <ul class='nav navbar-nav'>
            <li class='dropdown'>
              <?php
              echo $this->Html->link('Navigation' . $this->Html->tag('b', '',array('class'=>'caret')), '#',array('escape'=>false,'data-toggle'=>'dropdown'));
              ?>
                <ul class='dropdown-menu'>
                <li>
                <?php
                  echo $this->Html->link('Articles by Author...','/articles/index/sort:author/direction;asc');
                ?> </li>
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
            <?php if(AuthComponent::user('is_author')): ?>
              <li class='dropdown'>
                <?php
                  echo $this->Html->link('Admin' .
                    $this->Html->tag('b', '',array('class'=>'caret')),
                    '#',array('escape'=>false,'data-toggle'=>'dropdown'));
                ?>
                <ul class='dropdown-menu'>
                  <li>
                  <?php
                    echo $this->Html->link('Create an article...',array('controller'=>'articles','action'=>'add'));
                  ?>
                  </li>
                </ul>
              </li>
            <?php endif ?>
          </ul>
          <?php $is_loggedin = AuthComponent::user(); ?>
          <?php if(empty($is_loggedin)): ?>
          <ul class='nav navbar-nav navbar-right'>
            <li>
              <a class='btn' data-toggle='modal' href='#signin'>
                Sign in
              </a>
            </li>
          </ul>
          <?php else: ?>
          <ul class='nav navbar-nav navbar-right'>
            <li class='dropdown'>
              <?php
                  $user_profile = AuthComponent::user('UserProfile');
                  $name = AuthComponent::user('username');
                  if ($user_profile['first_name'] != null && $user_profile['last_name'] != null)
                    $name = $user_profile['first_name'] . ' ' . $user_profile['last_name'];
                  echo $this->Html->link($name,
                    '#',array('data-toggle'=>'dropdown'));
                ?>
                <ul class='dropdown-menu'>
                  <li>
                    <?php
                    echo $this->Html->link(
                      'User Profile', 
                      array(
                        'controller'=>'users',
                        'action'=>'view',
                        AuthComponent::user('id')
                      ));
                    ?>
                  </li>
                  <li>
                  <?php
                  echo $this->Html->link(
                    'Log Out',
                    array(
                      'controller'=>'users',
                      'action'=>'logout'
                    ));
                  ?>
                  </li>
                </ul>
            </li>
          </ul>
          <?php endif; ?>
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
    </div>
    <div aria-hidden='true' aria-labelledby='SignInIndexForm' class='modal fade' id='signin' role='dialog' tabindex='-1'>
      <div class='modal-dialog'>
        <div class='modal-content'>
          <div class='modal-header'>
            <button aria-hidden='true' class='close' data-dismiss='modal' type='button'>&times;</button>
            <h4 class='modal-title'>Sign In</h4>
          </div>
          <?php echo $this->Form->create('User', array("url" => array('controller' => 'users', 'action' => 'login'), "role" => 'form')); ?>
            <div class='modal-body'>
              <div class='form-group'>
                <?php echo $this->Form->input('username', array('class' => 'form-control','div' => false, 'label' => 'Username','placeholder'=>'Your username')); ?>
              </div>
              <div class='form-group'>
                <?php echo $this->Form->input('password', array('class' => 'form-control', 'div' => false, 'label' => 'Password', 'placeholder'=>'Your password')); ?>
              </div>
            </div>
            <div class='modal-footer'>
              <button class='btn btn-primary'>Sign in</button>
              <button class='btn btn-default' data-target='#signup' data-toggle='modal'>Sign up</button>
              <button class='btn btn-default' data-dismiss='modal'>Cancel</button>
            </div>
          <?php echo $this->Form->end(); ?>
        </div>
      </div>
    </div>
    <div aria-hidden='true' aria-labelledby='SignUpIndexForm' class='modal fade' id='signup' role='dialog' tabindex='-1'>
      <div class='modal-dialog'>
        <div class='modal-content'>
          <div class='modal-header'>
            <button aria-hidden='true' class='close' data-dismiss='modal' type='button'>&times;</button>
            <h4 class='modal-title'>Sign Up</h4>
          </div>
            <?php //echo $this->Form->input("User", array("role" => 'form')); ?>
            <?php echo $this->Form->create('User', array("url" => array('controller' => 'users', 'action' => 'add'), 'role' => 'form')); ?>
            <div class='modal-body'>
              <?php echo $this->Form->input('username', array('class' => 'form-control', 'div' => false, 'label' => 'Username','placeholder' => 'Your Username')); ?>
              <?php echo $this->Form->input('email', array('class' => 'form-control', 'div' => false, 'label' => 'Email','placeholder' => 'Your Email')); ?>
              <?php echo $this->Form->input('password', array('class' => 'form-control', 'div' => false, 'label' => 'Password','placeholder' => 'Your Email')); ?>
            </div>
            <div class='modal-footer'>
              <?php echo $this->Form->submit('Submit', array('class' => 'btn btn-primary')); ?>
              <button class='btn btn-default' data-dismiss='modal'>Cancel</button>
            </div>
          <?php echo $this->Form->end(); ?>
        </div>
      </div>
    </div>
  </body>
</html>
