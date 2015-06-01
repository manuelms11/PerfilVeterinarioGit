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
        'fechavacuna' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'La fecha es requerida'
            )
        ),
        'pesoanimal' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'El peso es requerido'
            )
        ),
		'edadanimal' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'La edad es requerida'
            )
        ),
		'longitudanimal' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'La longitud es requerida'
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