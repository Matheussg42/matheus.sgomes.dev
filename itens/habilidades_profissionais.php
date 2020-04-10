<?php
$class = new Site;
$profissionais = $class->getHabilidadeProd();

foreach($profissionais as $profissional){
  $x = date('Y') - $profissional['inicio'];
  $total = date('Y') - 2014;
  $percentage = ($x*100)/$total;
  $ano = $x > 1 ? 'Anos' : 'Ano';
  ?>

  <li>
    <div class="name"><?= $profissional['habilidade']?> - <b> <?= "{$x} {$ano}"?></b></div>
    <div class="progress">
      <div class="percentage" style="width:<?=$percentage?>%;">
        <span class="percent"><i class="icon ion ion-ios-checkmark-empty"></i></span>
      </div>
    </div>
  </li>
<?php }
?>
