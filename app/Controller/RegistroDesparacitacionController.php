<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class RegistroDesparacitacionController extends AppController {
    public function beforeFilter() {
    parent::beforeFilter();
    // Allow users to register and logout.
    
    $this->Auth->allow('index');
    
}
    public function index() {}
    
    public function add(){
        if ($this->request->is('post')) {
            $this->RegistroDesparacitacion->create();
            if ($this->RegistroDesparacitacion->save($this->request->data)) {
                $this->Session->setFlash(__('Se ha añadido una desparacitacion'));
                return $this->redirect(array('controller'=>'duenos', 'action' => 'profile'));
            }
            $this->Session->setFlash(
                __('No se creo la desparacitacion, trate de nuevo')
            );
        }
    }	
}