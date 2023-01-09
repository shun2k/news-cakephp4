<!DOCTYPE html>
<html>
<head>
  <?=$this->Html->charset() ?>
  <title><?=$this->fetch('title') ?></title>
  <?=$this->Html->css('news') ?>
  <?=$this->Html->css('weatherImg') ?>
  <?=$this->Html->css('bootstrap.min.css') ?>

  <?=$this->Html->script('jquery-3.6.0.min.js') ?>
  <?=$this->Html->script('jquery.rwdImageMaps.js') ?>
  <?=$this->Html->script('bootstrap.min.js') ?>
  <?=$this->Html->script('imgMap.js') ?>
</head>

<body>
  <header class="container head row">
    <?=$this->element('header', $header) ?>
  </header>
  <div class="container">
    <div class="row">
      <div class="col-sm-2 hidden-xs" style="background:gray;"></div>
      <div class="col-sm-8 col-xs-12">
        <?=$this->fetch('content') ?>
      </div>
      <div class="col-sm-2 hidden-xs"style="background:orange;"></div>
    </div>
  </div>
  <footer class="container foot row">
    <?=$this->element('footer', $footer) ?>
  </footer>
</body>
</html>
