<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class MascotasController extends AppController {
    public function beforeFilter() {
    parent::beforeFilter();
    // Allow users to register and logout.
    
    $this->Auth->allow('index');
    
}
    public function index() {}
    public function add(){
        if ($this->request->is('post')) {
            $this->Mascota->create();
            if ($this->Mascota->save($this->request->data)) {
                $this->Session->setFlash(__('Se ha añadido una mascota'));
                return $this->redirect(array('controller'=>'users', 'action' => 'index'));
            }
            $this->Session->setFlash(
                __('No se creo la mascota, trate de nuevo')
            );
        }
    }
	
	public function cargarImagen($id = null){
    $this->autoRender = false;
    if ($this->request->is('post')) {
            if ($this->data['Mascota']) {
                $image = $this->data['Mascota']['image'];
                //allowed image types
                $imageTypes = array("image/gif", "image/jpeg", "image/png");
                //upload folder - make sure to create one in webroot
                $uploadFolder = "img";
                //full path to upload folder
                $uploadPath = WWW_ROOT . $uploadFolder;
               //var_dump(WWW_ROOT);exit;

                //check if image type fits one of allowed types
                foreach ($imageTypes as $type) {
                    if ($type == $image['type']) {
                      //check if there wasn't errors uploading file on serwer
                        if ($image['error'] == 0) {
                             //image file name
                            $imageName = $image['name'];
                            //check if file exists in upload folder
                            if (file_exists($uploadPath . '/' . $imageName)) {
  							                //create full filename with timestamp
                                $imageName = date('His') . $imageName;
                            }
                            //create full path with image name
                            $full_image_path = $uploadPath . '/' . $imageName;
                            //upload image to upload folder
                            if (move_uploaded_file($image['tmp_name'], 
                                    $full_image_path)) {
                                $this->Session->setFlash('File saved successfully');	
                                $mascota = $pet=$this->Mascota->findById($id);
                                $this->Mascota->id = $mascota['Mascota']['id'];
                                $this->Mascota->saveField('foto', $imageName);
                                $this->set('imageName',$imageName);
                            } else {
                                $this->Session->setFlash('There was a problem uploading file. Please try again.');
                            }
                        } else {
                            $this->Session->setFlash('Error uploading file.');
                        }
                        break;
                    } else {
                        $this->Session->setFlash('Unacceptable file type');
                    }
                }
            }
        }
		return $this->redirect(array('action'=>'profile'));
	}
	
}