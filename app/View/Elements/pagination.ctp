<div class='paging centered'>
  <ul class='pagination'>
    <li>
    <?php echo $this->Paginator->prev('&laquo;',
      array('escape'=>false, 'tag'=>false),
      null,
      array('escape'=>false, 'tag'=>'a', 'class'=>'disabled'));
    ?>
    </li>
    <?php
    echo $this->Paginator->numbers(array(
      'separator' => '',
      'tag' => 'li',
      'currentTag' => 'a',
      'currentClass' => 'active'
      ));
    ?>
    <li>
    <?php echo $this->Paginator->next('&raquo;',
      array('escape'=>false, 'tag'=>false),
      null,
      array('escape'=>false, 'tag'=>'a', 'class'=>'disabled'));
    ?>
    </li>
  </ul>
</div>
