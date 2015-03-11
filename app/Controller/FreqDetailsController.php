<?php
App::uses('AppController', 'Controller');
/**
 * FreqDetails Controller
 *
 * @property FreqDetail $FreqDetail
 * @property PaginatorComponent $Paginator
 */
class FreqDetailsController extends AppController {

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
		$this->FreqDetail->recursive = 0;
		$this->set('freqDetails', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FreqDetail->exists($id)) {
			throw new NotFoundException(__('Invalid freq detail'));
		}
		$options = array('conditions' => array('FreqDetail.' . $this->FreqDetail->primaryKey => $id));
		$this->set('freqDetail', $this->FreqDetail->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FreqDetail->create();
			if ($this->FreqDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The freq detail has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The freq detail could not be saved. Please, try again.'));
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
		if (!$this->FreqDetail->exists($id)) {
			throw new NotFoundException(__('Invalid freq detail'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FreqDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The freq detail has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The freq detail could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FreqDetail.' . $this->FreqDetail->primaryKey => $id));
			$this->request->data = $this->FreqDetail->find('first', $options);
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
		$this->FreqDetail->id = $id;
		if (!$this->FreqDetail->exists()) {
			throw new NotFoundException(__('Invalid freq detail'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->FreqDetail->delete()) {
			$this->Session->setFlash(__('The freq detail has been deleted.'));
		} else {
			$this->Session->setFlash(__('The freq detail could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
