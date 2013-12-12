<div class="users index">
  <h1><?php echo __('Users'); ?></h1>
	<table class='table table-hover'>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('username'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('is_author'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($users as $user): ?>
	<tr>
		<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['is_author']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['created']); ?>&nbsp;</td>
		<td class="actions">
      <ul class='list-inline'>
        <li>
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id']),array('class' => 'btn btn-primary btn-xs')); ?>
        </li>
		<li>
			<?php if(AuthComponent::user('is_author')): ?>
				<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id']),array('class' => 'btn btn-primary btn-xs')); ?>
			<?php endif; ?>
        </li>
		<li>
			<?php if(AuthComponent::user('is_author')): ?>
				<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete',  $user['User']['id']), array('class' => 'btn btn-primary btn-xs'), __('Are you sure you want to delete # %s?',  $user['User']['id'])); ?>
			<?php endif; ?>
        </li>
      </ul>
    </td>
	</tr>
  <?php endforeach; ?>
  </table>
<?php echo $this->element('pagination'); ?>