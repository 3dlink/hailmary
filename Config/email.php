<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 2.0.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

/**
 * This is email configuration file.
 *
 * Use it to configure email transports of CakePHP.
 *
 * Email configuration class.
 * You can specify multiple configurations for production, development and testing.
 *
 * transport => The name of a supported transport; valid options are as follows:
 *  Mail - Send using PHP mail function
 *  Smtp - Send using SMTP
 *  Debug - Do not send the email, just return the result
 *
 * You can add custom transports (or override existing transports) by adding the
 * appropriate file to app/Network/Email. Transports should be named 'YourTransport.php',
 * where 'Your' is the name of the transport.
 *
 * from =>
 * The origin email. See CakeEmail::from() about the valid values
 */
class EmailConfig {

	public $default = array(
		'transport' => 'Mail',
		'from' => 'you@localhost',
		//'charset' => 'utf-8',
		//'headerCharset' => 'utf-8',
	);

	public $smtp = array(
		'transport' => 'Smtp',
		'from' => array('team@bepurpledash.com' => 'Hail Mary'),
		'host' => 'bepurpledash.com',
		'port' => 25,
		'timeout' => 30,
		'username' => 'team@bepurpledash.com',
		'password' => 'Purpledash2016',
		'client' => null,
		'log' => false,
		//'charset' => 'utf-8',
		//'headerCharset' => 'utf-8',
	);

	public $fast = array(
		'from' => 'you@localhost',
		'sender' => null,
		'to' => null,
		'cc' => null,
		'bcc' => null,
		'replyTo' => null,
		'readReceipt' => null,
		'returnPath' => null,
		'messageId' => true,
		'subject' => null,
		'message' => null,
		'headers' => null,
		'viewRender' => null,
		'template' => false,
		'layout' => false,
		'viewVars' => null,
		'attachments' => null,
		'emailFormat' => null,
		'transport' => 'Smtp',
		'host' => 'localhost',
		'port' => 25,
		'timeout' => 30,
		'username' => 'user',
		'password' => 'secret',
		'client' => null,
		'log' => true,
		//'charset' => 'utf-8',
		//'headerCharset' => 'utf-8',
	);



	// public $_temp = array(
	// 	'host' => '3dlinkweb.com',
	// 	'port' => 26,
	// 	'username' => 'info@3dlinkweb.com',
	// 	'password' => 'london.123',
	// 	'transport' => 'Smtp'
	// );


	// public $_temp = array(
	// 	'host' => 'w8000129.ferozo.com',
	// 	'port' => 26,
	// 	'username' => 'team@bepurpledash.com',
	// 	'password' => 'Purpledash2016',
	// 	'transport' => 'Smtp'
	// );

	
	// public $_temp = array(
	// 	'host' => 'email-smtp.us-east-1.amazonaws.com',
	// 	'port' => 26,
	// 	'username' => 'AKIAJAYVP5XAQMAAKWUQ',
	// 	'password' => 'AvqTXg1AENK1ghBLuglwGjSdd9SQsFk8DQ4aTfP/g1an',
	// 	'transport' => 'Smtp'
	// );

	// public $_temp = array(
	// 	'host' => 'pikos.com.ve',
	// 	'port' => 26,
	// 	'username' => 'contacto@pikos.com.ve',
	// 	'password' => 'pikosweb123456',
	// 	'transport' => 'Smtp'
	// );	

	public $_temp = array(
		'transport' => 'Smtp',
		'from' => array('info@buildingsoftware.co' => 'Hail Mary'),
		'host' => 'smtp.sendgrid.net',
		'port' => 587,
		'timeout' => 30,
		'username' => 'buildingSoftware',
		'password' => 'AdmWDILOT122190',
		'client' => null,
		'log' => false,
	);

}
