
<h1><?php echo h($category['Category']['name']); ?></h1>
	
<?php foreach ($category['Article'] as $article): ?>
	<article>
		<section class='article-metadata'>
		  <h3><?php echo h($article['title']); ?></h3>
		  Posted on
		  <time datetime='2013-09-17 15:00'><?php echo h($article['created']); ?></time>
		  by
		 <li><?php echo $this->Html->link(__('New Article'), array('controller' => 'articles', 'action' => 'add')); ?> </li>
		  <ul class='list-inline'>
			<li>
			  <a href='./categories/1'>
				<span class='label label-info'>Category1</span>
			  </a>
			</li>
			<li>
			  <a href='./categories/2'>
				<span class='label label-info'>Category2</span>
			  </a>
			</li>
		  </ul>
		</section>
		<!-- This entire section should probably be HTML from server -->
		<div class='article-body'>
		  <?php echo h($article['body']); ?>
		</div>
		<div class='article-extras'>
		  <span class='glyphicon glyphicon-chevron-up upvote'></span>
		  <span class='badge'>10</span>
		  <span class='glyphicon glyphicon-chevron-down'></span>
		  <button class='btn btn-primary btn-sm' type='button'>Comment</button>
		  <a class='btn btn-primary btn-sm' href='articleedit.html'>Edit</a>
		  <div class='article-extras-social pull-right'>
			<button class='btn btn-xs' type='button'>Facebook</button>
			<button class='btn btn-xs' type='button'>Google+</button>
			<button class='btn btn-xs' type='button'>Twitter</button>
		  </div>
		</div>
	</article>
<?php endforeach; ?>
</div>
