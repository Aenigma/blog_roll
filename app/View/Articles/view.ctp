<div class="articles view">
	<?php debug(); ?>
<h2><?php echo __('Article'); ?></h2>

</h1>
	<?php echo h($article['Article']['title']); ?>
</h1>
<div>
	<?php  h($article['Rating']); ?>
	
	<?php $sum=0 ;?>
	<?php foreach($article['Rating']as $rating): ?>
		<?php if ($rating["value"])
		{ $sum++;}
		else { $sum--;}?>
	<? endforeach;?>
	<?php echo $sum; ?>
</div>

<div>
<p>
	<?php echo h($article['Article']['body']); ?>
</p>
		
</div>

<div>
	<?php echo h($article['User']['username']); ?>
		
	<?php foreach($article['Comment'] as $comment) : ?>
	<?php echo $comment['body'];?>
	<?php echo $comment['id'];?>
	<? endforeach; ?>
	
</div>
	&nbsp;
		

</div>