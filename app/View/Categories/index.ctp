<div class="actions">
  <h1>Category List</h1>
  <ul class='list-group'>
  <?php foreach ($categories as $category): ?>
  <li class='list-group-item'>
    <a href='<?php echo $this->Html->url(array('action' => 'view', $category['Category']['id'])); ?>'><?php echo h($category['Category']['name']); ?>&nbsp;</a>
    <div class='actions pull-right'>
      <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $category['Category']['id']), array('class' => 'btn btn-xs btn-danger'), __('Are you sure you want to delete # %s?', $category['Category']['id'])); ?>
    </div>
  </li>
  <?php endforeach; ?>
  </ul>
  <h1>Add New Category</h1>
  <?php echo $this->Form->create('Category', array('class'=>'form-inline','url' => array('action' => 'add'))); ?>
  <?php echo $this->Form->input('name', array('div'=>array('class'=>'form-group'),'class'=>'form-control','label' => false)); ?>
  <input class='btn btn-primary' type='submit' value='Add Category'>
  <?php echo $this->Form->end(); ?>
</div>
