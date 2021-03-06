<?php
App::uses('AppController', 'Controller');
App::uses('CakeTime', 'Utility');
/**
 * Articles Controller
 *
 * @property Article $Article
 * @property PaginatorComponent $Paginator
 */
class ArticlesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	
	public $paginate = array('limit' => 5, 'order' => array(
            'Article.created' => 'DESC'
        )
	);
	
	public function beforeFilter() {
		$this->Auth->allow('index', 'view');
		return parent::beforeFilter();
	}
/**
 * index method
 *
 * @return void
 */
		

	public function index() {	
		$this->Auth->allow(); 
		$this->Paginator->settings = $this->paginate;
		$this->set('articles', $this->Paginator->paginate('Article'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Article->exists($id)) {
			throw new NotFoundException(__('Invalid article'));
		}
		$options = array(
			'conditions' => array(
				'Article.' . $this->Article->primaryKey => $id
			),
			'contain' => array(
				'ArticleImage',
				'Comment' => array('User' => array('UserProfile')),
				'Rating',
				'Category',
				'User' => array('UserProfile')
			)
		);	
		$this->set('article', $this->Article->find('first', $options));
		$this->set('viewTitle', $this->Article->field('title',array('Article.' . $this->Article->primaryKey => $id)));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if($this->Auth->user('is_author')) {
			if ($this->request->is('post')) {
				$this->Article->create(array('user_id' => $this->Auth->user('id')));
				if ($this->Article->save($this->request->data)) {
					$this->Session->setFlash(__('The article has been saved.'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The article could not be saved. Please, try again.'));
				}
			}
			$users = $this->Article->User->find('list');
			$categories = $this->Article->Category->find('list');
			$this->set(compact('users', 'categories'));
		} else {
			$this->Session->setFlash(__('You Cannot Access this Area')); 
			$this->redirect(array('action' => 'index')); 
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if($this->Auth->user('is_author')) {
			if (!$this->Article->exists($id)) {
				throw new NotFoundException(__('Invalid article'));
			}
			if ($this->request->is(array('post', 'put'))) {
				if ($this->Article->save($this->request->data)) {
					$this->Session->setFlash(__('The article has been saved.'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The article could not be saved. Please, try again.'));
				}
			} else {
				$options = array('conditions' => array('Article.' . $this->Article->primaryKey => $id));
				$this->request->data = $this->Article->find('first', $options);
			}
			$users = $this->Article->User->find('list');
			$categories = $this->Article->Category->find('list');
			$this->set(compact('users', 'categories'));
		} else {
			$this->Session->setFlash(__('You Cannot Access this Area')); 
			$this->redirect(array('action' => 'index')); 
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if($this->Auth->user('is_author')) {
			$this->Article->id = $id;
			if (!$this->Article->exists()) {
				throw new NotFoundException(__('Invalid article'));
			}
			$this->request->onlyAllow('post', 'delete');
			if ($this->Article->delete()) {
				$this->Session->setFlash(__('The article has been deleted.'));
			} else {
				$this->Session->setFlash(__('The article could not be deleted. Please, try again.'));
			}
			return $this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('You Cannot Access this Area')); 
			$this->redirect(array('action' => 'index')); 
		}
	}

}
