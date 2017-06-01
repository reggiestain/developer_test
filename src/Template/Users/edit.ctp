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
        <div class="panel panel-default">
            <div class="panel-heading">
            <strong> Edit Information</strong>   
            </div>
            <?php echo $this->Form->create($Profile,['id'=>'update','url' => ['action' => 'update']]);?> 
            <div class="panel-body">
            <div class="reg-alert">

            </div>    
            <div class="form-group">
                    <label>First name</label>          
                            <?php echo $this->Form->input('firstname',['type' => 'text','label' => false,'class'=>'form-control','required'=>false, 'error' => true]);?>
                </div>
                <div class="form-group">
                    <label>Surname</label>          
                            <?php echo $this->Form->input('surname',['type' => 'text','label' => false,'class'=>'form-control','required'=>false, 'error' => true]);?>
                </div>
                <div class="form-group">
                    <label>Mobile number</label>          
                            <?php echo $this->Form->input('mobile',['type' => 'text','label' => false,'class'=>'form-control','required'=>false, 'error' => true]);?>
                </div>
                <div class="form-group">
                <label>Email address</label>          
                            <?php echo $this->Form->input('email',['type' => 'email','label' => false,'class'=>'form-control','required'=>false, 'error' => true]);?>
                </div>
                <div class="form-group">
                    <label>Language</label>    
                        <?php echo $this->Form->select('language_id', $language, ['empty' => '--Choose One--','class'=>'form-control','label'=>false,'required'=>false, 'error' => true]);?>
                </div> 
                <div>
                    <label>Date of birth</label>   
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>                                
                            <?php echo $this->Form->input('date_of_birth',['templates' => ['inputContainer' => '{{content}}'],'type' => 'text','label' => false,'class'=>'form-control datepicker','id'=>'date1','required'=>false, 'error' => true]);?>
                    </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Update</button>
        </div>  
    </div>
</div>
<script>
$('#date1').datepicker();   
</script>    