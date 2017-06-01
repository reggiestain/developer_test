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
            <div class="alert-message"></div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="text-muted bootstrap-admin-box-title"><strong>User List</strong> <a href="<?php echo Cake\Routing\Router::url('\users\add');?>" class="btn btn-xs btn-primary pull-right"><i class="fa fa-pencil"></i> Create New</a></div>
                </div>
                <div class="bootstrap-admin-panel-content table-responsive">
                    <table id="example" class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Surname</th> 
                                <th>Email</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($userList as $list) :?>    
                            <tr>
                                <td><?php echo $list->id;?></td>    
                                <td><?php echo $list->first_name;?></td>
                                <td><?php echo $list->surname;?></td>
                                <td><?php echo $list->email;?></td>                         
                                <td>
                                    <a href="#" class="btn btn-success btn-xs edit" var="<?php echo $list->id;?>">Edit</a>                          
                                    <a href="#" class="btn btn-danger btn-xs delete" var="<?php echo $list->id;?>">Delete</a>
                                </td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Edit User</h4>
            </div>
            <div class="modal-body"> 
                <div id="personInfo">

                </div>
            </div>
            </form>        
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
                success: function (data, textStatus, jqXHR)
                {
                    if (data === '200') {
                        $("#addModal").modal('toggle');
                        $(".reg-alert").html('');
                        $(".alert-msg").html("<div class='alert alert-success'><strong>Success! </strong>Person Info was successfully created.</div>");
                        location.reload();
                    } else {
                        $(".reg-alert").html(data);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                    location.reload();
                }
            });
        });

        $(".edit").click(function () {
            var Id = $(this).attr("var");
            $("#viewModal").modal();
            $.ajax({
                url: "<?php echo \Cake\Routing\Router::Url('/users/view/');?>" + Id,
                type: "POST",
                asyn: true,
                beforeSend: function () {
                    $("#personInfo").html('loading.......');
                },
                success: function (data) {
                    $("#personInfo").html(data);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        });
        
        $(".delete").click(function () {
            var Id = $(this).attr("var");
            var result = confirm('Are you sure you want to delete this?');
            if(result){
            $.ajax({
                url: "<?php echo \Cake\Routing\Router::Url('/users/delete/');?>" + Id,
                type: "POST",
                asyn: true,
                beforeSend: function () {
                    $(this).html('deleting.......');
                },
                success: function (data) {
                   if (data === 'success') {                       
                        $(".alert-message").html("<div class='alert alert-success'><strong>Success! </strong>User Info has been deleted successfully.</div>");
                        setInterval(function(){
                        location.reload(); // this will run after every 5 seconds
                        }, 5000);
                        
                    } else {
                        $(".alert-message").html(data);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
            }
            return false;
        });

        $(document).on('submit', '#update', function (event) {
            event.preventDefault();
            var formData = $("#update").serialize();
            var url = $("#update").attr("action");
            $.ajax({
                url: url,
                type: "POST",
                asyn: false,
                data: formData,
                success: function (data, textStatus, jqXHR)
                {
                    if (data === '200') {                       
                        $(".alert-update").html("<div class='alert alert-success'><strong>Success! </strong>User Info has been updated successfully.</div>");
                        setInterval(function(){
                        location.reload(); // this will run after every 5 seconds
                        }, 5000);
                        
                    } else {
                        $(".alert-update").html(data);
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

