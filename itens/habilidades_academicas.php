<?php
$class = new Site;
$academicas = $class->getHabilidadeAcad();

foreach($academicas as $academica){?>
  <li>
    <div class="name"><?= $academica['habilidade']?></div>
    <div class="progress">
      <div class="percentage" style="width:50%;">
        <span class="percent"><i class="icon ion ion-ios-checkmark-empty"></i></span>
      </div>
    </div>
  </li>
<?php }
?>
