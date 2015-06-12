<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Mascota extends AppModel {
	
	public $useTable = 'mascotas';
	
    public $validate = array(
        'nombre' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Nombre es requerido'
            )
        ),
        'edad' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Debe digitar la edad'
            )
        )
    );

    public $hasMany = array(
        'Registrovacuna'=>array(
            'className'=>'registrovacunas',//tabla
            'foreignKey'=>'idmascota'//llave foranea de Mascota
         ),   
        'RegistroDesparacitacion'=>array(
            'className'=>'registrodesparacitaciones',//tabla
            'foreignKey'=>'iddesparasitante'//llave foranea de Despara
        )
    );
	
}