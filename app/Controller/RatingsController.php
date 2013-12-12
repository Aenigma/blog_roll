<?php
App::uses('AppController', 'Controller');

/**
 * Ratings Controller
 *
 * @property Rating $Rating
 * @property PaginatorComponent $Paginator
 */
 
class RatingsController extends AppController {

	public $layout = 'ajax';
	public $autoRender = false;
	

	public function upvote($article_id = null) { 
		if($this->Rating->Article->exists($article_id)) { 
			if ($this->request->is('post') && $this->request->is('ajax')) {
				$exists = $this->Rating->find('list', array(
					'conditions' => array(
						'Rating.article_id' => $article_id,
						'Rating.user_id' => AuthComponent::user('id')
					)
				));

				if(empty($exists)) {
					$this->Rating->create();
					
					$rating = array(
						'article_id' => $article_id, 
						'user_id' => AuthComponent::user('id'), 
						'value' => true
					);
					
					if ($this->Rating->save($rating)) {
						$this->set('result', true);
						$this->set('error', false);
					} else {
						$this->set('result', false);
						$this->set('error', 'Could not Create the Rating');
					}
				} else {
					$this->set('result', false);
					$this->set('error', "You've already voted!");
				}
				$this->set('_serialize', array('result', 'error')); 
				$this->render(); 
			} else {
				throw new BadRequestException('Not Ajax!');
			}
		} else {
			throw new NotFoundException('Not an Article!');
		}
	}
	
	public function downvote($article_id = null) {
		if($this->Rating->Article->exists($article_id)) { 
			if ($this->request->is('post') && $this->request->is('ajax')) {
				$exists = $this->Rating->find('list', array(
					'conditions' => array(
						'Rating.article_id' => $article_id,
						'Rating.user_id' => AuthComponent::user('id')
					)
				));

				if(empty($exists)) {
					$this->Rating->create();
					
					$rating = array(
						'article_id' => $article_id, 
						'user_id' => AuthComponent::user('id'), 
						'value' => false
					);
					
					if ($this->Rating->save($rating)) {
						$this->set('result', true);
						$this->set('error', false);
					} else {
						$this->set('result', false);
						$this->set('error', 'Could not Create the Rating');
					}
				} else {
					$this->set('result', false);
					$this->set('error', "You've already voted!");
				}
				$this->set('_serialize', array('result', 'error')); 
				$this->render(); 
			} else {
				throw new BadRequestException('Not Ajax!');
			}
		} else {
			throw new NotFoundException('Not an Article!');
		}
	}
}