<div class="wrap">
    <div id="regbar">
    <div id="navthing">
        
        <?php
        //echo 'kjkj'.$this->Session->read('Usuario');
        if(isset($nombre)){
            
            echo '<p>';
            echo $this->Html->link(
                $nombre,
                array(
                     'controller' => 'duenos',
                     'action' => 'profile',
                     'full_base' => true
                ));
            echo '  |  ';
            echo $this->Html->link(
                'Desconectarme',
                array(
                     'controller' => 'duenos',
                     'action' => 'logout',
                     'full_base' => true
                ));
           echo '</p>';
            }else{
        ?>
      <p><a href="javascript:void(0)" id="loginform" onclick="showLogin()">Iniciar Sesion</a> | 
      <?php
      echo $this->Html->link(
                'Registrarme',
                array(
                     'controller' => 'duenos',
                     'action' => 'add',
                     'full_base' => true
                ));
      ?>
      </p>
        <?php
        }
        ?>
      <div id="login">
      <div class="arrow-up"></div>
      <div class="formholder">
          <div class="randompad">
              <fieldset>
                  <?php
                    echo $this->Form->create('Dueno', array('class'=>"form-horizontal", 'role'=>"form", 'action'=>'login'));
                  ?>
                  <?php
                    echo $this->Form->input('Dueno.username', array('label'=>false, 'placeholder'=>'Nombre de usuario', 'class'=>'form-control'));
                    echo $this->Form->input('Dueno.password', array('label'=>false, 'placeholder'=>'Contraseña','class'=>"form-control"));
                  ?>
                  <button type="submit" class="btn btn-primary pull-right">Iniciar Sesion</button>
                  <?php
                    echo $this->Form->end();
                  ?>
              </fieldset>
          </div>
      </div>
    </div>
    </div>
  </div>

<?php
//echo $this->Html->image('pets.png', array('alt' => 'Pets', 'height'=>"100", 'width'=>"300"));
//?>

</div>
<div id="banner">
    <?php
    echo $this->Html->image('logo.png', array('alt' => 'CakePHP', 'height'=>'200px', 'width'=>'400px', 'class'=>'pull-left'));
    echo $this->Html->image('pets.png', array('alt' => 'CakePHP', 'height'=>'200px', 'width'=>'400px', 'class'=>'pull-right'));
    ?>
   
</div>

<div id="menu" class="col-md-12">
    <ul class="col-md-12">
        <li class="col-md-2"></li>
        <li class="col-md-3">
        <?php
            echo $this->Html->link(
                'Inicio',
                array(
                     'controller' => 'duenos',
                     'action' => 'index',
                     'full_base' => true
                ));
        ?>
        </li>
        <li class="col-md-3">
            <?php
            echo $this->Html->link(
                'Veterinarias',
                array(
                     'controller' => 'veterinarias',
                     'action' => 'index',
                     'full_base' => true
                ));
        ?>
        </li>
        <li class="col-md-3"><a>Adopciones</a></li>
        <li class="col-md-1"></li>
    </ul>
</div>
<br>