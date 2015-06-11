<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class VeterinariasController extends AppController {
    public $components = array('RequestHandler');
    public $helpers = array('Js');
    public $paginate;
	 public $uses = array('Veterinaria', 'Dueno');
    
    public function beforeFilter() {
        if ($this->Session->read('usuario')) {
            $usuario = $this->Dueno->findByUsername($this->Session->read('usuario'));
            //var_dump($usuario);
            $this->set('nombre', $usuario['Dueno']['nombre']);
        }
    }

     public function index(){
         $this->Veterinaria->recursive =0;
         
         $this->paginate['Veterinaria']['limit']=5;
         $this->paginate['Veterinaria']['order']=array('Veterinaria.nombre'=>'asc');
         if($this->request->is('post')){
            if(!empty($this->request->data['nombre'])){
                $this->paginate['Veterinaria']['conditions']['Veterinaria.nombre LIKE']= '%'.$this->request->data['nombre'].'%';
            }
            if(!empty($this->request->data['provincia'])){
                $this->paginate['Veterinaria']['conditions']['Veterinaria.provincia']= $this->request->data['provincia'];
            }
         }
        $vets = $this->paginate();
         $this->set('vets', $vets);
     }
     
     public function add(){
         if ($this->request->is('post', 'put')) {
             $this->Veterinaria->create();
             if($this->Veterinaria->save($this->request->data)){
                 $this->Session->setFlash(_('Veterinaria creada'));
                 return $this->redirect(array('action'=>'index'));
             }
             $this->Session->setFlash(_('Error al crear veterinaria'));
         }
     }
     
     public function edit($id=null){
         $veterianria = $this->Veteniaria->finById($id);
         if (!$veterinaria) {
             $this->Session->setFlash(_('Veterinaria no existe'));
         }
         if($this->Veterinaria->save($this->request->data)){
             $this->Session->setFlash(_('Veterinaria creada con exito'));
             return $this->redirect(array('action'=>'index'));
         }
         $this->Session->setFlash(_('Error al editar veterinaria intente de nuevo mas tarde'));
     }   
     
}