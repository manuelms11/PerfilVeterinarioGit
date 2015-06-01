<div id='main'>
<div class="pets form">
<?php echo $this->Form->create(null, array(
    'url' => array('controller' => 'adopciones', 'action' => 'add')
)); ?>
    <fieldset>
        <legend><?php echo __('Añadir Adopcion'); ?></legend>
        <?php
        echo $this->Form->input('Adopcion.nombre_mascota', array('label'=>'Nombre: '));
        echo $this->Form->input('Adopcion.edad', array('label'=>'Edad: ', 'type'=>'text'));
        echo $this->Form->input('Adopcion.desparacitado', array('label'=>'Desparacitaciones: '));
        echo $this->Form->input('Adopcion.tipo_mascota', array('label'=>'Tipo: '));
        echo $this->Form->input('Adopcion.raza', array('label'=>'Raza: '));
        echo $this->Form->input('Adopcion.vacunas_dia', array('label'=>'Vacunas: '));
        ?>
    </fieldset>
<?php echo $this->Form->end(__('Crear')); ?>
</div>
   
</div>