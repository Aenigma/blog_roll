<div class="userProfiles index">
	<h2><?php echo __('User Profiles'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('first_name'); ?></th>
			<th><?php echo $this->Paginator->sort('last_name'); ?></th>
			<th><?php echo $this->Paginator->sort('birthdate'); ?></th>
			<th><?php echo $this->Paginator->sort('gender'); ?></th>
			<th><?php echo $this->Paginator->sort('about_me'); ?></th>
			<th><?php echo $this->Paginator->sort('homepage'); ?></th>
			<th><?php echo $this->Paginator->sort('facebook'); ?></th>
			<th><?php echo $this->Paginator->sort('twitter'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($userProfiles as $userProfile): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($userProfile['User']['id'], array('controller' => 'users', 'action' => 'view', $userProfile['User']['id'])); ?>
		</td>
		<td><?php echo h($userProfile['UserProfile']['first_name']); ?>&nbsp;</td>
		<td><?php echo h($userProfile['UserProfile']['last_name']); ?>&nbsp;</td>
		<td><?php echo h($userProfile['UserProfile']['birthdate']); ?>&nbsp;</td>
		<td><?php echo h($userProfile['UserProfile']['gender']); ?>&nbsp;</td>
		<td><?php echo h($userProfile['UserProfile']['about_me']); ?>&nbsp;</td>
		<td><?php echo h($userProfile['UserProfile']['homepage']); ?>&nbsp;</td>
		<td><?php echo h($userProfile['UserProfile']['facebook']); ?>&nbsp;</td>
		<td><?php echo h($userProfile['UserProfile']['twitter']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $userProfile['UserProfile']['user_id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $userProfile['UserProfile']['user_id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $userProfile['UserProfile']['user_id']), null, __('Are you sure you want to delete # %s?', $userProfile['UserProfile']['user_id'])); ?>
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
		<li><?php echo $this->Html->link(__('New User Profile'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
