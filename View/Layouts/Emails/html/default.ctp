<!-- <html>

<?php
/**
 *
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
 * @package       app.View.Emails.html
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
	<body>
		<table style='width: 1000px;background-color: #468ce6;font-family: Arial;font-size: 10px;color: white;margin: 0 auto;padding: 0 175px 140px;'>
			<tr>
				<td>
					<p style='color: black;font-size: 12px;text-align: center;padding: 20px 0;margin: 0;'>
						<a style='color: black;text-decoration: underline;' href=''>Click here</a> to view online
					</p>
				</td>
			</tr>
			<tr>
				<td style='width: 650px;margin: 0 auto;background-color: white;color: black;margin-bottom: 35px;'>
					<img style='width: 100%;height: 385px;' src='http://www.3dlinkweb.com/hailmary/img/banner_email.jpg'></img>
				</td>
			</tr>
			<tr>
				<td style='padding-left: 175px;'>
					<div style='color:black;width:300px;height:63px;background-color:#f5f6f7;border:solid 1px black;text-align:center;font-size:19px;font-weight:bold;padding-top:20px;'>
						$name<p style='color: #468ce6;'>Valid: $date</p>
					</div>
				</td>
			</tr>
			<tr>
				<td style='padding: 80px 35px 50px;background-color: #fff; color:black; text-align:center;'>
					<p style='font-size: 26px;font-weight: bold;text-align: center;margin: 0;margin-bottom: 30px;'>Hey Sports Fan!</p>
					<p style='font-size: 15px;text-align: center;margin: 0px;font-weight: normal;'>Below is your unique code for a great deal with FAN PASS.</p>
					<br /><br />
					<p style='width: 100%;height: 53px;background-color: black;margin: 0 auto;font-family: Tahoma;font-weight: bold;font-size: 29px;text-align: center;padding-top: 17px;color: white;'>$code</p>
					<br /><br />
					<a href='' style='margin-top:30px; width: 133px;height: 20px;background-color: #468ce6;color: white;border-radius: 5px;margin: 0 auto;font-weight: bold;font-size: 19px;text-decoration: none;display: block;padding: 10px 20px;' type='buttom'>REDEEM NOW</a>
				</td>
			</tr>
			<tr>
				<td style='text-align: center; margin: 0;'><br /><br />
					<p>For full FAN PASS terms and conditions click here. FAN PASS is available on PC, Mac and select Apple and Android™ devices – please see www.fanpass.co.nz/faq for more details. HD quality is available on select tablets and PC/Mac with a suitable internet connection. Apple and the Apple logo are trademarks of Apple Inc., registered in the U.S. and other countries. App Store is a service mark of Apple Inc. Android™ and Google play™ are trademarks of Google Inc. <br><br>This message is sent to you by SKY Network Television Limited, of 10 Panorama Road, Mt Wellington, Auckland, New Zealand.  <br><br>Information contained in this email message is intended only for use of the individual or entity named above. If the reader of this message is not the intended recipient or employee or agent responsible to deliver it to the intended recipient, you are hereby notified that any dissemination, distribution or copying of this communication is strictly prohibited. If you have received this communication in error, please immediately notify the sender by email and destroy the original message. <br><br>You are currently subscribed to our mailing list on zoeysummer@vodafone.co.nz.  Please do not reply to this email as it is sent by an automated system, not a real life member of the FAN PASS team.</p><br /><br /><br />
					<a style='padding-right: 35px;color: white;text-decoration: underline;' href=''>Unsubscribe</a>
					<a style='padding-right: 35px;color: white;text-decoration: underline;' href=''>Update preferences</a>
					<a style='padding-right: 35px;color: white;text-decoration: underline;' href=''>Terms and conditions</a>
					<a style='padding-right: 35px;color: white;text-decoration: underline;' href=''>Privacy</a>
					<a style='padding-right: 35px;color: white;text-decoration: underline;' href=''>www.fanpass.co.nz</a>
				</td>
			</tr>
		</table>
	</body>
</html> -->

<?php
$content = explode("\n", $content);

foreach ($content as $line):
	echo '' . $line . "";
endforeach;
?>
