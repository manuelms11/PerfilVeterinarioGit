<?php
App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {
	
	//public $useTable = 'dueno';
	
    public $validate = array(
        'usuario' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A username is required'
            )
        ),
        'clave' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A password is required'
            )
        )
    );
    
    public function beforeSave($options = array()) {
    if (isset($this->data[$this->alias]['clave'])) {
        $passwordHasher = new BlowfishPasswordHasher();
        $this->data[$this->alias]['clave'] = $passwordHasher->hash(
            $this->data[$this->alias]['clave']
        );
    }
    return true;
}

public $hasMany = array(
    'Pet'=>array(
        'className'=>'mascota',//tabla
        'foreignKey'=>'usuario'//llave foranea de PET
    )
);

}