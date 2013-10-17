<div class="users view">
<h2><?php echo __('User'); ?></h2>
<?php $userProfile = $user['UserProfile']; ?>
	<dl class="dl-horizontal">
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Author'); ?></dt>
		<dd>
			<?php echo h($user['User']['is_author']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($user['User']['created']); ?>
			&nbsp;			
		</dd>
		<dt><?php echo __('Firstname'); ?></dt>
		<dd>
			<?php echo h($userProfile['first_name']); ?>
			&nbsp;			
		</dd>
		
		
		<dt><?php echo __('Lastname'); ?></dt>
		<dd>
			<?php echo h($userProfile['last_name']); ?>
			&nbsp;			
		</dd>
		
		<dt><?php echo __('birthdate'); ?></dt>
		<dd>
			<?php echo h($userProfile['birthdate']); ?>
			&nbsp;			
		</dd>
		
		<dt><?php echo __('about_me'); ?></dt>
		<dd>
			<?php echo h($userProfile['about_me']); ?>
			&nbsp;			
		</dd>
		
		<dt><?php echo __('homepage'); ?></dt>
		<dd>
			<?php echo h($userProfile['homepage']); ?>
			&nbsp;			
		</dd>
		
		<dt><?php echo __('facebook'); ?></dt>
		<dd>
			<?php echo h($userProfile['facebook']); ?>
			&nbsp;			
		</dd>
		
		<dt><?php echo __('twitter'); ?></dt>
		<dd>
			<?php echo h($userProfile['twitter']); ?>
			&nbsp;			
		</dd>
		
		
		
	</dl>
</div>

<div class="related">
	<h3><?php echo __('Related Articles'); ?></h3>
	<?php if (!empty($user['Article'])): ?>
	<table class='table' cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Body'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Article'] as $article): ?>
		<tr>
			<td><?php echo $article['id']; ?></td>
			<td><?php echo $article['user_id']; ?></td>
			<td><?php echo $article['created']; ?></td>
			<td><?php echo $article['title']; ?></td>
			<td><?php echo $article['body']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'articles', 'action' => 'view', $article['id']),array('class'=>'btn btn-primary btn-xs')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'articles', 'action' => 'edit', $article['id']),array('class'=>'btn btn-primary btn-xs')); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'articles', 'action' => 'delete', $article['id']), array('class'=>'btn btn-primary btn-xs'), __('Are you sure you want to delete # %s?', $article['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</div>


