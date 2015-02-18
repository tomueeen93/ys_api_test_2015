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

$cakeDescription = __d('cake_dev', 'YS API STORE');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php //echo $cakeDescription ?>YSAPI:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		//echo $this->Html->css('cake.generic');
		echo $this->Html->css('bootstrap');
		echo $this->Html->css('flipsnap');
		echo $this->Html->css('mystyle');
		
		echo $this->Html->script('jquery-2.1.3');
		echo $this->Html->script('flipsnap');
		echo $this->Html->script('ajaxtest');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		
	?>
</head>
<body>
	<div id="container" class="container">
		<div id="row">
		  	<div id="header" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<!-- start title -->
				<div id="title" class="row">
					<div id="" class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
						<h1 >
							<?php echo $this->Html->link($cakeDescription, array('controller' => 'home','action' =>'index')); ?>
						</h1>
					</div>
				</div>
				<!-- end title -->
				<!-- start 検索フォーム-->
				<div id="search-form" class="row">
					<div class="blank col-xs-0 col-sm-2 col-md-2 col-lg-3"></div>
					<div id="search-form-textarea" class="col-xs-8 col-sm-5 col-md-5 col-lg-4">
						<?php 
							echo $this->Form->create(null,array(
					   		 'url' => array('controller' => 'home', 'action' => 'search')
							));
						?>
						<?php echo $this->Form->input('search_word'); ?> 
					</div>
					<div id="search-form-button" class="col-xs-4 col-sm-1 col-md-1 col-lg-1">
						<?php echo $this->Form->end(array('label'=>'SEARCH','class'=>'btn btn-default')); ?>
					</div>
				</div>
				<!-- end 検索フォーム -->
			</div>
			<div id="content" class="row">
	
				<?php echo $this->Session->flash(); ?>
	
				<?php echo $this->fetch('content'); ?>
			</div>
			<div id="footer" class="row">
				
			</div>
		</div>
	</div>
</body>
</html>
