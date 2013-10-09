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
            <li class='active'>
              <a href='/'>Home</a>
            </li>
            <li class='dropdown'>
              <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
                Archives
                <b class='caret'></b>
              </a>
              <ul class='dropdown-menu'>
                <li>
                  <a href='/authors/'>By Author...</a>
                </li>
                <li>
                  <a href='/categories/'>By Category...</a>
                </li>
                <li>
                  <a href='/posts/'>By Date...</a>
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
		<?php echo $this->Session->flash(); ?>
		<?php echo $this->fetch('content'); ?>
		<?php //echo $this->element('sql_dump'); ?>
    </div>
  </body>
</html>
