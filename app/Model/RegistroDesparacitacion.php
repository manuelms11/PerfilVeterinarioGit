<?php
App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class RegistroDesparacitacion extends AppModel {

    public $useTable = 'registrodesparacitaciones';
	
    public $validate = array(
	'idmascota' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Error con el identificador de la mascota'
            )
        ),
        'iddesparasitante' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Error con el identificador del desparacitante'
            )
        ),
        'fecha' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Fecha incorrecta'
            )
        )
    );
    
    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $passwordHasher = new BlowfishPasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash(
                $this->data[$this->alias]['password']
            );
        }
        return true;
    }

}