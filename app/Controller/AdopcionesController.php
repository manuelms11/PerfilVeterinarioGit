<?php


class AdopcionesController extends AppController{
    public $uses = array('Adopcione', 'Dueno');
    public $paginate;
     
    public function beforeFilter() {
        if ($this->Session->read('usuario')) {
            $usuario = $this->Dueno->findByUsername($this->Session->read('usuario'));
            //var_dump($usuario);
            $this->set('nombre', $usuario['Dueno']['nombre']);
        }
    }
    
    public function listaAdopciones(){
        $this->paginate['Adopcione']['limit'] = 5;
        $this->paginate['Adopcione']['order'] = array('Adopcione.id' => 'asc');
        $this->paginate['Adopcione']['conditions']['Adopcione.aprobado'] = 0;
        $adop = $this->paginate();
        //$adop = $this->Adopcione->find('all', array('Adopciones.aprobado'=>'0'));
        $this->set('adops', $adop);
    }
   
    public function porAprobar(){
        $this->paginate['Adopcione']['limit'] = 5;
        $this->paginate['Adopcione']['order'] = array('Adopcione.id' => 'asc');
        $this->paginate['Adopcione']['conditions']['Adopcione.aprobado'] = 1;
        $adop = $this->paginate();
        //$adop = $this->Adopcione->find('all', array('Adopciones.aprobado'=>'0'));
        $this->set('adops', $adop);
    }
    
    public function add(){
        $usuario = $this->Dueno->findByUsername($this->Session->read('usuario'));
        if($usuario['Dueno']['admin']==0){
            $this->redirect(array('controller'=>'Dueno', 'action'=>'index'));
        }
        if ($this->request->is('post')) {
            $this->Adopcione->create();
            $image = $this->data['Adopcione']['imagen'];
            $imageTypes = array("image/gif", "image/jpeg", "image/png");
            $uploadFolder = "img/adopciones";
            $uploadPath = WWW_ROOT . $uploadFolder;
            foreach ($imageTypes as $type) {
                    if ($type == $image['type']) {
                      //check if there wasn't errors uploading file on serwer
                        if ($image['error'] == 0) {
                             //image file name
                            $image['name']=date("Y-m-d").$image['name'];
                            $imageName = $image['name'];
                            //check if file exists in upload folder
                            if (file_exists($uploadPath . '/' . $imageName)) {
  							                //create full filename with timestamp
                                $imageName = date('His') . $imageName;
                            }
                            //create full path with image name
                            $full_image_path = $uploadPath . '/' . $imageName;
                            //upload image to upload folder
                            move_uploaded_file($image['tmp_name'], $full_image_path);
                        }
                        //$this->data['Adopcione']['imagen']=$imageName;
                }
            }
            
            $adop = array(
                'nombre_mascota'=>$this->request->data['Adopcione']['nombre_mascota'],
                'edad'=>$this->request->data['Adopcione']['edad'],
                'desparacitado'=>$this->request->data['Adopcione']['desparacitado'],
                'tipo_mascota'=>$this->request->data['Adopcione']['tipo_mascota'],
                'raza'=>$this->request->data['Adopcione']['raza'],
                'nota'=>$this->request->data['Adopcione']['nota'],
                'vacunas_dia'=>$this->request->data['Adopcione']['vacunas_dia'],
                'imagen'=>$imageName,
                'contacto'=>$this->request->data['Adopcione']['contacto'],
                'aprobado'=>0
            );
            if($this->Adopcione->save($adop)) {
                $this->Session->setFlash('Mascota registrada para la adopcion');
                return $this->redirect(array('action' => 'listaAdopciones'));
            }
            $this->Session->setFlash(_('Error al agregar adopcion intente de nuevo mas tarde'));
            }
    }
    
    public function edit($id = null){
        $adopcion = $this->Adopcione->findById($id);
        if (!$adopcion) {
            $this->Session->setFlash(_('La mascota no existe'));
            return $this->redirect(array('action'=>'listaAdopciones'));
        }
        $this->set('ado', $adopcion);
        if ($this->request->is('post', 'put')) {
            if ($this->Adopcione->save($this->request->data)) {
                $this->Session->setFlash(_('Adopcion editada con exito'));
                return $this->redirect(array('action'=>'listaAdopciones'));
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