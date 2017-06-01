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
use Cake\View\Helper;
?>
<!-- content -->
<div class="col-md-12">
    <div class="row">
        <div class="col-lg-12">
            <div class="page-header bootstrap-admin-content-title">
            </div>
        </div>
    </div>
    <div class="alert-msg">
    <?php 
    echo $this->Flash->render();
    echo $this->Flash->render('auth');
    ?>
    </div>    
    <div class="row">
        <div class="col-lg-12">  
            <div class="error-alert"></div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="text-muted bootstrap-admin-box-title"><strong>Add User</strong><a href="<?php echo Cake\Routing\Router::url('\users\index');?>" class="btn btn-xs btn-primary pull-right"><i class="fa fa-users"></i> View Users</a></div>   
                </div>
            <?php echo $this->Form->create($user,['url' => ['action' => 'save'],'id'=>'register']);?> 
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
                            <?php echo $this->Form->input('password',['type' => 'password','label' => false,'class'=>'form-control','required'=>false, 'error' => true]);?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="save" class="btn btn-success">Submit</button>
                </div>
             <?php echo $this->Form->end();?>    
            </div>
            
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $(document).on('submit', '#register', function (event) {
                event.preventDefault();
                var formData = $("#register").serialize();
                var url = $("#register").attr("action");
                $.ajax({
                    url: url,
                    type: "POST",
                    asyn: false,
                    data: formData,
                    beforeSend: function () {
                        $("#save").html("Loading.....");
                    },
                    success: function (data, textStatus, jqXHR)
                    {
                        if (data === '200') {
                            $("#save").html("Submit");
                            $(".error-alert").html("<div class='alert alert-success'><strong>Success! </strong>User Info was successfully created.</div>");
                            setInterval(function () {
                                location.reload(); // this will run after every 5 seconds
                            }, 5000);
                        } else {
                            $("#save").html("Submit");
                            $(".error-alert").html(data);
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert(errorThrown);
                        location.reload();
                    }
                });
            });
        });
    </script>    

