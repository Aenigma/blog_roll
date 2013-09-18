<div class="articleImages view">
<h2><?php echo __('Article Image'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($articleImage['ArticleImage']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Article'); ?></dt>
		<dd>
			<?php echo $this->Html->link($articleImage['Article']['title'], array('controller' => 'articles', 'action' => 'view', $articleImage['Article']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('File'); ?></dt>
		<dd>
			<?php echo h($articleImage['ArticleImage']['file']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($articleImage['ArticleImage']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Article Image'), array('action' => 'edit', $articleImage['ArticleImage']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Article Image'), array('action' => 'delete', $articleImage['ArticleImage']['id']), null, __('Are you sure you want to delete # %s?', $articleImage['ArticleImage']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Article Images'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Article Image'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Articles'), array('controller' => 'articles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Article'), array('controller' => 'articles', 'action' => 'add')); ?> </li>
	</ul>
</div>
