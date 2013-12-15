<div class="userProfiles form">
<?php echo $this->Form->create('UserProfile',array('inputDefaults' => array('class'=>'form-control'))); ?>
<h1> <?php echo __('Edit User Profile'); ?></h1>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('first_name',array('div' => array ('class' => 'form-group')));
		echo $this->Form->input('last_name',array('div' => array ('class' => 'form-group')));
		echo $this->Form->input('birthdate',array('div' => array ('class' => 'form-group')));
		echo $this->Form->input('gender',array('div' => array ('class' => 'form-group')));
		echo $this->Form->input('about_me',array('type'=>'textarea','div' => array ('class' => 'form-group')));
		echo $this->Form->input('homepage',array('div' => array ('class' => 'form-group')));
		echo $this->Form->input('facebook',array('div' => array ('class' => 'form-group')));
		echo $this->Form->input('twitter',array('div' => array ('class' => 'form-group')));
    echo $this->Form->submit('Submit',array('class'=>'btn btn-default')); 
    echo $this->Form->end();
  ?>
</div>
