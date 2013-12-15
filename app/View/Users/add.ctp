<div class="users form">
<?php echo $this->Form->create('User', array('inputDefaults' => array('class'=>'form-control'))); ?>
  <h1><?php echo __('Add User'); ?></h1>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('email');
    if(AuthComponent::user('is_author')) {
      echo $this->Form->input('is_author', array('options' => array(1 => 'Yes', 0 => 'No')));
    }
    echo $this->Form->submit('Submit', array('class' => 'btn btn-default'));
    echo $this->Form->end();
	?>
</div>
