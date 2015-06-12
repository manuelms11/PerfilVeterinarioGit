<div id='main'>
<div class="pets form">
<?php echo $this->Form->create(null, array(
    'url' => array('controller' => 'registroconsultas', 'action' => 'add/')
)); ?>
    <fieldset>
        <legend><?php echo __('Añadir Consultas'); ?></legend>
        <?php echo $this->Form->input('Registroconsulta.fecha', array('label'=>'Fecha (yyyy/mm/dd): '));
		echo $this->Form->input('Registroconsulta.idvacuna', array('options'=>$vaccines, 'label'=>'Vacuna: ',
                                  'empty'=>'Category','selected'=>'Your Value')); 
        echo $this->Form->input('Registroconsulta.Descripcion', array('label'=>'Descripcion(kg): ', 'type'=>'text'));
        echo $this->Form->input('Registroconsulta.peso', array('label'=>'Peso(kg): ', 'type'=>'text'));
        echo $this->Form->input('Registroconsulta.edad', array('label'=>'Edad(Años): ', 'type'=>'text'));
	echo $this->Form->input('Registroconsulta.longitud', array('label'=>'Longitud(cm): ', 'type'=>'text'));	
        echo $this->Form->input('Registroconsulta.costo', array('label'=>'Costo: ', 'type'=>'text'));
		echo $this->Form->input('Registroconsulta.idmascota', array('label'=>false,'hidden'=>'hidden', 'value'=>$idmascota));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Añadir')); ?>
</div>
   
</div>
