<div id="main">
    <h3 class="pull-left">Adopciones por aprobar</h3>
    <br>
    <div id="panel-adopciones">
        <?php
        if($adops){
            var_dump($adops);
            foreach ($adops as $ad){
                echo '<div class="info-adopcion">';
                echo '<ul>';
                echo '</ul>';
                echo '</div>';
            }
        }
        ?>
    </div>
</div>