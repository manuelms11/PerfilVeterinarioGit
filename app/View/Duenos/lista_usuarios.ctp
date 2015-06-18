<div id="main">
    <?php
    echo $this->Html->link('<< Volver al perfil', 
                                array(
                            'controller' => 'duenos',
                            'action' => 'profile'), array('style'=>'font-family:"Bangers"; font-size: 18px'));
    ?>
    <br>
    <br>
    <table class="table table-striped">
        <thead >
            <tr >
        <th>Nombre de usuario</th>
        <th>Nombre</th>
        <th>Correo</th>
        <th>Cambiar a...</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($listaDuenos as $val){
                    echo '<tr>';
                    echo '<td>';
                    echo $val['Dueno']['username'];
                    echo '</td>';
                    echo '<td>';
                    echo $val['Dueno']['nombre'];
                    echo '</td>';
                    echo '<td>';
                    echo $val['Dueno']['correo'];
                    echo '</td>';
                    echo '<td>';
                    if($val['Dueno']['admin']==0){//cambiar por tipo_usuario
                        $tipo = 'Administrador';
                    }else{
                        $tipo = 'Normal';
                    }
                    echo $this->Html->link($tipo, 
                                array(
                            'controller' => 'duenos',
                            'action' => 'cambiar/'.$val['Dueno']['id']), array('type'=>'button', 'class'=>'btn btn-default'));
                    
                    echo '</td>';
                    echo '</tr>';
                }
            ?>
        </tbody>
    </table>
</div>
<div id="clear"></div>