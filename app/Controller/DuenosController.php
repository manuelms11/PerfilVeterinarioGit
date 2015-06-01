<?php

App::uses('AppController', 'Controller');

class DuenosController extends AppController {

    public function beforeFilter() {
    parent::beforeFilter();
    // Allow users to register and logout.
    
    $this->Auth->allow('add', 'logout', 'index', 'login');
    if($this->Session->read('usuario')){
       $usuario = $this->Dueno->findByUsername($this->Session->read('usuario'));
       //var_dump($usuario);
    $this->set('nombre', $usuario['Dueno']['nombre']);
    }
    
}

public function index(){
//    if($this->Session->read('usuario')){
//       $usuario = $this->Dueno->findByUsername($this->Session->read('usuario'));
//       $this->set('nombre', $usuario['nombre']);
//    }
    
    
}
public function cargarImagen(){
    $this->autoRender = false;
    if ($this->request->is('post')) {
            if ($this->data['Dueno']) {
                $image = $this->data['Dueno']['image'];
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
                                $usuario = $this->Dueno->findByUsername($this->Session->read('usuario'));
                                $this->Dueno->id = $usuario['Dueno']['id'];
                                $this->Dueno->saveField('foto', $imageName);
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


public function login() {
    $this->autoRender = false;
//    if($this->Session->check('Auth.User')){
//            $this->redirect(array('action' = > 'index'));      
//        }
    if ($this->request->is('post')) {
       //var_dump($this->request->data);
        if ($this->Auth->login($this->request->data['Dueno']['username'])){
            $this->Session->write('usuario', $this->request->data['Dueno']['username']);
            return $this->redirect($this->Auth->redirectUrl());
        }
        //echo 'sigue';
        //echo 'ole';exit;
        $this->Session->setFlash(__('Invalid username or password, try again'));
        return $this->redirect(array('action'=>'index'));
    }
    //echo 'this->->redirectUrl()';exit;
}

public function logout() {
$this->Session->destroy();
    return $this->redirect($this->Auth->logout());
}

    public function profile() {
        $usuario = $this->Dueno->findByUsername($this->Session->read('usuario'));
        $this->set('user', $usuario);
    }

    public function view($id = null) {
        $this->Dueno->id = $id;
        if (!$this->Dueno->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->Dueno->read(null, $id));
    }
    
    public function viewPet($id = null) {
        $pet=$this->Dueno->Mascota->findById($id);
        if (!$pet) {
            throw new NotFoundException(__('Mascota Invalida'));
        }
        $this->set('mascota', $pet);
    }
    
    public function add_pet() {
        $usuario = $this->Dueno->findByUsername($this->Session->read('usuario'));
        $this->set('user_id', $usuario['Dueno']['id']);
        if ($this->request->is('post')) {
            $this->Dueno->Mascota->create();
            if ($this->Dueno->Mascota->save($this->request->data)) {
                $this->Session->setFlash(__('Se ha añadido una mascota'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('No se pudo agregar una mascota.Por favor intente de nuevo.')
            );
        }
    }
    
    public function editPet($id = null) {
        $pet=$this->Dueno->Mascota->findById($id);
        if (!$pet) {
            throw new NotFoundException(__('Mascota invalida'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->Dueno->Mascota->id = $id;
        if ($this->Dueno->Mascota->save($this->request->data)) {
            $this->Session->setFlash(__('Your post has been updated.'));
            return $this->redirect(array('action' => 'index'));
        }
            $this->Session->setFlash(
                __('No se pudo editar. Intente de nuevo.')
            );
        }
        if (!$this->request->data) {
            $this->request->data = $pet;
        }
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Dueno->create();
            if ($this->Dueno->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('No se pudo agregar el usuario. Por favor intente de nuevo.')
            );
        }
    }

    public function edit($id = null) {
        $this->Dueno->id = $id;
        if (!$this->Dueno->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Dueno->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('The user could not be saved. Please, try again.')
            );
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id = null) {
        // Prior to 2.5 use
        // $this->request->onlyAllow('post');

        $this->request->allowMethod('post');

        $this->Dueno->id = $id;
        if (!$this->Dueno->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->Dueno->delete()) {
            $this->Session->setFlash(__('User deleted'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        return $this->redirect(array('action' => 'index'));
    }
}
