<?php
App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class Registroconsulta extends AppModel {
	
	public $useTable = 'registroconsultas';
	
    public $validate = array(
		'idmascota' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Error con el identificador de la mascota'
            )
        ),
        'fecha' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'La fecha es requerida'
            )
        ),
        'descripcion' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'la descripcion es requerido'
            )
        ),
		'peso' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'el peso es requerida'
            )
        ),
		'edad' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'La edad es requerida'
            )
        ),
        	'longitud' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'La longitud es requerida'
            )
        ),
        	'costo' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'El costo es requerida'
            )
        ),
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
