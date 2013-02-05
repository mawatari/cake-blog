<?php
App::uses('AppController', 'Controller');
/**
 * Posts Controller
 *
 * @property Post $Post
 */
class PostsController extends AppController {

	public $components = array('Search.Prg');

	public $presetVars = array(
		'author_id' => array('type' => 'checkbox', 'empty' => true),
		'keyword' => array('type' => 'value', 'empty' => true),
		'andor' => array('type' => 'value', 'empty' => true),
		'from' => array('type' => 'value', 'empty' => true),
		'to' => array('type' => 'value', 'empty' => true),
	);

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Post->recursive = 0;
		$authors = $this->Post->Author->find('list');
		$this->set(compact('authors'));

		if (!empty($this->request->data['Post']['author_id']) and array_diff(array_keys($authors), $this->request->data['Post']['author_id']) == false) {
			unset($this->request->data['Post']['author_id']);
		}
		$this->Prg->commonProcess();
		$req = $this->passedArgs;
		if (!empty($this->request->data['Post']['keyword'])) {
			$andor = !empty($this->request->data['Post']['andor']) ? $this->request->data['Post']['andor'] : null;
			$word = $this->Post->multipleKeywords($this->request->data['Post']['keyword'], $andor);
			$req = array_merge($req, array("word" => $word));
		}
		$this->paginate = array(
			'conditions' => $this->Post->parseCriteria($req),
		);
		$this->set('posts', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @throws NotFoundException
 * @return void
 */
	public function view($id = null) {
		$this->Post->id = $id;
		if (!$this->Post->exists()) {
			throw new NotFoundException(__('Invalid %s', __('post')));
		}
		$this->set('post', $this->Post->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Post->create();
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash(
					__('The %s has been saved', __('post')),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-success'
					)
				);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(
					__('The %s could not be saved. Please, try again.', __('post')),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-error'
					)
				);
			}
		}
		$authors = $this->Post->Author->find('list');
		$this->set(compact('authors'));
	}

/**
 * edit method
 *
 * @param string $id
 * @throws NotFoundException
 * @return void
 */
	public function edit($id = null) {
		$this->Post->id = $id;
		if (!$this->Post->exists()) {
			throw new NotFoundException(__('Invalid %s', __('post')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash(
					__('The %s has been saved', __('post')),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-success'
					)
				);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(
					__('The %s could not be saved. Please, try again.', __('post')),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-error'
					)
				);
			}
		} else {
			$this->request->data = $this->Post->read(null, $id);
		}
		$authors = $this->Post->Author->find('list');
		$this->set(compact('authors'));
	}

/**
 * delete method
 *
 * @param string $id
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Post->id = $id;
		if (!$this->Post->exists()) {
			throw new NotFoundException(__('Invalid %s', __('post')));
		}
		if ($this->Post->delete()) {
			$this->Session->setFlash(
				__('The %s deleted', __('post')),
				'alert',
				array(
					'plugin' => 'TwitterBootstrap',
					'class' => 'alert-success'
				)
			);
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(
			__('The %s was not deleted', __('post')),
			'alert',
			array(
				'plugin' => 'TwitterBootstrap',
				'class' => 'alert-error'
			)
		);
		$this->redirect(array('action' => 'index'));
	}
}
