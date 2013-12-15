<h1>Editing: <?php echo $this->request->data['User']['username']; ?></h1>
<?php echo $this->Form->create('User', array('inputDefaults' => array('class' => 'form-control'))); ?>
	<?php echo $this->Form->input('id'); ?>
	<?php echo $this->Form->input('username'); ?>
	<?php echo $this->Form->input('password', array('value' => '')); ?>
	<?php echo $this->Form->input('email'); ?>
  <?php echo $this->Form->input('is_author', array('options' => array(1 => 'Yes', 0 => 'No'))); ?>
	<?php echo $this->Form->submit('Submit', array('class' => 'btn btn-default')); ?>
<?php echo $this->Form->end(); ?>
