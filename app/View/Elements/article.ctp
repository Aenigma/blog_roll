<!-- Requires the $article variable. -->
<?php $user = AuthComponent::user('username'); ?>
<article>
	<section class='article-metadata'>
		 <h2><?php echo $article['Article']['title']; ?></h2>
		Posted on
		<time datetime='<?php echo $article['Article']['created']; ?>'><?php echo CakeTime::format($article['Article']['created'], '%B %e, %Y'); ?></time>
		by
		
		<?php if(!empty($article['User']['UserProfile'])): ?> 
			<?php echo $this->Html->link($article['User']['UserProfile']['first_name'] . ' ' . $article['User']['UserProfile']['last_name'], array('controller' => 'users', 'action' => 'view', $article['User']['id'])); ?>
		<?php else: ?>
			<?php echo $this->Html->link($article['User']['username'], array('controller' => 'users', 'action' => 'view', $article['User']['id']), array('rel' => 'author')); ?>
		<?php endif; ?>
		
		<ul class='list-inline'>
			<ul class='list-inline'>
              <?php foreach ($article['Category'] as $category): ?>
                <li>
                  <span class='label label-info'>
                    <?php echo $this->Html->link($category['name'], array('controller' => 'categories', 'action' => 'view', $category['id']), array('style' => 'color: #FFF;')); ?>
                  </span>  
                </li>
              <? endforeach; ?>
            </ul>
		</ul>
	</section>
	<hr />
	<!-- This entire section should probably be HTML from server -->
	<div class='article-body'>
		<?php if(!empty($clip) && strlen($article['Article']['body']) > 512): ?>
			<?php echo substr($article['Article']['body'], 0, 512); ?>
		<?php else: ?>	
			<?php echo $article['Article']['body']; ?>
		<?php endif; ?>
	</div>
	<hr />
	<div class='article-extras'>
		<?php if(!empty($user)): ?>
			<?php echo $this->Html->link('', array('controller' => 'ratings', 'action' => 'upvote', $article['Article']['id']), array('class' => 'glyphicon glyphicon-chevron-up upvote')); ?>
		<?php endif; ?>
		
		<?php $rating = 0; ?>
		<?php $ratings = Set::extract('/value', $article['Rating']); ?>
		<?php foreach($ratings as $rate): ?>
			<?php if($rate): ?>
				<?php $rating++; ?>
			<?php else: ?>
				<?php $rating--; ?>
			<?php endif; ?>
		<?php endforeach; ?>
		
		<span class='badge <?php
                  if ($rating > 0)
                    echo 'votes-positive';
                  else if ($ratings < 0)
                    echo 'votes-negative';
                  else
                    echo 'votes-zero';
                  ?>'>
			  <?php echo $rating;?>
		</span>
		
		<?php if(!empty($user)): ?>
			<?php echo $this->Html->link('', array('controller' => 'ratings', 'action' => 'downvote', $article['Article']['id']), array('class' => 'glyphicon glyphicon-chevron-down')); ?>
		<?php endif; ?>
		
		<?php if(!empty($user)): ?>
			<?php echo $this->Html->link('Comment', array('controller' => 'comments', 'action' => 'add', $article['Article']['id']), array('class' => 'btn btn-primary btn-sm', 'type' => 'button')); ?>
			<?php if(AuthComponent::user('is_author')): ?>
				<?php echo $this->Html->link('Edit', array('controller' => 'articles', 'action' => 'edit', $article['Article']['id']), array('class' => 'btn btn-primary btn-sm', 'type' => 'button')); ?>
			<?php endif; ?>
		<?php endif; ?>
		
		<?php if(!empty($clip)): ?>
			<?php echo $this->Html->link('Read More',
				array('controller'=>'articles','action'=>'view',
				$article['Article']['id']), array('class' => 'btn btn-primary btn-sm')); ?>
		<?php endif; ?>
		
		<div class='article-extras-social pull-right'>
      <div class='fb-share-button' data-type='button_count' style='vertical-align: top'></div>
      <div class='g-plus' data-action='share' data-annotation='bubble'></div>
      <a href='https://twitter.com/share' class='twitter-share-button'>Tweet</a>
		</div>
	</div>
	<hr />
	<?php if(!empty($show_comments)): ?>
		<div class='article-comments media'>
			<ul class='media-list'>
				<?php foreach($article['Comment'] as $comment): ?>
					<li class='comment media'>
						<img class='pull-left' src='holder.js/50x50/'>
						<div class='media-body'>
							<div class='media-heading'>
								Posted on
								<time datetime='<?php echo $comment['created']; ?>'>September 17, 2013</time>
								by
								<?php if(!empty($comment['User']['UserProfile'])): ?>
									<?php echo $this->Html->link($comment['User']['UserProfile']['first_name'] . ' ' . $comment['User']['UserProfile']['last_name'], array('controller' => 'users', 'action' => 'view', $comment['user_id'])); ?>
								<?php else: ?>
									<?php echo $this->Html->link($comment['User']['username'], array('controller' => 'users', 'action' => 'view', $comment['user_id'])); ?>
								<?php endif; ?>
							</div>
							<div class='comment-body'>
								<?php echo $comment['body']; ?>
							</div>
							
							<?php if(!empty($user)): ?>
								<div class='comment-actions'>
									<?php if($user == $comment['User']['username']): ?>
										<?php echo $this->Html->link('Edit', array('controller' => 'comments', 'action' => 'edit', $comment['id']), array('type' => 'button', 'class' => 'btn btn-primary btn-xs')); ?>
										<?php echo $this->Html->link('Delete', array('controller' => 'comments', 'action' => 'delete', $comment['id']), array('type' => 'button', 'class' => 'btn btn-danger btn-xs')); ?>
									<?php endif; ?>
								</div>
							<?php endif; ?>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	<?php endif; ?>
</article>