<h1>Editing: <?php echo $this->request->data['Article']['title']; ?></h1>
<?php echo $this->Form->create('Article', array('inputDefaults' => array('class' => 'form-control'))); ?>
	<?php echo $this->Form->input('id'); ?>	
	<?php echo $this->Form->input('title', array('div' => array('class' => 'form-group'))); ?>
	<?php echo $this->Form->input('Category', array('div' => array('class' => 'form-group'))); ?>
	<?php echo $this->Form->input('body', array('type' => 'textarea', 'div' => array('class' => 'form-group'))); ?>
	<?php echo $this->Form->submit('Submit', array('class' => 'btn btn-default')); ?>
<?php echo $this->Form->end(); ?>
<?php
  $article = $this->request->data;
  echo $this->Form->postLink(__('Delete'),
    array('action' => 'delete',  $article['Article']['id']),
    array('class' => 'btn btn-default'),
    __('Are you sure you want to delete # %s?',
    $article['Article']['id'])
  );
?>
