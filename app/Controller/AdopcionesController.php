<?php


class AdopcionesController extends AppController{
     
    public function add(){
        if ($this->request->is('post')) {
            $this->Adopcione->create();
            if($this->Adopcione->save($this->request->data)) {
                $this->Session->setFlash('Mascota registrada para la adopcion');
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(_('Error al agregar adopcion intente de nuevo mas tarde'));
        }
    }
    
    public function edit($id = null){
        $adopcion = $this->Adopcione->finById($id);
        if (!$adopcion) {
            $this->Session->setFlash(_('La mascota no existe'));
        }
        if ($this->request->is('post', 'put')) {
            if ($this->Adopcione->save($this->request->data)) {
                $this->Session->setFlash(_('Adopcion editada con exito'));
                return $this->redirect(array('action'=>'index'));
            }
            $this->Session->setFlash(_('Error al editar adopcion'));
        }
    }
    
    public function delete($id=null){
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Adopcione->delete($id)) {
            $this->Session->setFlash(
                __('Adopcion Eliminada')
            );
        } else {
            $this->Session->setFlash(
                __('Error no se pudo eliminar la adopcion')
            );
        }

        return $this->redirect(array('action' => 'index'));
    }
    
    public function approved(){//simplemente cambia el estado a aprobado
        
    }
    
}