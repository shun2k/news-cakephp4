<div class="container">
  <!-- ナビゲーション -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">

        <ul class="navbar-nav me-auto mb-2 mb-lg-0 custom-nav">
            <li class="nav-item"><?=$this->Html->link(' 天気予報 ', ['controller' => 'News-users', 'action' => 'weatherDetail', $pref, $local],['class' => 'nav-link text-nowrap each-tab' ]) ?></li>
            <li class="nav-item "><?=$this->Html->link(' ビジネス ', ['controller' => 'News-users', 'action' => 'newslist', 'business'],['class' => 'nav-link text-nowrap each-tab' ]) ?></li>
            <li class="nav-item"><?=$this->Html->link('エンタメ', ['controller' => 'News-users', 'action' => 'newslist', 'entertainment' ],['class' => 'nav-link text-nowrap each-tab' ]) ?></li>
            <li class="nav-item"><?=$this->Html->link('全般', ['controller' => 'News-users', 'action' => 'newslist', 'general'],['class' => 'nav-link text-nowrap each-tab' ]) ?></li>
            <li class="nav-item"><?=$this->Html->link('健康', ['controller' => 'News-users', 'action' => 'newslist', 'health'],['class' => 'nav-link text-nowrap each-tab' ]) ?></li>
            <li class="nav-item"><?=$this->Html->link('サイエンス', ['controller' => 'News-users', 'action' => 'newslist', 'science'],['class' => 'nav-link text-nowrap each-tab' ]) ?></li>
            <li class="nav-item"><?=$this->Html->link('スポーツ', ['controller' => 'News-users', 'action' => 'newslist', 'sports'],['class' => 'nav-link text-nowrap each-tab' ]) ?></li>
            <li class="nav-item"><?=$this->Html->link('テクノロジー', ['controller' => 'News-users', 'action' => 'newslist', 'technology'],['class' => 'nav-link text-nowrap each-tab' ]) ?></li>
            <li class="nav-item"><?=$this->Html->link('個人設定', ['controller' => 'News-users', 'action' => 'index', $id],['class' => 'nav-link text-nowrap each-tab' ]) ?></li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="row">
    <!-- ここから -->

    <?php
      // $colから表示する項目数を得る      
      $countval = trim(mb_strlen($col, 'UTF-8'));
      $column = $col;
      $newsdata = $data;
      $prefecture = $pref;

      for ($i=0; $i < $countval; $i++) {
        if ($column[$i] === "1") {
          echo $this->Listup->getWeahterNews($newsdata, $prefecture, $local, $pref_city);
        } else {
          echo $this->News->getNewsData($column[$i], $newsdata);
        }
      }
    ?>

    <!-- ここまで -->
  </div>
  
</div>
