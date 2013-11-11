<?php foreach ($articles as $article): ?>
  <div class='article' style='margin-top: 5px;'>
    <div class='row'>
      <div class='col-md-2'>
        <span class='badge voted' style='margin: 15px 15px 15px 15px;'>
          <?php echo "-100";?>
        </span>
        <img src='holder.js/70x70' alt='optional thumbnail'/>
      </div>
      <div class='col-md-10'>
        <div class='article-meta'>
          <?php
            echo $this->Html->link($article['Article']['title'],
              array('controller'=>'articles','action'=>'view',
              $article['Article']['id']));
          ?>
          <span class='author'>
            <?php
              echo $this->Html->link($article['User']['username'],
                array('controller'=>'users','action'=>'view',
                $article['User']['id']));
            ?>
          </span>
          <div class='categories'>
            <ul class='list-inline'>
              <?php foreach (array('Category1','Category2') as $category): ?>
                <li>
                  <span class='label label-info'>
                    <?php
                      echo $category;
                    ?>
                  </span>
                </li>
              <? endforeach; ?>
            </ul>
          </div>
        </div>
      </div>
    </div>    
  </div>
<?php endforeach; ?>
<?php echo $this->element('pagination'); ?>
<?php //debug($articles); ?>
