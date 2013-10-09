<?php foreach ($articles as $article): ?>
	<article>
		<section class='article-metadata'>
		  <h2><?php echo h($article['Article']['title']); ?></h2>
		  Posted on
		  <time datetime='2013-09-17 15:00'><?php echo h($article['Article']['created']); ?></time>
		  by
		  <?php echo $this->Html->link($article['User']['username'], array('controller' => 'users', 'action' => 'view', $article['User']['id']), array('rel' => 'author')); ?>
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
		  <?php echo h($article['Article']['body']); ?>
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
<?php //debug($articles); ?>