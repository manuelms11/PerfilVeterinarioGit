<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Pet extends AppModel {
	
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
}