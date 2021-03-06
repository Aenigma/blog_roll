<?php
App::uses('AppController', 'Controller');
/**
 * Categories Controller
 *
 * @property Category $Category
 * @property PaginatorComponent $Paginator
 */
class CategoriesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Category->recursive = 0;
		$this->set('categories', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Category->exists($id)) {
			throw new NotFoundException(__('Invalid category'));
		}
		$options = array(
			'conditions' => array('Category.' . $this->Category->primaryKey => $id),
			'contain' => false
		);
		$this->set('category', $this->Category->find('first', $options));
		
		$this->Paginator->settings = array(
			'conditions' => array('Article.user_id' => $id),
			'contain' => array(
				'ArticleImage',
				'Comment' => array('User' => array('UserProfile')),
				'Rating',
				'Category',
				'User' => array('UserProfile')
			)
		);		
		$this->set('articles', $this->Paginator->paginate('Article'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if($this->Auth->user('is_author')) {
			if ($this->request->is('post')) {
				$this->Category->create();
				if ($this->Category->save($this->request->data)) {
					$this->Session->setFlash(__('The category has been saved.'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The category could not be saved. Please, try again.'));
				}
			}
			$articles = $this->Category->Article->find('list');
			$this->set(compact('articles'));
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
			if (!$this->Category->exists($id)) {
				throw new NotFoundException(__('Invalid category'));
			}
			if ($this->request->is(array('post', 'put'))) {
				if ($this->Category->save($this->request->data)) {
					$this->Session->setFlash(__('The category has been saved.'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The category could not be saved. Please, try again.'));
				}
			} else {
				$options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
				$this->request->data = $this->Category->find('first', $options);
			}
			$articles = $this->Category->Article->find('list');
			$this->set(compact('articles'));
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
			$this->Category->id = $id;
			if (!$this->Category->exists()) {
				throw new NotFoundException(__('Invalid category'));
			}
			$this->request->onlyAllow('post', 'delete');
			if ($this->Category->delete()) {
				$this->Session->setFlash(__('The category has been deleted.'));
			} else {
				$this->Session->setFlash(__('The category could not be deleted. Please, try again.'));
			}
			return $this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('You Cannot Access this Area')); 
			$this->redirect(array('action' => 'index')); 
		}
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Category->recursive = 0;
		$this->set('categories', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Category->exists($id)) {
			throw new NotFoundException(__('Invalid category'));
		}
		$options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
		$this->set('category', $this->Category->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Category->create();
			if ($this->Category->save($this->request->data)) {
				$this->Session->setFlash(__('The category has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The category could not be saved. Please, try again.'));
			}
		}
		$articles = $this->Category->Article->find('list');
		$this->set(compact('articles'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Category->exists($id)) {
			throw new NotFoundException(__('Invalid category'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Category->save($this->request->data)) {
				$this->Session->setFlash(__('The category has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The category could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
			$this->request->data = $this->Category->find('first', $options);
		}
		$articles = $this->Category->Article->find('list');
		$this->set(compact('articles'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Category->id = $id;
		if (!$this->Category->exists()) {
			throw new NotFoundException(__('Invalid category'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Category->delete()) {
			$this->Session->setFlash(__('The category has been deleted.'));
		} else {
			$this->Session->setFlash(__('The category could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
