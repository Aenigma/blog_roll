<div class="articles view">
<h2><?php echo __('Article'); ?></h2>
	<dl>
	
		<dd>
			<?php echo h($article['Article']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($article['User'], array('controller' => 'users', 'action' => 'view', $article['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($article['Article']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($article['Article']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Body'); ?></dt>
		<dd>
			<?php echo h($article['Article']['body']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Article'), array('action' => 'edit', $article['Article']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Article'), array('action' => 'delete', $article['Article']['id']), null, __('Are you sure you want to delete # %s?', $article['Article']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Articles'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Article'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Article Images'), array('controller' => 'article_images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Article Image'), array('controller' => 'article_images', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Comments'), array('controller' => 'comments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comment'), array('controller' => 'comments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ratings'), array('controller' => 'ratings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rating'), array('controller' => 'ratings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Article Images'); ?></h3>
	<?php if (!empty($article['ArticleImage'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Article '); ?></th>
		<th><?php echo __('File'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($article['ArticleImage'] as $articleImage): ?>
		<tr>
			<td><?php echo $articleImage['id']; ?></td>
			<td><?php echo $articleImage['article']; ?></td>
			<td><?php echo $articleImage['file']; ?></td>
			<td><?php echo $articleImage['name']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('  View  '), array('controller' => 'article_images', 'action' => '  view ', $articleImage['id'])); ?>
				<?php echo $this->Html->link(__('  Edit  '), array('controller' => 'article_images', 'action' => '  edit  ', $articleImage['id'])); ?>
				<?php echo $this->Form->postLink(__('  Delete  '), array('controller' => 'article_images', '  action  ' => '  delete', $articleImage['id']), null, __('Are you sure you want to delete # %s?', $articleImage['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Article Image'), array('controller' => 'article_images', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Comments'); ?></h3>
	<?php if (!empty($article['Comment'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id '); ?></th>
		<th><?php echo __(' User Id'); ?></th>
		<th><?php echo __(' Article Id'); ?></th>
		<th><?php echo __(' Created'); ?></th>
		<th><?php echo __(' Body'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($article['Comment'] as $comment): ?>
		<tr>
			<td><?php echo $comment['id']; ?></td>
			<td><?php echo $comment['user_id']; ?></td>
			<td><?php echo $comment['article_id']; ?></td>
			<td><?php echo $comment['created']; ?></td>
			<td><?php echo $comment['body']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'comments', 'action' => 'view', $comment['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'comments', 'action' => 'edit', $comment['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'comments', 'action' => 'delete', $comment['id']), null, __('Are you sure you want to delete # %s?', $comment['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Comment'), array('controller' => 'comments', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Ratings'); ?></h3>
	<?php if (!empty($article['Rating'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Article Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Value'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($article['Rating'] as $rating): ?>
		<tr>
			<td><?php echo $rating['id']; ?></td>
			<td><?php echo $rating['article_id']; ?></td>
			<td><?php echo $rating['user_id']; ?></td>
			<td><?php echo $rating['value']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__(' View '), array('controller' => 'ratings', 'action' => 'view', $rating['id'])); ?>
				<?php echo $this->Html->link(__(' Edit '), array('controller' => 'ratings', 'action' => 'edit', $rating['id'])); ?>
				<?php echo $this->Form->postLink(__(' Delete '), array('controller' => 'ratings', 'action' => 'delete', $rating['id']), null, __('Are you sure you want to delete # %s?', $rating['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Rating'), array('controller' => 'ratings', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Categories'); ?></h3>
	<?php if (!empty($article['Category'])): ?>
	<table cellpadding = "5" cellspacing = "5">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($article['Category'] as $category): ?>
		<tr>
			<td><?php echo $category['id']; ?></td>
			<td><?php echo $category['name']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'categories', 'action' => 'view', $category['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'categories', 'action' => 'edit', $category['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'categories', 'action' => 'delete', $category['id']), null, __('Are you sure you want to delete # %s?', $category['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>