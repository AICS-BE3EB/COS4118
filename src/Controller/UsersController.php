<?php

namespace App\Controller;

use Cake\Auth\DefaultPasswordHasher;
use Cake\Http\ServerRequest;
use Cake\ORM\TableRegistry;

class UsersController extends AppController
{
    public $request;
    public $userAccount;

    public function __construct(
        ServerRequest $request
    ){
        $this->request = $request;
        $this->userAccount = TableRegistry::get("users");

        parent::__construct($request);
    }

    public function login() {
        $this->render("login");
    }

    public function authenticate() {
            if($this->request->is('post')) {
               $user = $this->Auth->identify();
               if($user) {
                   $this->Auth->setUser($user);
                   return $this->redirect($this->Auth->redirectUrl());
               }
               $msg = "Invalid Username or Password";
                $this->Flash->error($msg);
                $this->set('errorMsg',$msg);
            }
            $this->render("login");
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

    public function authenticated() {
        $this->render("authenticated");
    }

    public function registerForm() {
        $this->render("register_form");
    }

    public function addUser() {

        $data = [
            "username" => $this->request->getData("username"),
            "password" => (new DefaultPasswordHasher())->hash($this->request->getData("password")),
            "name" => $this->request->getData("full-name")
        ];

        $query = $this->userAccount->query();
        $query->insert(['username','password','name'])
            ->values($data)
            ->execute();
        $this->set($data);
        $this->render("login");
    }

}