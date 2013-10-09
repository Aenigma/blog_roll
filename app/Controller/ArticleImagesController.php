<?php
App::uses('AppController', 'Controller');
/**
 * ArticleImages Controller
 *
 * @property ArticleImage $ArticleImage
 * @property PaginatorComponent $Paginator
 */
class ArticleImagesController extends AppController {

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
		$this->ArticleImage->recursive = 0;
		$this->set('articleImages', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ArticleImage->exists($id)) {
			throw new NotFoundException(__('Invalid article image'));
		}
		$options = array('conditions' => array('ArticleImage.' . $this->ArticleImage->primaryKey => $id));
		$this->set('articleImage', $this->ArticleImage->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ArticleImage->create();
			if ($this->ArticleImage->save($this->request->data)) {
				$this->Session->setFlash(__('The article image has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The article image could not be saved. Please, try again.'));
			}
		}
		$articles = $this->ArticleImage->Article->find('list');
		$this->set(compact('articles'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ArticleImage->exists($id)) {
			throw new NotFoundException(__('Invalid article image'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ArticleImage->save($this->request->data)) {
				$this->Session->setFlash(__('The article image has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The article image could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ArticleImage.' . $this->ArticleImage->primaryKey => $id));
			$this->request->data = $this->ArticleImage->find('first', $options);
		}
		$articles = $this->ArticleImage->Article->find('list');
		$this->set(compact('articles'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ArticleImage->id = $id;
		if (!$this->ArticleImage->exists()) {
			throw new NotFoundException(__('Invalid article image'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ArticleImage->delete()) {
			$this->Session->setFlash(__('The article image has been deleted.'));
		} else {
			$this->Session->setFlash(__('The article image could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
