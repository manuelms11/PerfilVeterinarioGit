<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class VacunasController extends AppController {
    public function beforeFilter() {
		parent::beforeFilter();
		// Allow users to register and logout.
    
		$this->Auth->allow('index');
    
	}		
    public function index() {}
    public function add(){
        if ($this->request->is('post')) {
            $this->Vacuna->create();
            if ($this->Vacuna->save($this->request->data)) {
                $this->Session->setFlash(__('Se ha añadido una mascota'));
                return $this->redirect(array('controller'=>'users', 'action' => 'index'));
            }
            $this->Session->setFlash(
                __('No se creo la mascota, trate de nuevo')
            );
        }
    }
	
	public function findVac($id = null){
		
		$vac = $this->Vacuna->findById($id);
		return $vac['Vacuna']['tipo'];
		
	}
	
	public function add_vacpet($id = null) {
		// $userId = $this->Auth->user('id');
		// $usuario = $this->Dueno->findById($userId);

		$vac = $this->Vacuna->find('list', array('fields'=>'id, tipo'));
        if (!$vac) {
            throw new NotFoundException(__('No existen vacunas para elegir'));
        }
        $this->set('vaccines', $vac);
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