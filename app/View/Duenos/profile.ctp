<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Cambiar Image</h4>
            </div>
            <div class="modal-body">
                <span class="pull-left">
                    <?php
                    if (empty($user['Dueno']['foto'])) {
                        echo $this->Html->image('no-foto.jpg', array('alt' => 'Sin foto', 'width' => '200px', 'height' => '200px'));
                    } else {
                        echo $this->Html->image($user['Dueno']['foto'], array('alt' => '', 'width' => '200px', 'height' => '200px'));
                    }
                    ?>
                </span>
                <div class="images-form pull-right">
                    <?php echo $this->Form->create('Dueno', array('type' => 'file', 'action' => 'cargarImagen')); ?>
                    <fieldset>

                        <?php
                        echo $this->Form->input('image', array('label' => 'Añadir Imagen', 'type' => 'file'));
                        ?>

                    </fieldset>

                </div>
            </div>
            <div id="clear"></div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <?php echo $this->Form->end(); ?>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="main">
    <div class="row pull-left">
        <div class="col-sm-12">
            <!--left col-->
            <ul class="list-group">
                <li class="list-group-item text-right">
                    <strong class=""><span class="pull-left">
                            <h3>
                                <?php
                                echo strtoupper($user['Dueno']['nombre']);
                                ?>
                            </h3>
                    </strong>
                    <div id="clear"></div>
                </li>
                <li class="list-group-item">
                    <?php
                    if (empty($user['Dueno']['foto'])) {
                        echo $this->Html->image('no-foto.jpg', array('alt' => 'Sin foto', 'width' => '200px', 'height' => '200px'));
                    } else {
                        echo $this->Html->image($user['Dueno']['foto'], array('alt' => '', 'width' => '200px', 'height' => '200px'));
                    }
                    ?>
                    </span>
                    <br>
                    <a href="javascript:void(0)" onclick="modalopenImage()">Cambiar Imagen</a>
                    <div id="clear"></div>
                </li>
                <li class="list-group-item text-muted" contenteditable="false">
                    <span class="pull-left"><a>Editar perfil</a></span>
                    <div id="clear"></div>
                </li>
                <li class="list-group-item text-right">
                    <span class="pull-left"><?php
                        echo $this->Html->link(
                                'Añadir mascotas', '/duenos/add_pet'
                        );
                        ?></span>
                    <div id="clear"></div>
                </li>
                <li class="list-group-item text-right">
                    <span class="pull-left"><a>Eliminar Mascotas</a></span>
                    <div id="clear"></div>
                </li>
                <li class="list-group-item text-right">
                    <span class="pull-left"><a>Agregar Información de Veterinarias</a></span>
                    <div id="clear"></div>
                </li>
                <li class="list-group-item text-right">
                    <span class="pull-left"><a>Agregar Información de Adopciones</a></span>
                    <div id="clear"></div>
                </li>
                <li class="list-group-item text-right"><span class="pull-left"><?php
                        echo $this->Html->link(
                                'Desconectarme', array(
                            'controller' => 'duenos',
                            'action' => 'logout',
                            'full_base' => true
                        ));
                        ?></span>
                    <div id="clear"></div>
                </li>
            </ul>
        </div>
        <div id='clear'></div>
    </div>
    <br><br>
    
    <div id='mascotas' class="pull-left col-md-8">
        <h1>Mascotas</h1>
        <?php
        $mascotas = $user['Mascota'];
        if ($mascotas) {
            echo "<ul>";
            foreach ($mascotas as $mascota) {
                echo "<li class='petInfo col-md-12'>";
                echo "<div class='pull-left fotoPet'>";
                if (empty($mascota['foto'])) {
                        echo $this->Html->image('no-foto.jpg', array('alt' => 'Sin foto', 'width' => '100px', 'height' => '100px'));
                    } else {
                        echo $this->Html->image($mascota['foto'], array('alt' => '', 'width' => '100px', 'height' => '100px'));
                    }
                echo '</div>';
                echo '<div class="pull-left infoPet">';
                echo "Nombre: ";
                echo $this->Html->link($mascota['nombre'], '/duenos/viewPet/' . $mascota['id']);
                echo "<br>";                
                echo "Edad: " . $mascota['edad'];
                echo "<br>";
                echo $this->Html->link('Editar', '/duenos/editPet/' . $mascota['id']);             
                echo "<br>";
                echo '</div';
                echo "</li>";
            }
            echo '</ul>';
        } else {   
            echo '<h3>';
            echo "Ninguna mascota agregada";    
            echo '</h3>';
            echo $this->Html->image('no-pet.jpg', array('alt' => 'Sin mascotas'));
        }
        ?>
    </div>
    <div id='clear'></div>
</div>
