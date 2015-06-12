<div id='main'>
    <div class="pets form">
        <?php echo $this->Form->create(null, array(
            'url' => array('controller' => 'registrovacunas', 'action' => 'add/')
        )); ?>
            <fieldset>
                <legend><?php echo __('Añadir Vacunación'); ?></legend>
                <div class="form-group">
                    <?php echo $this->Form->input('Registrovacuna.fechavacuna', array('label'=>'Fecha (yyyy/mm/dd): ','class' => 'form-control form-input-right')); ?>
                </div>
                <div id="clear"></div>
                <div class="form-group">
                    <?php echo $this->Form->input('Registrovacuna.idvacuna', array('options'=>$vaccines, 'label'=>'Vacuna: ', 'class' => 'form-control form-input-right', 'empty'=>'Category','selected'=>'Your Value'));?>
                </div>
                <div id="clear"></div>      
                <div class="form-group">
                    <?php echo $this->Form->input('Registrovacuna.pesoanimal', array('label'=>'Peso(kg): ', 'type'=>'text','class' => 'form-control form-input-right'));?>
                </div>
                <div id="clear"></div>
                <div class="form-group">
                    <?php echo $this->Form->input('Registrovacuna.edadanimal', array('label'=>'Edad(Años): ', 'type'=>'text','class' => 'form-control form-input-right'));?>
                </div>
                <div id="clear"></div>
                <div class="form-group">
                    <?php echo $this->Form->input('Registrovacuna.longitudanimal', array('label'=>'Longitud(cm): ', 'type'=>'text','class' => 'form-control form-input-right'));?>
                </div>
                <div id="clear"></div>
                <div class="form-group">
                    <?php echo $this->Form->input('Registrovacuna.idmascota', array('label'=>false, 'type' => 'hidden', 'class' => 'form-control','hidden'=>'hidden', 'value'=>$idmascota));?>
                </div>
                <div id="clear"></div>   
                 <button type="submit" class="btn btn-primary pull-right">Agregar</button>
            </fieldset>
        <?php echo $this->Form->end(); ?>
        <!--<php echo $this->Form->end(__('Añadir')); ?>-->
    </div>  
</div>