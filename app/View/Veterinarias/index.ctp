<?php
    $this->Paginator->options(
            array(
                'update'=>'#listVets',
                'before'=>$this->Js->get('#procesando')->effect('fadeIn', array('buffer'=> false)),
                'complete'=>$this->Js->get('#procesando')->effect('fadeOut', array('buffer'=> false))
            )
    );
?>
<div id="main">
    <div class='pull-left col-md-12'>
        <div id="buscador">
            <h1>Buscar Veterinarias</h1>
            <fieldset>
            <?php
                echo $this->Form->create('Veterinaria', array('class'=>"form-horizontal", 'role'=>"form", 'action'=>'index'));   
            ?>
            <div class="pull-left col-md-4">
            <label>Nombre:</label><br>
            <input type="text" id='buscadorVet' class='form-control' name="data[nombre]">
            </div>
            <div class="pull-left col-md-4">
                <label>Provincia:</label><br>
                <select id="provinciaVet" name="data[provincia]" class="form-control">
                    <option value="">Elija una opcion</option>
                    <option value="San Jose">San Jose</option>
                    <option value="Heredia">Heredia</option>
                    <option value="Alajuela">Alajuela</option>
                    <option value="Limon">Limón</option>
                    <option value="Puntarenas">Puntarenas</option>
                    <option value="Guanacaste">Guanacaste</option>
                </select>
            </div>
            <br>
            <button type="submit" class="btn btn-primary" style="margin-top: 1%">Buscar</button>
            <?php 
            $this->Form->end();
            ?>
            </fieldset>
            <!--<button type="button" class="btn btn-primary">Agregar Nueva</button>-->
            <div id="clear"></div>
        </div>
    </div>
    <div class='pull-left col-md-12'>
        <div class="col-md-12">
            <div class="progress oculto" id="procesando">
                <div class="progress-bar progress-bar-striped active" role="progressbar" 
                     aria-volumnow="100" aria-valuemin="100" style="width: 100%"></div>
            </div>
        </div>
        <div id='listVets' class="col-md-12">
            <?php
            if (isset($vets)) {
                //var_dump($vets);
                foreach ($vets as $veterinaria) {
                    echo '<div class="panelVets col-md-12">';
                    echo '<div class="panel-body">';
                    echo '<span class="glyphicon glyphicon-home" aria-hidden="true">   </span><span class="vetText">'. $veterinaria['Veterinaria']['Nombre'] . '</span> <br>';
                    echo '<span class="glyphicon glyphicon-map-marker" aria-hidden="true">   </span><span class="vetText">' . $veterinaria['Veterinaria']['Direccion'] . ', ' . $veterinaria['Veterinaria']['Canton'] . ', ' . $veterinaria['Veterinaria']['Provincia'] . '</span><br>';
                    echo '<span class="glyphicon glyphicon-phone-alt" aria-hidden="true">   </span><span class="vetText">' . $veterinaria['Veterinaria']['Contacto'] . '</span><br>';
                    echo '</div>';
                    echo '</div>';
                }
            }
            echo '<p>';
            echo $this->Paginator->counter(
                    array(
                        'format'=> _('Pagina {:page} of {:pages}, Mostrando {:current} resultados de {:count} en total')
                    ));
            echo '</p>';
            ?>
            <ul class="pagination">
                <li><?php 
                    echo $this->Paginator->prev('<<', array('tag'=> false), null,  array('class'=>'prev disabled'));
                ?>
                </li>
                <?php
                echo $this->Paginator->numbers(array('separator'=>'', 'tag'=>'li', 'currentTag'=>'a', 'currentClass'=>'active'));
                ?>
            <li>
                <?php
                    echo $this->Paginator->next('>>', array('tag' => false), null, array('class'=>'next disabled'));
                ?>
            </li></ul>
            <?php
            $this->Js->writeBuffer()?>
        </div>
    </div>
    <div id='clear'></div>
</div>

