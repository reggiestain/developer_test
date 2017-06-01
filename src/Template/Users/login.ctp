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
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;
?>

<div class="container" style="background-color:gray">        
    <div class="row vertical-center-row">         
                <?php 
                echo $this->Form->create($users,['class'=>'bootstrap-admin-login-form']);
                echo $this->Flash->render();
                echo $this->Flash->render('auth');
                ?> 
                <h4>Sign In</h4>
                <div class="input-group">
                    <?php echo $this->Form->input('email', ['templates' => ['inputContainer' => '{{content}}'],'type' => 'text','label' => false,'class'=>'form-control','placeholder'=>'E-mail','required' =>true]);?>
                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user"></i></span>
                </div>
                <br>                
                <div class="input-group">             
                    <?php echo $this->Form->input('password',['templates' => ['inputContainer' => '{{content}}'],'type' => 'password','label' => false,'class'=>'form-control','placeholder'=>'Password','required' =>true]);?>
                    <span class="input-group-addon" id="basic-addon2"><i class="fa fa-lock"></i></span>
                </div>
                <div class="form-group">
                                                      
                </div>
                <input type="submit" class="btn btn-primary" value="Login"r>
          <?php echo $this->Form->end();?>       
        </div>    
    </div>
