<?php
App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class Desparacitante extends AppModel {
	
	public $useTable = 'desparacitantes';
	
    public $validate = array(
        'ingredienteactivo' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'El ingrediente activo es requerido'
            )
        ),
        'nombre' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Debe dar un nombre'
            )
        ),
        'descripcion' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Debe dar una descripcion'
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

public $hasMany = array(
    'RegistroDesparacitaciones'=>array(
        'className'=>'registrodesparacitaciones',//tabla
        'foreignKey'=>'iddesparasitante'//llave foranea de Despara
    
    )
);

}