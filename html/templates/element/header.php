<div id = header class="container">
  <div class="row">
    <div class = "col">
    </div>  

    <div class="col center-block">
      <h1 class="text-center title">
        <?= $this->Html->link($pageTitle, ['controller'=>'News-users', 'action'=>'main']) ?>
      </h1>
      <h2  class="text-center subtitle">
        ~ <?=$subtitle ?> ~
      </h2>
    </div>
    <div class="col center-block d-flex flex-row">
      <div class="d-flex align-items-center">
        <h6 class="mb-0 mr-3">
          <?= $username ?>
        </h6>
      </div>
      <div class="d-flex align-items-center">  
        <?= $this->Html->link($logintag,['controller'=>'News-users', 'action'=>$linkAction], ['class' => 'btn btn-primary btn-sm mx-auto d-block'] )  ?>
      </div> 
      
    </div>
  </div>
</div>
