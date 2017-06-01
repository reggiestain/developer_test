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
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

//$cakeDescription = 'CakePHP: the rapid development php framework';

$cakeDescription = '';
?>
<!DOCTYPE html>
<html class="bootstrap-admin-vertical-centered">
    <head>
        <title><?php echo $title;?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="http://getbootstrap.com/docs-assets/css/docs.css" rel="stylesheet" media="screen">
        <!-- Bootstrap -->
        <?php echo $this->Html->css('bootstrap.min.css') ;?>
        <?php echo $this->Html->css('bootstrap-theme.min.css') ;?>
        <?php echo $this->Html->css('font-awesome.min.css') ;?>
        <?php echo $this->Html->css('cake-style.css') ;?>    
        <?php echo $this->Html->css('datepicker.min.css');?>
        <?php echo $this->Html->css('bootstrap-admin-theme.css') ;?>
        <?php echo $this->Html->css('bootstrap-admin-theme-change-size.css') ;?>
        <?php echo $this->Html->script('jquery');?>
        <?php echo $this->Html->script('bootstrap.min');?>        
    </head>
    <body class="bootstrap-admin-without-padding">    
    <?php echo $this->fetch('content');?>
        <!-- Include JS files --> 
        <?php echo $this->Html->script('twitter-bootstrap-hover-dropdown.min');?>
        <?php echo $this->Html->script('bootstrap-admin-theme-change-size');?>
        <?php echo $this->Html->script('bootstrap-datepicker.min');?>
    </body>
</html>
