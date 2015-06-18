<div id='main'>
<div class="pets form">
<?php echo $this->Form->create(null, array(
    'url' => array('controller' => 'Registrodesparacitacion', 'action' => 'add/')
)); ?>
    <fieldset>
        <legend><?php echo __('Añadir Desparacitacion'); ?></legend>
        <?php echo $this->Form->input('Registrodesparacitacion.fecha', array('label'=>'Fecha (yyyy/mm/dd): '));
		echo $this->Form->input('Registrodesparacitacion.iddesparasitante', array('options'=>$desparacitante, 'label'=>'Desparacitante: ',
                                  'empty'=>'Category','selected'=>'Your Value')); 
        echo $this->Form->input('Registrodesparacitacion.idmascota', array('label'=>false, 'type' => 'hidden', 'class' => 'form-control','hidden'=>'hidden', 'value'=>$idmascota));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Añadir')); ?>
</div>
   
</div>