<div class="pets form">
<?php echo $this->Form->create(); ?>
    <fieldset>
        <legend><?php echo __('Editar Pet'); ?></legend>
        <?php echo $this->Form->input('Pet.name', array('label'=>'Nombre: '));
        echo $this->Form->input('Pet.age', array('label'=>'Edad: ', 'type'=>'text'));
        echo $this->Form->input('Pet.id_user', array('label'=>false,'hidden'=>'hidden'));
        echo $this->Form->input('Pet.id', array('label'=>false,'type' => 'hidden'));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>
</div>