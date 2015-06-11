<div id="main">
    <h5 class="pull-left">Necesitamos un hogar</h5>
    <h6 class="pull-right">Si desea encontrar un hogar para un animalito puede hacerlo 
        <?php 
        echo $this->Html->link(' aquí<--',array('controller'=>'adopciones', 'action'=>'add'));
        ?>
    </h6>
    <br>
    <br>
    <ul>
        <?php
        if($adops){
            echo 'Hay adopciones';
        }
        ?>
    </ul>
</div>