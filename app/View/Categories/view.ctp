<h1><?php echo h($category['Category']['name']); ?></h1>
<?php if(!empty($articles)): ?>
	<?php foreach ($articles as $article): ?>
		<?php echo $this->element('article', array('article' => $article, 'clip' => true, 'show_comments' => false)); ?>
	<?php endforeach; ?>
	<?php echo $this->element('pagination'); ?>
<?php endif; ?>
