<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Code','Game','Pass','Text');

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	public function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			return $this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));

		$this->set('passes',$this->Pass->find('all',array('conditions'=>array('Pass.active = 1'))));


		try {
			$this->render(implode('/', $path));
		} catch (MissingViewException $e) {
			if (Configure::read('debug')) {
				throw $e;
			}
			throw new NotFoundException();
		}
	}

	public function about(){
		$this->set('texts',$this->Text->find('first'));

	}

	public function contact(){
		$this->set('texts',$this->Text->find('first'));

	}

	public function faq(){
		$this->set('texts',$this->Text->find('first'));

	}

	public function code($id = 0){
		
	}


	public function upload($action = 0) {
		$this->autoRender = false;
		if($action!=0){

			if($action == 1){

				$time = strtotime ( "now" );
				$targetFolder = '../webroot/files/'; // Relative to the root
				if (! empty ( $_FILES )) {
					$tempFile = $_FILES ['file'] ['tmp_name'];
					$targetPath = $targetFolder;
					// Validate the file type
					$fileTypes = array (
							'jpg',
							'jpeg',
							'gif',
							'png',
							'JPG',
							'JPEG',
							'GIF',
							'PNG'
					); // File extensions
					$fileParts = pathinfo ( $_FILES ['file'] ['name'] );
					if (in_array ( $fileParts ['extension'], $fileTypes )) {
						$name = "img" . $time . $this->__randomStr ( 3 );
						$targetFile = rtrim ( $targetPath, '/' ) . '/' . $name . "." . $fileParts ['extension'];
						if (move_uploaded_file ( $tempFile, $targetFile )) {
							$namepath = $name . "." . $fileParts ['extension'];
							return json_encode ($namepath );
						} else {
							return json_encode ( array (
									false,
									false
							) );
						}
					} else {
						echo 'Imagen no valida';
					}
				}

			}elseif($action == 2){

				$time = strtotime ( "now" );
				$targetFolder = '../webroot/files/'; // Relative to the root
				if (! empty ( $_FILES )) {
					$tempFile = $_FILES ['file'] ['tmp_name'];
					$targetPath = $targetFolder;
					// Validate the file type
					$fileTypes = array ('csv'); // File extensions
					$fileParts = pathinfo ( $_FILES ['file'] ['name'] );
					if (in_array ( $fileParts ['extension'], $fileTypes )) {
						$name = "csv" . $time . $this->__randomStr ( 3 );
						$targetFile = rtrim ( $targetPath, '/' ) . '/' . $name . "." . $fileParts ['extension'];
						if (move_uploaded_file ( $tempFile, $targetFile )) {
							$namepath = $name . "." . $fileParts ['extension'];
							return json_encode ($namepath );
						} else {
							return json_encode ( array (
									false,
									false
							) );
						}
					} else {
						echo 'archivo no valido';
					}
				}

			}

		}else{
			echo 'error';
		}
	}

	function __randomStr($length) {
		$str = '';
		$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

		$size = strlen ( $chars );
		for($i = 0; $i < $length; $i ++) {
			$str .= $chars [rand ( 0, $size - 1 )];
		}

		return $str;
	}


	public function sendMail(){
		$this->autoRender = false;

		$from = 'info@3dlinkweb.com';
		$to = array($_POST['data']['email']);
		$subject = "Fan Pass Code";
		$content = $this->__armar_contenido($this->data['code'],$this->data['date'],$this->data['name']);
		// $content = "Your code for the pass ".$this->data['name'].", ".$this->data['date']." is ".$this->data['code'];
		// debug($content);
		$this->__enviar_correo($from, $to, $subject, $content);

		$this->__setcodeinactive($this->data['passid'],$this->data['idcode']);

		return json_encode(1);
	}


	function __setcodeinactive($passid,$codeid){
		$this->Code->id = $codeid;
		$this->Code->saveField('active', 0);

		$this->Pass->recursive = 2;
		$pass = $this->Pass->find('first',array('conditions'=>array('Pass.id'=>$passid)));
		$left=$pass['Pass']['top'];
		$left=$left-1;
  	$this->Pass->id = $passid;
		$this->Pass->saveField('top', ($left));

	  // if($left == 0) {
	  // 	$this->Pass->id = $passid;
			// $this->Pass->saveField('active', 0);
	  // }

	}


	function __enviar_correo($from, $to, $subject, $contenido){
		$Email = new CakeEmail();
		$Email->config('_temp')
		->to($to)
		->subject($subject)
		->from($from)
		->template('default')
		->emailFormat('html')
		->send($contenido);
	}

	function __armar_contenido($code,$date,$name){

		$content = "<table style='width: 1000px;background-color: #468ce6;font-family: Arial;font-size: 10px;color: white;margin: 0 auto;padding: 0 175px 140px;'><tr><td><p style='color: black;font-size: 12px;text-align: center;padding: 20px 0;margin: 0;'><a style='color: black;text-decoration: underline;' href=''>Click here</a> to view online</p></td></tr><tr><td style='width: 650px;margin: 0 auto;background-color: white;color: black;margin-bottom: 35px;'><img style='width: 100%;height: 385px;' src='http://www.3dlinkweb.com/hailmary/img/banner_email.jpg'></img></td></tr><tr><td style='padding-left: 175px;'><div style='color:black;width:300px;height:63px;background-color:#f5f6f7;border:solid 1px black;text-align:center;font-size:19px;font-weight:bold;padding-top:20px;'>$name<p style='color: #468ce6;'>Valid: $date</p></div></td></tr><tr><td style='padding: 80px 35px 50px;background-color: #fff; color:black; text-align:center;'><p style='font-size: 26px;font-weight: bold;text-align: center;margin: 0;margin-bottom: 30px;'>Bombs away!</p><p style='font-size: 15px;text-align: center;margin: 0px;font-weight: normal;'>The code for your Hail Mary deal for Fan Pass is below. Go to <a href='http://fanpass.co.nz'>www.fanpass.co.nz</a> and redeem during the dates shown above.</p><br /><br /><p style='width: 100%;height: 53px;background-color: black;margin: 0 auto;font-family: Tahoma;font-weight: bold;font-size: 29px;text-align: center;padding-top: 17px;color: white;'>$code</p><br /><br /><a style='margin-top:30px; width: 133px;height: 20px;background-color: #468ce6;color: white;border-radius: 5px;margin: 0 auto;font-weight: bold;font-size: 19px;text-decoration: none;display: block;padding: 10px 20px;'  href='http://fanpass.co.nz/packages?type=0' type='buttom'>REDEEM NOW</a></td></tr><tr><td style='text-align: center; margin: 0;'><br /><br /><p>For full FAN PASS terms and conditions click here. FAN PASS is available on PC, Mac and select Apple and Android™ devices – please see www.fanpass.co.nz/faq for more details. HD quality is available on select tablets and PC/Mac with a suitable internet connection. Apple and the Apple logo are trademarks of Apple Inc., registered in the U.S. and other countries. App Store is a service mark of Apple Inc. Android™ and Google play™ are trademarks of Google Inc. <br><br>This message is sent to you by SKY Network Television Limited, of 10 Panorama Road, Mt Wellington, Auckland, New Zealand.  <br><br>Information contained in this email message is intended only for use of the individual or entity named above. If the reader of this message is not the intended recipient or employee or agent responsible to deliver it to the intended recipient, you are hereby notified that any dissemination, distribution or copying of this communication is strictly prohibited. If you have received this communication in error, please immediately notify the sender by email and destroy the original message. <br><br>You are currently subscribed to our mailing list on zoeysummer@vodafone.co.nz.  Please do not reply to this email as it is sent by an automated system, not a real life member of the FAN PASS team.</p><br /><br /><br /><a style='padding-right: 35px;color: white;text-decoration: underline;' href=''>Unsubscribe</a><a style='padding-right: 35px;color: white;text-decoration: underline;' href=''>Update preferences</a><a style='padding-right: 35px;color: white;text-decoration: underline;' href=''>Terms and conditions</a><a style='padding-right: 35px;color: white;text-decoration: underline;' href=''>Privacy</a><a style='padding-right: 35px;color: white;text-decoration: underline;' href=''>www.fanpass.co.nz</a></td></tr></table>";

		return $content;

	}



}
