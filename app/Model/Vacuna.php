<?php
App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class Vacuna extends AppModel {
	
	public $useTable = 'vacunas';
	
    public $validate = array(
        'tipo' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'El tipo es requerido'
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
    'RegistroVacunas'=>array(
        'className'=>'registrovacunas',//tabla
        'foreignKey'=>'idvacuna'//llave foranea de Vacuna
    )
);

}