<!DOCTYPE html>
<html>
<head>
  <?=$this->Html->charset() ?>
  <title><?=$this->fetch('title') ?></title>
  <?=$this->Html->css('news') ?>
  <?=$this->Html->css('bootstrap.min.css') ?>

  <?=$this->Html->script('jquery-3.6.0.min.js') ?>
  <?=$this->Html->script('select.js') ?>
  <?=$this->Html->script('jquery.tgHierSelectV2t.js') ?>
  <?=$this->Html->scriptStart(array('inline' => false)); ?>
    $(document).ready(function(){
      $(this).tgHierSelectV2t({
          group: 'group1',
          maxLevel: '8',
          defaultSelect: '-- select --',
      });
    });
  <?=$this->Html->scriptEnd(); ?>

</head>

<body>
  <header class="container head row">
    <?=$this->element('header', $header) ?>
  </header>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-2 " style="background:gray;"></div>
      <div class="col-lg-8 ">
        <div class="square">
          <?=$this->fetch('content') ?>
        </div>
      </div>
      <div class="col-lg-2 "style="background:orange;"></div>
    </div>
  </div>
  <footer class="container foot row">
    <?=$this->element('footer', $footer) ?>
  </footer>
</body>
</html>
