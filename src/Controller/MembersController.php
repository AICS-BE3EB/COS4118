<?php
namespace App\Controller;

use Cake\Controller\Controller;

class MembersController extends Controller {

    public function Members() {
        $data = array(
            "members" => array(
                "Lovelyn",
                "Grace",
                "Lebrado"
            )
        );
        $this->set($data);
        $this->render('Members');
    }

}