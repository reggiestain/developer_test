<?php

/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Network\Request;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class UsersController extends AppController {

    /**
     * Displays a view
     *
     * @return void|\Cake\Network\Response
     * @throws \Cake\Network\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     * 
     */
    public function beforeFilter(\Cake\Event\Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow(['index', 'add', 'save', 'view', 'delete', 'update']);
        $this->UsersTable = TableRegistry::get('users');
    }

    public function index() {
        $userList = $this->UsersTable->find();
        $this->set('userList', $userList);
        $this->set('title', 'Index');
        $this->viewBuilder()->layout('dashboard');
    }

    public function add() {
        $user = $this->UsersTable->newEntity();
        $this->set('user', $user);
        $this->set('title', 'Add User');
        $this->viewBuilder()->layout('dashboard');
    }

    public function save() {
        if ($this->request->is('ajax')) {
            $userEntity = $this->UsersTable->newEntity();
            $user = $this->UsersTable->patchEntity($userEntity, $this->request->data);
            if (empty($user->errors())) {
                $this->UsersTable->save($user);
                $status = '200';
                $message = '';
            } else {
                $error_msg = [];
                foreach ($user->errors() as $errors) {
                    if (is_array($errors)) {
                        foreach ($errors as $error) {
                            $error_msg[] = $error;
                        }
                    } else {
                        $error_msg[] = $errors;
                    }
                }
                $status = 'error';
                $message = $error_msg;
            }
            $this->set("status", $status);
            $this->set("message", $message);
            $this->set('_serialize', ['status', 'message']);
            $this->viewBuilder()->layout(false);
        }
    }

    public function view($id) {
        $user = $this->UsersTable->get($id);
        $this->set('user', $user);
        $this->viewBuilder()->layout(false);
    }

    public function edit($id) {
        $Profile = $this->ProfilesTable->get($id, ['contain' => ['Languages']]);
        $language = $this->LanguagesTable->find('list');
        $this->set('language', $language);
        $this->set('Profile', $Profile);
        $this->viewBuilder()->layout(false);
    }

    public function update($id) {
        if ($this->request->is('ajax')) {
            $user = $this->UsersTable->get($id);
            if ($this->request->is(['post', 'put'])) {
                $user = $this->UsersTable->patchEntity($user, $this->request->data);
                if (empty($user->errors())) {
                    $this->UsersTable->save($user);
                    $status = '200';
                    $message = '';
                } else {
                    $error_msg = [];
                    foreach ($user->errors() as $errors) {
                        if (is_array($errors)) {
                            foreach ($errors as $error) {
                                $error_msg[] = $error;
                            }
                        } else {
                            $error_msg[] = $errors;
                        }
                    }
                    $status = 'error';
                    $message = $error_msg;
                }
                $this->set("status", $status);
                $this->set("message", $message);
                $this->set('_serialize', ['status', 'message']);
                $this->viewBuilder()->layout(false);
            }
        }
    }

    public function delete($id) {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->UsersTable->get($id);
        if ($this->UsersTable->delete($user)) {
            $message = 'success';
        }else{
            $message = 'error';
        }
        $this->set("message", $message);
        $this->set('_serialize', ['message']);
        $this->viewBuilder()->layout(false);
    }

}
