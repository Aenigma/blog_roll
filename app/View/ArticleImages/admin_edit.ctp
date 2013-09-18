<div class="articleImages form">
<?php echo $this->Form->create('ArticleImage'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Article Image'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('article_id');
		echo $this->Form->input('file');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ArticleImage.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ArticleImage.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Article Images'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Articles'), array('controller' => 'articles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Article'), array('controller' => 'articles', 'action' => 'add')); ?> </li>
	</ul>
</div>
