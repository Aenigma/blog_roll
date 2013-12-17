<h1><?php echo __('Add Comment'); ?></h1>
<?php echo $this->Form->create('Comment',array('inputDefaults' => array('class' => 'form-control'))); ?>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('article_id');
		echo $this->Form->input('body');
	?>
<?php echo $this->Form->end(__('Submit')); ?>
