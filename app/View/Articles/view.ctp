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
<div class="article-extras">
              <span class="glyphicon glyphicon-chevron-up upvote"></span>
              <span class="badge">10</span>
              <span class="glyphicon glyphicon-chevron-down"></span>
              <button class="btn btn-primary btn-sm" type="button">Comment</button>
              <a class="btn btn-primary btn-sm" href="articleedit.html">Edit</a>
              <div class="article-extras-social pull-right">
                <button class="btn btn-xs" type="button">Facebook</button>
                <button class="btn btn-xs" type="button">Google+</button>
                <button class="btn btn-xs" type="button">Twitter</button>
              </div>
            </div>


	&nbsp;
		

</div>