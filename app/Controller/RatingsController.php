<?php
App::uses('AppController', 'Controller');

/**
 * Ratings Controller
 *
 * @property Rating $Rating
 * @property PaginatorComponent $Paginator
 */
 
class RatingsController extends AppController {

	public function upvote() {
		if ($this->request->is('post')) {
			$this->Rating->create();
			if ($this->Rating->save($this->request->data)) {
				$this->Session->setFlash(__('The rating has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The rating could not be saved. Please, try again.'));
			}
		}
		$articles = $this->Rating->Article->find('list');
		$users = $this->Rating->User->find('list');
		$this->set(compact('articles', 'users'));
	}
	
	public function downvote($article_id = null) {
		if(!empty($article_id)) {
			
		} else {
			throw new BadRequestException('Need an Article ID');
		}
	}
}