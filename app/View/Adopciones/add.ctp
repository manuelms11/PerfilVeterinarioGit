<div id='main'>
    <div class="pets form">
        <?php
        echo $this->Form->create(null, array(
            'url' => array('controller' => 'adopciones', 'action' => 'add'),
            'enctype'=>"multipart/form-data"
        ));
        ?>
        <fieldset>
            <legend><?php echo __('Añadir Adopción'); ?></legend>

            <div class="form-group">
                <?php
                echo $this->Form->input('nombre_mascota', array('label' => 'Nombre: ', 'class' => 'form-control'));
                ?>
            </div><div id="clear"></div>
            <div class="form-group">
                <?php
                echo $this->Form->input('edad', array('label' => 'Edad: ', 'type' => 'number', 'class' => 'form-control'));
                ?><br><br>
                <p class="pull-right">En años</p>
            </div><div id="clear"></div>
            
            <div class="form-group">
                <?php
                echo $this->Form->input('tipo_mascota', array('label' => 'Tipo de animal: ', 'class' => 'form-control', 'type'=>'text'));
                ?>
            </div><div id="clear"></div>
            <div class="form-group">
                <?php
                echo $this->Form->input('raza', array('label' => 'Raza: ', 'class' => 'form-control', 'type'=>'text'));
                ?>
            </div><div id="clear"></div>
            <div class="form-group">
                <?php
                $des = array('0' => 'Si', '1' => 'No');
                echo $this->Form->input('desparacitado', array('label' => 'Esta desparacitado? ', 'class' => 'form-control', 'options' => $des, 'default' => '0'));
                ?>
            </div><div id="clear"></div>
            <div class="form-group">
                <?php
                $vac = array('0' => 'Si', '1' => 'No');
                echo $this->Form->input('vacunas_dia', array('label' => 'Tiene vacunas al dia? ', 'class' => 'form-control', 'options'=>$vac, 'default' => '0'));
                ?>
            </div><div id="clear"></div>
            <div class="form-group images-form ">
                <?php echo $this->Form->input('imagen', array('label'=>'Foto: ', 'type' => 'file', 'class' => 'form-control')); ?>
            </div><div id="clear"></div>            
            <div class="form-group">
                <?php
                echo $this->Form->input('contacto', array('label' => 'Contacto: ', 'class' => 'form-control', 'type'=>'text'));
                ?><br><br>
                <p class="pull-right"># telefono o email</p>
            </div><div id="clear"></div>
            <div class="form-group">
                <?php
                echo $this->Form->input('nota', array('label' => 'Nota: ', 'class' => 'form-control', 'rows'=>3));
                ?>
            </div><div id="clear"></div>
            
            <button type="submit" class="btn btn-primary pull-right">Agregar Adopción</button>
        </fieldset>
<?php echo $this->Form->end(); ?>
    </div>

</div>