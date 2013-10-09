<div class="articleImages index">
	<h2><?php echo __('Article Images'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('article_id'); ?></th>
			<th><?php echo $this->Paginator->sort('file'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($articleImages as $articleImage): ?>
	<tr>
		<td><?php echo h($articleImage['ArticleImage']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($articleImage['Article']['title'], array('controller' => 'articles', 'action' => 'view', $articleImage['Article']['id'])); ?>
		</td>
		<td><?php echo h($articleImage['ArticleImage']['file']); ?>&nbsp;</td>
		<td><?php echo h($articleImage['ArticleImage']['name']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $articleImage['ArticleImage']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $articleImage['ArticleImage']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $articleImage['ArticleImage']['id']), null, __('Are you sure you want to delete # %s?', $articleImage['ArticleImage']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Article Image'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Articles'), array('controller' => 'articles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Article'), array('controller' => 'articles', 'action' => 'add')); ?> </li>
	</ul>
</div>
