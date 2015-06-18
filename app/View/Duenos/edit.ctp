<?php
//$this->layout='ajax';
echo $this->Html->css('style.css');

?>
<div id="main">
    <div class="users form">
        <?php echo $this->Form->create('Dueno', array('class'=>'form-horizontal')); ?>
        <fieldset id="addForm">
            <legend><?php echo __('Editar Usuario'); ?></legend>
            <div class="form-group">
            <?php
            echo $this->Form->input('username', array('label' => 'Nombre de Usuario: ', 'class'=>'form-control'));
            ?>
            </div>
            <div class="form-group">
                <?php
            echo $this->Form->input('nombre', array('label' => 'Nombre: ', 'class'=>'form-control'));
            ?>
            </div>
            <div class="form-group">
                <?php
            echo $this->Form->input('correo', array('label' => 'Email: ', 'class'=>'form-control'));
            ?>
            </div>
            
            
            <button type="submit" class="btn btn-primary pull-right">Crear Cuenta</button>
        </fieldset>
<?php echo $this->Form->end(); ?>
    </div>
</div>