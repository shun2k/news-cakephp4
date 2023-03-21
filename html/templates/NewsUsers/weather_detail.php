<div class="container">
  <!-- ナビゲーション -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">

        <ul class="navbar-nav me-auto mb-2 mb-lg-0 custom-nav">
            <li class="nav-item"><?=$this->Html->link(' 天気予報 ', ['controller' => 'News-users', 'action' => 'weatherDetail', $prefecture, $local],['class' => 'nav-link text-nowrap each-tab' ]) ?></li>
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
    <p class="text-center h1"><?= $this->Listup->changeName($prefecture, $local, $pref_city) ?>の天気</p>
    <!-- <p class="text-center h1"><?php echo $name = $local == "" ? $prefecture : $local; ?>の天気</p> -->
    <?php
      echo $this->Listup->weatherDetail($data);
      // echo $this->Html->image('/img/sunny.png');
      // echo "<p><img src='/renewsapp/img/rain.png' /></p>";
    ?>

  </div>
  <div class="row">
     <!-- jsonから目的の情報をとる 
    必要情報 
      画像及び、お天気情報取得のため $prefectureを修正した名前 -- $modPrefecture
      選択された都道府県 -- $prefecture
      jsonデータ       -- $pref_city
    -->
    <?= $this->Listup->prefCityPictureLink($modPrefecture, $prefecture, $pref_city); ?>
    

  </div>
  <div class="row">
    <p><button　type="button" class="btn btn-light toggle-btn">他の地域を指定する</button></p>
    <p>
    <?php
    echo $this->Html->image('mapj.png',['id' => 'map', 'alt' => 'map',
          'usemap' => '#example1', 'width' => '1000', 'height' => '750'/*,'style'=>'display:none;'*/]);
    ?>
    </p>
    <map name="example1">
      <!-- 九州 -->
      <area shape="rect" coords="66,636,127,681"
      href=<?= $this->Url->build(["controller" => "News-users", "action" => "weatherDetail", "Okinawa-ken", ""]) ?> >
      <area shape="rect" coords="130,468,190,513"
      href=<?= $this->Url->build(["controller" => "News-users", "action" => "weatherDetail", "FukuokaXPrefecture", ""]) ?> >
      <area shape="rect" coords="65,468,127,513"
      href=<?= $this->Url->build(["controller" => "News-users", "action" => "weatherDetail", "Saga-ken", ""]) ?> >
      <area shape="rect" coords="193,468,254,513"
      href=<?= $this->Url->build(["controller" => "News-users", "action" => "weatherDetail", "OitaXPrefecture", ""]) ?> >
      <area shape="rect" coords="66,516,127,561"
      href=<?= $this->Url->build(["controller" => "News-users", "action" => "weatherDetail", "NagasakiXPrefecture", ""]) ?> >
      <area shape="rect" coords="130,516,190,561"
      href=<?= $this->Url->build(["controller" => "News-users", "action" => "weatherDetail", "Kumamoto-ken", ""]) ?> >
      <area shape="rect" coords="193,516,254,610"
      href=<?= $this->Url->build(["controller" => "News-users", "action" => "weatherDetail", "Miyazaki-ken", ""]) ?> >
      <area shape="rect" coords="66,565,190,610"
      href=<?= $this->Url->build(["controller" => "News-users", "action" => "weatherDetail", "Kagoshima-ken", ""]) ?> >

      <!-- 中国 -->
      <area shape="rect" coords="273,468,334,562"
      href=<?= $this->Url->build(["controller" => "News-users", "action" => "weatherDetail", "Yamaguchi-ken", ""]) ?> >
      <area shape="rect" coords="337,468,398,513"
      href=<?= $this->Url->build(["controller" => "News-users", "action" => "weatherDetail", "Shimane-ken", ""]) ?> >
      <area shape="rect" coords="401,468,462,513"
      href=<?= $this->Url->build(["controller" => "News-users", "action" => "weatherDetail", "Tottori-ken", ""]) ?> >
      <area shape="rect" coords="337,516,398,562"
      href=<?= $this->Url->build(["controller" => "News-users", "action" => "weatherDetail", "Hiroshima-ken", ""]) ?> >
      <area shape="rect" coords="401,516,462,562"
      href=<?= $this->Url->build(["controller" => "News-users", "action" => "weatherDetail", "Okayama-ken", ""]) ?> >

      <!-- 四国 -->
      <area shape="rect" coords="328,580,390,625"
      href=<?= $this->Url->build(["controller" => "News-users", "action" => "weatherDetail", "Ehime-ken", ""]) ?> >
      <area shape="rect" coords="392,580,453,625"
      href=<?= $this->Url->build(["controller" => "News-users", "action" => "weatherDetail", "Kagawa-ken", ""]) ?> >
      <area shape="rect" coords="328,628,390,673"
      href=<?= $this->Url->build(["controller" => "News-users", "action" => "weatherDetail", "KochiXPrefecture", ""]) ?> >
      <area shape="rect" coords="392,628,453,673"
      href=<?= $this->Url->build(["controller" => "News-users", "action" => "weatherDetail", "Tokushima-ken", ""]) ?> >

      <!-- 近畿 -->
      <area shape="rect" coords="464,468,526,513"
      href=<?= $this->Url->build(["controller" => "News-users", "action" => "weatherDetail", "Hyogo", ""]) ?> >
      <area shape="rect" coords="528,468,590,513"
      href=<?= $this->Url->build(["controller" => "News-users", "action" => "weatherDetail", "KyotoXPrefecture,JP", ""]) ?> >
      <area shape="rect" coords="592,468,654,513"
      href=<?= $this->Url->build(["controller" => "News-users", "action" => "weatherDetail", "Shiga-ken", ""]) ?> >
      <area shape="rect" coords="464,516,526,562"
      href=<?= $this->Url->build(["controller" => "News-users", "action" => "weatherDetail", "Osaka-fu", ""]) ?> >
      <area shape="rect" coords="528,516,590,562"
      href=<?= $this->Url->build(["controller" => "News-users", "action" => "weatherDetail", "Nara-ken", ""]) ?> >
      <area shape="rect" coords="592,516,654,562"
      href=<?= $this->Url->build(["controller" => "News-users", "action" => "weatherDetail", "Mie-ken", ""]) ?> >
      <area shape="rect" coords="464,564,590,610"
      href=<?= $this->Url->build(["controller" => "News-users", "action" => "weatherDetail", "Wakayama-ken", ""]) ?> >

      <!-- 東海 -->
      <area shape="rect" coords="592,371,654,417"
      href=<?= $this->Url->build(["controller" => "News-users", "action" => "weatherDetail", "Ishikawa-ken", ""]) ?> >
      <area shape="rect" coords="656,371,717,417"
      href=<?= $this->Url->build(["controller" => "News-users", "action" => "weatherDetail", "Toyama-ken", ""]) ?> >
      <area shape="rect" coords="720,371,782,417"
      href=<?= $this->Url->build(["controller" => "News-users", "action" => "weatherDetail", "Niigata-ken", ""]) ?> >
      <area shape="rect" coords="592,419,654,465"
      href=<?= $this->Url->build(["controller" => "News-users", "action" => "weatherDetail", "Fukui-ken", ""]) ?> >
      <area shape="rect" coords="656,419,717,513"
      href=<?= $this->Url->build(["controller" => "News-users", "action" => "weatherDetail", "Gifu-ken", ""]) ?> >
      <area shape="rect" coords="720,419,782,513"
      href=<?= $this->Url->build(["controller" => "News-users", "action" => "weatherDetail", "Nagano-ken", ""]) ?> >
      <area shape="rect" coords="656,516,717,562"
      href=<?= $this->Url->build(["controller" => "News-users", "action" => "weatherDetail", "Aichi-ken", ""]) ?> >
      <area shape="rect" coords="720,516,782,562"
      href=<?= $this->Url->build(["controller" => "News-users", "action" => "weatherDetail", "Yamanashi-ken", ""]) ?> >
      <area shape="rect" coords="720,564,782,610"
      href=<?= $this->Url->build(["controller" => "News-users", "action" => "weatherDetail", "Shizuoka-ken", ""]) ?> >

      <!-- 関東 -->
      <area shape="rect" coords="783,419,845,465"
      href=<?= $this->Url->build(["controller" => "News-users", "action" => "weatherDetail", "Gunma-ken", ""]) ?> >
      <area shape="rect" coords="847,419,909,465"
      href=<?= $this->Url->build(["controller" => "News-users", "action" => "weatherDetail", "Tochigi-ken", ""]) ?> >
      <area shape="rect" coords="783,468,845,513"
      href=<?= $this->Url->build(["controller" => "News-users", "action" => "weatherDetail", "Saitama-ken", ""]) ?> >
      <area shape="rect" coords="847,468,909,513"
      href=<?= $this->Url->build(["controller" => "News-users", "action" => "weatherDetail", "Ibaraki", ""]) ?> >
      <area shape="rect" coords="783,516,845,562"
      href=<?= $this->Url->build(["controller" => "News-users", "action" => "weatherDetail", "Tokyo", ""]) ?> >
      <area shape="rect" coords="847,516,909,610"
      href=<?= $this->Url->build(["controller" => "News-users", "action" => "weatherDetail", "Chiba-ken", ""]) ?> >
      <area shape="rect" coords="783,564,845,610"
      href=<?= $this->Url->build(["controller" => "News-users", "action" => "weatherDetail", "Kanagawa", ""]) ?> >

      <!-- 東北 -->
      <area shape="rect" coords="783,226,909,272"
      href=<?= $this->Url->build(["controller" => "News-users", "action" => "weatherDetail", "Aomori-ken", ""]) ?> >
      <area shape="rect" coords="783,274,845,321"
      href=<?= $this->Url->build(["controller" => "News-users", "action" => "weatherDetail", "Akita-ken", ""]) ?> >
      <area shape="rect" coords="847,274,909,321"
      href=<?= $this->Url->build(["controller" => "News-users", "action" => "weatherDetail", "Iwate", ""]) ?> >
      <area shape="rect" coords="783,323,845,369"
      href=<?= $this->Url->build(["controller" => "News-users", "action" => "weatherDetail", "Yamagata-ken", ""]) ?> >
      <area shape="rect" coords="847,323,909,369"
      href=<?= $this->Url->build(["controller" => "News-users", "action" => "weatherDetail", "Miyagi-ken", ""]) ?> >
      <area shape="rect" coords="783,371,909,417"
      href=<?= $this->Url->build(["controller" => "News-users", "action" => "weatherDetail", "Fukushima-ken", ""]) ?> >

      <!-- 北海道 -->
      <area shape="rect" coords="783,67,934,207"
      href=<?= $this->Url->build(["controller" => "News-users", "action" => "weatherDetail", "Hokkaido", ""]) ?> >

    </map>
  </div>
</div>
