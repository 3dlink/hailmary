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
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>Hail Mary
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('owl.carousel');
		echo $this->Html->css('hail');
		echo $this->Html->script('jquery-2.2.0.min');
		echo $this->Html->script('bootstrap.min');
		echo $this->Html->script('pekeUpload');
		echo $this->Html->script('owl.carousel.min');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<script type="text/javascript">var WEBROOT='<?php echo $this->webroot; ?>';</script>
</head>
<body>
	<div id="container">
		<div id="header">
			<div id="logo" onclick="window.location.href='<?php echo $this->webroot;?>'"></div>
			<div id="about"><a href="<?php echo $this->webroot; ?>about">ABOUT</a></div>
		</div>
		<div id="content">
			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<div id="logo_footer"></div>
			<div id="menu_footer">
				<a href="<?php echo $this->webroot; ?>about">About</a><br>
				<a href="<?php echo $this->webroot; ?>contact">Contact us</a><br>
				<a href="<?php echo $this->webroot; ?>faq">FAQ</a>
			</div>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
