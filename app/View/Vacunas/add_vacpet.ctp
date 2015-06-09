<div id='main'>
<div class="pets form">
<?php echo $this->Form->create(null, array(
    'url' => array('controller' => 'registrovacunas', 'action' => 'add/')
)); ?>
    <fieldset>
        <legend><?php echo __('Añadir Vacunación'); ?></legend>
        <?php echo $this->Form->input('Registrovacuna.fechavacuna', array('label'=>'Fecha (yyyy/mm/dd): '));
		echo $this->Form->input('Registrovacuna.idvacuna', array('options'=>$vacunas, 'label'=>'Vacuna: ',
                                  'empty'=>'Category','selected'=>'Your Value')); 
        echo $this->Form->input('Registrovacuna.pesoanimal', array('label'=>'Peso(kg): ', 'type'=>'text'));
        echo $this->Form->input('Registrovacuna.edadanimal', array('label'=>'Edad(Años): ', 'type'=>'text'));
		echo $this->Form->input('Registrovacuna.longitudanimal', array('label'=>'Longitud(cm): ', 'type'=>'text'));
		echo $this->Form->input('Registrovacuna.idmascota', array('label'=>false,'hidden'=>'hidden', 'value'=>$idmascota));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Añadir')); ?>
</div>
   
</div>