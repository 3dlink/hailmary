<?php
App::uses('AppController', 'Controller');
/**
 * Texts Controller
 *
 * @property Text $Text
 * @property PaginatorComponent $Paginator
 */
class TextsController extends AppController {

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
		$this->layout="admin";
		$this->Text->recursive = 0;
		$this->set('texts', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Text->exists($id)) {
			throw new NotFoundException(__('Invalid text'));
		}
		$options = array('conditions' => array('Text.' . $this->Text->primaryKey => $id));
		$this->set('text', $this->Text->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout="admin";
		if ($this->request->is('post')) {
			$this->Text->create();
			if ($this->Text->save($this->request->data)) {
				$this->Session->setFlash(__('The text has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The text could not be saved. Please, try again.'));
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
		$this->layout="admin";
		if (!$this->Text->exists($id)) {
			throw new NotFoundException(__('Invalid text'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Text->save($this->request->data)) {
							$this->Session->setFlash('The texts has been saved.', 'default', array('class' => 'success_message'));
				return $this->redirect('/passes');
			} else {
				$this->Session->setFlash(__('The text could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Text.' . $this->Text->primaryKey => $id));
			$this->request->data = $this->Text->find('first', $options);
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
		$this->Text->id = $id;
		if (!$this->Text->exists()) {
			throw new NotFoundException(__('Invalid text'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Text->delete()) {
			$this->Session->setFlash(__('The text has been deleted.'));
		} else {
			$this->Session->setFlash(__('The text could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
