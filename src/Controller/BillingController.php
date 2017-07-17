<?php

namespace App\Controller;


use Cake\Datasource\ConnectionManager;

class BillingController extends AppController{

    public function billingHomepage() {

        $this->set('user',$this->Auth->user('username'));
        $this->render('billing_homepage');

    }

}