<?php
App::uses('AppController', 'Controller');

require_once("PHPExcel/IOFactory.php");
require_once("PHPExcel/PHPExcel.php");

require_once("payment/DPSProcessor.php");

/**
 * Passes Controller
 *
 * @property Pass $Pass
 * @property PaginatorComponent $Paginator
 */
class PassesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	public $uses = array('Pass','Code', 'Game');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->layout="admin";
		$this->Pass->recursive = 0;
		$this->set('passes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->layout="admin";
		if (!$this->Pass->exists($id)) {
			throw new NotFoundException(__('Invalid pass'));
		}
		$options = array('conditions' => array('Pass.' . $this->Pass->primaryKey => $id));
		$this->set('pass', $this->Pass->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout="admin";
		if ($this->request->is('post')) {

			$this->Pass->create();
			if ($this->Pass->saveAll($this->request->data)) {

				$pass_id = $this->Pass->getLastInsertId();
					$games = array();
					$numCodes = 0; 
					//debug($this->request->data);die;

					if(isset($this->request->data['Pass']['Game'])){
						foreach ($this->request->data['Pass']['Game'] as $file) {
							array_push($games, array(
								'name' => $file['name'],
								'image' => $file['image'],
								'pass_id' => $pass_id
							));
						}
					if ($this->Game->saveAll($games)){
						$codes = array();
						if(isset($this->request->data['Pass']['csv'])){
							$nombreArchivo = 'files/'.$this->request->data['Pass']['csv'];
						 	$objPHPExcel = PHPExcel_IOFactory::load($nombreArchivo);
							$objPHPExcel->setActiveSheetIndex(0);
							$numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
							$numCodes = $numRows;
							for ($i = 1; $i <= $numRows; $i++) {
								array_push($codes, array('code'=>($objPHPExcel->getActiveSheet()->getCell('A'.$i)->getFormattedValue()),'pass_id'=>$pass_id));
							}
						}
						if ($this->Code->saveAll($codes,array('validate'=>false))){
							$pass = $this->Pass->Id = $pass_id;
							$this->Pass->saveField('top',$numCodes);

							$this->Session->setFlash('The pass has been saved.', 'default', array('class' => 'success_message'));
							return $this->redirect(array('action' => 'index'));
						}else{
							$this->Session->setFlash('The pass could not be saved. Please, try again.', 'default', array('class' => 'error_message'));
						}
					}else{
						$this->Session->setFlash('The pass could not be saved. Please, try again.', 'default', array('class' => 'error_message'));
					}
			} else {
				$this->Session->setFlash('The pass could not be saved. Please, try again.', 'default', array('class' => 'error_message'));
			}
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
		if (!$this->Pass->exists($id)) {
			throw new NotFoundException(__('Invalid pass'));
		}
		if ($this->request->is(array('post', 'put'))) {

			if ($this->Pass->save($this->request->data)) {
				$pass_id = $this->request->data['Pass']['id'];
				$games = array();
					$numCodes = 0; 

				$this->Game->deleteAll(array('Game.pass_id' => $pass_id), false);

				if(isset($this->request->data['Pass']['Game'])){
						foreach ($this->request->data['Pass']['Game'] as $file) {
							array_push($games, array(
								'name' => $file['name'],
								'image' => $file['image'],
								'pass_id' => $pass_id
							));
						}
					if ($this->Game->saveAll($games)){
						$codes = array();
						if(isset($this->request->data['Pass']['csv'])){
							$this->Code->deleteAll(array('Code.pass_id' => $pass_id), false);

							$nombreArchivo = 'files/'.$this->request->data['Pass']['csv'];
						 	$objPHPExcel = PHPExcel_IOFactory::load($nombreArchivo);
							$objPHPExcel->setActiveSheetIndex(0);
							$numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
							$numCodes = $numRows;

							for ($i = 1; $i <= $numRows; $i++) {
								array_push($codes, array('code'=>($objPHPExcel->getActiveSheet()->getCell('A'.$i)->getFormattedValue()),'pass_id'=>$pass_id));
							}
						}
						if ($this->Code->saveAll($codes,array('validate'=>false))){
							$pass = $this->Pass->Id = $pass_id;
							$this->Pass->saveField('top',$numCodes);
							
							$this->Session->setFlash('The pass has been saved.', 'default', array('class' => 'success_message'));
							return $this->redirect(array('action' => 'index'));
						}else{
							$this->Session->setFlash('The pass could not be saved. Please, try again.', 'default', array('class' => 'error_message'));
						}
					}else{
						$this->Session->setFlash('The pass could not be saved. Please, try again.', 'default', array('class' => 'error_message'));
					}
			} else {
				$this->Session->setFlash('The pass could not be saved. Please, try again.', 'default', array('class' => 'error_message'));
			}




				$this->Session->setFlash('The pass has been saved.', 'default', array('class' => 'success_message'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The pass could not be saved. Please, try again.', 'default', array('class' => 'error_message'));
			}
		} else {
			$options = array('conditions' => array('Pass.' . $this->Pass->primaryKey => $id));
			$this->request->data = $this->Pass->find('first', $options);
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
		$this->Pass->id = $id;
		if (!$this->Pass->exists()) {
			throw new NotFoundException(__('Invalid pass'));
		}
		// $this->request->allowMethod('post', 'delete');
		if ($this->Pass->delete()) {
			$this->Session->setFlash('The pass has been deleted.', 'default', array('class' => 'success_message'));
		} else {
			$this->Session->setFlash('The pass could not be deleted. Please, try again.', 'default', array('class' => 'error_message'));
		}
		return $this->redirect(array('action' => 'index'));
	}




	public function MakeInactive($id = null) {
		$this->Pass->id = $id;
		if (!$this->Pass->exists()) {
			throw new NotFoundException(__('Invalid Pass'));
		}
		//$this->request->allowMethod('post', 'delete');
		if ($this->Pass->saveField('active', '0')) {
			$this->Session->setFlash('The pass has been deactivated.', 'default', array('class' => 'success_message'));
		} else {
			$this->Session->setFlash('The pass could not be deactivated. Please, try again.', 'default', array('class' => 'error_message'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function MakeActive($id = null) {
		$this->Pass->id = $id;
		if (!$this->Pass->exists()) {
			throw new NotFoundException(__('Invalid Pass'));
		}

		$pass = $this->Pass->findById($id);
		$left=0;
	  foreach ($pass['Code'] as $codes) {
	    if($codes['active'] == 1){
	      $left++;
	    }
	  }
		if($left>0){
			if ($this->Pass->saveField('active', '1')) {
				$this->Session->setFlash('The pass has been activated.', 'default', array('class' => 'success_message'));
			} else {
				$this->Session->setFlash('The pass could not be activated. Please, try again.', 'default', array('class' => 'error_message'));
			}
		} else {
			$this->Session->setFlash('This pass does not have codes. Please, load more codes and active.', 'default', array('class' => 'error_message'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function buy($name,$email,$idcode,$passid,$code,$price){
		$this->layout=false;
		$this->autoRender=false;
		$price = str_replace("$", "", $price);
		$this->Session->write('name', $name);
		$this->Session->write('email', $email);
		$this->Session->write('idcode', $idcode);
		$this->Session->write('passid', $passid);
		$this->Session->write('code', $code);
		$this->Session->write('price', $price);


		// echo $this->Session->read('Person'); // Green
		$dpsUserId = 'FanPassPxP_Dev';
		$dpsUserKey = '9ee39b943bb27aa0329c1a14593e0235682fdbb615d489385e5c3286ee42fff9';


		// $successUrl = 'http://hailmary.co.nz/payments/response.php';
		// $failUrl = 'http://hailmary.co.nz/payments/response.php';

		$successUrl = 'http://localhost/3d/hailmary/pages/response';
		$failUrl = 'http://localhost/3d/hailmary/pages/response';

		$dps = new DPSProcessor($dpsUserId, $dpsUserKey);

		$transactionId=uniqid();

		$url = $dps->redirectToGateway($transactionId,'testPayment', $price, 'some txt data', 'pchalacis@gmail.com', $successUrl, $failUrl);
				echo $url;
		return $this->redirect($url);
	}

}
