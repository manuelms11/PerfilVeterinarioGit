<?php
App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class Registrovacuna extends AppModel {
	
	public $useTable = 'registrovacunas';
	
    public $validate = array(
	'idmascota' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Error con el identificador de la mascota'
            )
        ),
        'iddesparacitante' => array(
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