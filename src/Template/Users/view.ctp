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

<div class="row">
    <div class="col-lg-12">
        <div class="alert-update"></div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong> User Details </strong>   
            </div>
            <?php echo $this->Form->create($user,['url' => ['action' => 'update',$user->id],'id'=>'update']);?> 
            <div class="panel-body">
             <div class="form-group">
                        <label>First name</label>          
                            <?php echo $this->Form->input('first_name',['type' => 'text','label' => false,'class'=>'form-control','required'=>false, 'error' => true]);?>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>          
                            <?php echo $this->Form->input('surname',['type' => 'text','label' => false,'class'=>'form-control','required'=>false, 'error' => true]);?>
                    </div>
                    <div class="form-group">
                        <label>Email</label>          
                            <?php echo $this->Form->input('email',['type' => 'email','label' => false,'class'=>'form-control','required'=>false, 'error' => true]);?>
                    </div>
                    <div class="form-group">
                        <label>Username</label>          
                            <?php echo $this->Form->input('username',['type' => 'text','label' => false,'class'=>'form-control','required'=>false, 'error' => true]);?>
                    </div>
                    <div class="form-group">
                        <label>Password</label>          
                            <?php echo $this->Form->input('password',['type' => 'text','label' => false,'class'=>'form-control','required'=>false, 'error' => true]);?>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit"  class="btn btn-success update">Update</button>
            </div>  
        </div>
        
    </div>