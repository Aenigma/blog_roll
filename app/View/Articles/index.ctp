<?php foreach ($articles as $article): ?>
  <div class='article' style='margin-top: 5px;'>
    <div class='row'>
      <div class='col-md-2'>
        <!-- <span class='badge voted' style='margin: 15px 15px 15px 15px;'>
			
        </span> -->
		<?php if(!empty($article['ArticleImage'])): ?>
			<img src='holder.js/70x70' alt='optional thumbnail'/>
		<?php endif; ?>
      </div>
      <div class='col-md-10'>
        <div class='article-meta'>
          <h2><?php echo $article['Article']['title']; ?></h2>
		 
		  Posted on
		  <time datetime='<?php echo $article['Article']['created']; ?>'><?php echo CakeTime::format($article['Article']['created'], '%B %e, %G @ %I:%M %p'); ?></time>
		  by
         
            <?php
              echo $this->Html->link($article['User']['username'],
                array('controller'=>'users','action'=>'view',
                $article['User']['id']));
            ?>

          <div class='categories'>
            <ul class='list-inline'>
              <?php foreach ($article['Category'] as $category): ?>
                <li>
                  <span class='label label-info'>
                    <?php echo $this->Html->link($category['name'], array('controller' => 'categories', 'action' => 'view', $category['id']), array('style' => 'color: #FFF;')); ?>
                  </span>  
                </li>
              <? endforeach; ?>
            </ul>
          </div>
        </div>
		<div class='article-body'>
		  <p>
			<?php if(strlen($article['Article']['body']) > 512): ?>
				<?php echo substr($article['Article']['body'], 0, 512); ?>
			<?php else: ?>
				<?php echo $article['Article']['body']; ?>
			<?php endif; ?>
		  </p>
		</div>
		<div class='article-extras'>
			<?php $rating = 0; ?>
			<?php $ratings = Set::extract('/value', $article['Rating']); ?>
			<?php foreach($ratings as $rate): ?>
				<?php if($rate): ?>
					<?php $rating++; ?>
				<?php else: ?>
					<?php $rating--; ?>
				<?php endif; ?>
			<?php endforeach; ?>
			<span class='glyphicon glyphicon-chevron-up <?php if($rating > 0) echo 'upvote'; ?>'></span>
			<span class='badge'><?php echo $rating;?></span>
			<span class='glyphicon glyphicon-chevron-down <?php if($rating < 0) echo 'downvote'; ?>'></span>
			<span style="padding: 0.5em;">&nbsp;</span>
			 <?php echo $this->Html->link('Read More',
              array('controller'=>'articles','action'=>'view',
              $article['Article']['id']), array('class' => 'btn btn-primary btn-xs')); ?>
		</div>
      </div>
    </div>    
  </div>
<?php endforeach; ?>
<?php echo $this->element('pagination'); ?>