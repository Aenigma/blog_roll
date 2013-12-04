<?php foreach ($articles as $article): ?>
    <?php echo $this->element('article', array('article' => $article, 'clip' => true, 'show_comments' => false)); ?>
<?php endforeach; ?>
<?php echo $this->element('pagination'); ?>
