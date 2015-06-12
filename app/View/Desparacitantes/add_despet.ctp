<div id='main'>
<div class="pets form">
<?php echo $this->Form->create(null, array(
    'url' => array('controller' => 'RegistroDesparacitacion', 'action' => 'add/')
)); ?>
    <fieldset>
        <legend><?php echo __('Añadir Desparacitacion'); ?></legend>
        <?php echo $this->Form->input('RegistroDesparacitacion.fecha', array('label'=>'Fecha (yyyy/mm/dd): '));
		echo $this->Form->input('RegistroDesparacitacion.iddesparasitante', array('options'=>$desparacitante, 'label'=>'Desparacitante: ',
                                  'empty'=>'Category','selected'=>'Your Value')); 
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Añadir')); ?>
</div>
   
</div>