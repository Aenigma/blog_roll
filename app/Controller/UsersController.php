<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

  public function beforeFilter() {
    $this->Auth->allow('index', 'view', 'edit');
    return parent::beforeFilter();
  }

/**
 * Components
 *
 * @var array
 */
	public $components = array('Auth', 'Paginator');
	
	public $paginate = array(
		'limit' => 2
	);
	
	public function login() {
		if($this->request->is('post')) {
			if($this->Auth->login()) {
				$this->redirect($this->Auth->redirect());
			} else {
				$this->Session->setFlash(__('Your username or password was incorrect.'));
				$this->redirect(array('controller' => 'articles', 'action' => 'index'));
			}
		}
	}
	
	public function logout() {
		$this->Auth->logout();
		$this->redirect(array('controller' => 'articles', 'action' => 'index'));
	}

/**
 * index method
 *
 * @return void
 */
 
	public function index() {
		$this->Paginator->settings = $this->paginate;
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array(
			'conditions' => array('User.' . $this->User->primaryKey => $id),
			'contain' => array('UserProfile')
		);
		$this->set('user', $this->User->find('first', $options));
		
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
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
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
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}