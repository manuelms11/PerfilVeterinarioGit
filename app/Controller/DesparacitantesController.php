<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DesparacitantesController extends AppController {
    public function beforeFilter() {
		parent::beforeFilter();
		// Allow users to register and logout.
    
		$this->Auth->allow('index');
    
	}		
    public function index() {}
    
    public function add(){
        if ($this->request->is('post')) {
            $this->Desparacitante->create();
            if ($this->Desparacitante->save($this->request->data)) {
                $this->Session->setFlash(__('Se ha añadido un '));
                return $this->redirect(array('controller'=>'users', 'action' => 'index'));
            }
            $this->Session->setFlash(
                __('No se creo la mascota, trate de nuevo')
            );
        }
    }
	
	public function findDesp($id = null){
		
		$desp = $this->Desparacitante->findById($id);
		return $desp['Desparacitante']['nombre'];
		
	}
	
	public function add_despet($id = null) {
            // $userId = $this->Auth->user('id');
            // $usuario = $this->Dueno->findById($userId);
            $desp = $this->Desparacitante->find('list', array('fields'=>'id, nombre'));
            if (!$desp) {
                throw new NotFoundException(__('No existen desparacitantes para elegir'));
            }
            $this->set('desparacitante', $desp);
	    $this->set('idmascota', $id);
		// if ($this->request->is('post')) {
            // $this->Dueno->Mascota->create();
            // if ($this->Dueno->Mascota->save($this->request->data)) {
                // $this->Session->setFlash(__('Se ha añadido una mascota'));
                // return $this->redirect(array('action' => 'index'));
            // }
            // $this->Session->setFlash(
                // __('No se pudo agregar una mascota.Por favor intente de nuevo.')
            // );
        // }
    }
	
}