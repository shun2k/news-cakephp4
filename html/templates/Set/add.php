<div class="row">
    <?=$this->Form->create(null, ['name'=>'Forms' ,'type' => 'post', 'url'=>['controller'=>'Set', 'action'=>'create']]) ?>
    <div class="box">
      <p class="box-item">名前</p>
      <p class="box-item"><?= $this->Form->text('name') ?></p>
    </div>
    <div class="box">
      <p class="box-item">地域</p>
      <p class="box-item"><?= $this->Form->select('prefecture',
        ['Hokkaido'=>'北海道', 'Aomori'=>'青森', 'Akita'=>'秋田', 'Iwate'=>'岩手',
        'Yamagata'=>'山形', 'Miyagi'=>'宮城', 'Fukushima'=>'福島', 'Gunma'=>'群馬',
        'Tochigi'=>'栃木', 'Saitama'=>'埼玉', 'Ibaraki'=>'茨城', 'Tokyo'=>'東京',
        'Chiba'=>'千葉', 'Kanagawa'=>'神奈川', 'Ishikawa'=>'石川', 'Toyama'=>'富山',
        'Niigata'=>'新潟', 'Fukui'=>'福井', 'Gifu'=>'岐阜', 'Nagano'=>'長野',
        'Aichi'=>'愛知', 'Yamanashi'=>'山梨', 'Shizuoka'=>'静岡', 'Hyogo'=>'兵庫',
        'Kyoto'=>'京都', 'Shiga'=>'滋賀', 'Osaka'=>'大阪', 'Nara'=>'奈良',
        'Mie'=>'三重', 'Wakayama'=>'和歌山', 'Yamaguchi'=>'山口','Shimane' =>'島根',
        'Tottori'=>'鳥取', 'Hiroshima'=>'広島', 'Okayama'=>'岡山', 'Ehime'=>'愛媛',
        'Kagawa'=>'香川', 'Kochi'=>'高知', 'Tokushima'=>'徳島', 'Saga'=>'佐賀',
        'Fukuoka'=>'福岡', 'Oita'=>'大分', 'Nagasaki'=>'長崎', 'Kumamoto'=>'熊本',
        'Miyazaki'=>'宮崎', 'Kagoshima'=>'鹿児島', 'Okinawa'=>'沖縄']) ?></p>
    </div>
    <div class="box">
      <p class="box-item">メールアドレス</p>
      <p class="box-item"><?= $this->Form->text('email') ?></p>
    </div>
    <div class="box">
      <p class="box-item">パスワード</p>
      <p class="box-item"><?= $this->Form->text('password') ?></p>
    </div>
  <p></p>
  <p>ニュース設定</p>
    <div class="box">
      <p class="box-item">１段目</p>
      <p class="box-item"><?=
       $this->Form->select('selectForm1',[
         '0'=>'未設定', '1'=>'天気予報', '2'=>'ビジネス', '3'=>'エンターテイメント',
         '4'=>'全般', '5'=>'健康', '6'=>'サイエンス', '7'=>'スポーツ', '8'=>'テクノロジー'
       ], ['onChange' => 'columnSet1()']); ?> </p>


    </div>
    <div class="box">
      <p class="box-item">２段目</p>
      <p class="box-item"><select name='selectForm2', id='second'></select></p>
    </div>
    <div class="box">
      <p class="box-item">３段目</p>
      <p class="box-item"><select name='selectForm3', id='third'></select></p>
    </div>
    <div class="box">
      <p class="box-item">４段目</p>
      <p class="box-item"><select name='selectForm4', id='forth'></select></p>
    </div>
    <div class="box">
      <p class="box-item">５段目</p>
      <p class="box-item"><select name='selectForm5', id='fifth'></select></p>
    </div>
    <div class="box">
      <p class="box-item">６段目</p>
      <p class="box-item"><select name='selectForm6', id='sixth'></select></p>
    </div>
    <div class="box">
      <p class="box-item">７段目</p>
      <p class="box-item"><select name='selectForm7', id='seventh'></select></p>
    </div>
    <div class="box">
      <p class="box-item">８段目</p>
      <p class="box-item"><select name='selectForm8', id='eighth'></select></p>
    </div>

  <div><?=$this->Form->submit('送信') ?></div>
</div>
