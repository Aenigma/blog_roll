<div class="users view">
<h1><?php echo __($user['UserProfile']['first_name'] . ' ' . $user['UserProfile']['last_name']); ?></h1>
  <div class= "row">
    <div class="related col-md-8">
		<?php if (!empty($articles)): ?>
			<?php foreach($articles as $article): ?>
				<?php echo $this->element('article', array('article' => $article, 'clip' => true, 'show_comments' => false)); ?>
			<?php endforeach; ?>
		<?php endif; ?>
		<?php echo $this->element('pagination'); ?>
    </div>
    <div class="col-md-4">
      <div class="centered">
        <img src="holder.js/250x250" alt="Profile image"/>
      </div>
      <div class="pull-left">
        <dl class="dl-horizontal">
          <dt><?php echo __('Email'); ?></dt>
		  <dd>
             <a data-toggle="modal" href="#emailmodal"><?php echo h($user['User']['email']); ?></a>&nbsp;
            &nbsp;			
          </dd>
		  <dt><?php echo __('First Name'); ?></dt>
          <dd>
            <?php echo h($user['UserProfile']['first_name']); ?>
            &nbsp;			
          </dd>
          <dt><?php echo __('Last Name'); ?></dt>
          <dd>
            <?php echo h($user['UserProfile']['last_name']); ?>
            &nbsp;			
          </dd>
          <dt><?php echo __('Birthdate'); ?></dt>
          <dd>
            <?php echo h($user['UserProfile']['birthdate']); ?>
            &nbsp;			
          </dd>
          <dt><?php echo __('Home Page'); ?></dt>
          <dd>
            <?php echo h($user['UserProfile']['homepage']); ?>
            &nbsp;			
          </dd>
          <dt><?php echo __('Facebook'); ?></dt>
          <dd>
            <?php echo h($user['UserProfile']['facebook']); ?>
            &nbsp;			
          </dd>
          
          <dt><?php echo __('Twitter'); ?></dt>
          <dd>
            <?php echo h($user['UserProfile']['twitter']); ?>
            &nbsp;			
          </dd>
		   <dt><?php echo __('About Me'); ?></dt>
          <dd>
            <?php echo h($user['UserProfile']['about_me']); ?>
            &nbsp;			
          </dd>
        </dl>
      </div>
    </div>
</div>

<div class="modal fade" id="emailmodal" tabindex="-1" role="dialog" aria-labelledby="emailmodal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> </button>
        <h4 class="modal-title">Send email</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="email-address">Address</label>
          <input class="form-control" id="email-address" placeholder="email-address" type="text">
        </div>
      </div>
      <div class="form-group">
        <label for="email-subject">Email-subject</label>
        <input class="form-control" id="email-subject" placeholder="email-subject" type="text">
      </div>
      <div class="form-group">
        <label for="email-body">Body</label>
        <textarea class="form-control" id="email-body"> 
        </textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary"> Submit </button>
      </div>
    </div>
  </div>
</div>
