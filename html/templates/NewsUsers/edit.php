<div class="row">

    <?=$this->Form->create(null, ['name'=>'Forms' ,'type' => 'post' ,'valueSources' => 'data' ,'url'=>['controller'=>'News-users', 'action'=>'editconfirm']]) ?>
    <?=$this->Form->hidden('id', array('value'=>$data['id'])) ?>
    <div class="box">
      <p class="box-item">&lt;下記の項目を入力してください&gt;</p>
    </div>
    <div class="box">
      <p class="box-item">名前</p>
      <p class="box-item"><?= $this->Form->text('name', array('value'=>$inputData['name'], 'label'=>'', 'required'=>true)) ?></p>
    </div>
    <div class="box">
      <p class="box-item">都道府県</p>
      <?php 
          $str = json_encode($pref_city); 
          // echo gettype($pref);
          $sessionData = json_encode($inputData);    
      ?>
        <script>
          var php = {
            str: <?= $str ?>
          };

          var inputData = {
            str: <?= $sessionData ?>
          }
        </script>
        <p class="box-item">
          <?= $this->Form->select('prefecture',['' => '選択してください'], ['id' => 'select-pref', 'required'=>true]) ?>
        </p>
    </div>
    <div class="box">
      <p class="box-item">市町村</p>
      <p class="box-item"><?= $this->Form->select('local',['' => '選択してください'], ['id' => 'select-city', 'required'=>true]) ?></p>
    </div>
    <div class="box">
      <p class="box-item">メールアドレス</p>
      <p class="box-item"><?= $this->Form->email('email', array('value'=>$inputData['email'], 'required'=>true)) ?></p>
    </div>
    <div class="box">
      <p class="box-item">パスワード</p>
      <p class="box-item"><?= $this->Form->password('password', ['id'=>'password','required'=>true, 'value'=> $inputData['password']]) ?></p>
    </div>
    <div class="box">
      <p class="box-item">パスワード確認<span id="passconfirm"></span></p>
      <p class="box-item"><?= $this->Form->password('password', ['id'=>'passwordCheck', 'required'=>true]) ?></p>
    </div>
  </hr>
  <p></p>
  <p>&lt;ニュース設定&gt;</p>
  <p>４つ以上選んでください</p>
  <?php $options = [
         ['text' => '未設定', 'value' => '', 'class' => '0' , 'selected'=>true],
         ['text' => '天気予報', 'value' => '1', 'class' => '1' ],
         ['text' => 'ビジネス', 'value' => '2', 'class' => '2' ],
         ['text' => 'エンターテイメント', 'value' => '3', 'class' => '3' ],
         ['text' => '全般', 'value' => '4', 'class' => '4' ],
         ['text' => '健康', 'value' => '5', 'class' => '5' ],
         ['text' => 'サイエンス', 'value' => '6', 'class' => '6' ],
         ['text' => 'スポーツ', 'value' => '7', 'class' => '7' ],
         ['text' => 'テクノロジー', 'value' => '8', 'class' => '8' ],
        ]; 
  ?>
    <div class="box">
      <p class="box-item">１段目</p>
      <p class="box-item"><?=$this->Form->select('selectForm1',$options, array('class'=>'group1','id'=>'lv1', 'required'=>true)); ?></p>
     <p class="box-item">以前の設定: <?= $data['selectForm1'] ?></p>
    </div>
    <div class="box">
      <p class="box-item">２段目</p>
      <p class="box-item"><?=$this->Form->select('selectForm2',$options, array('class'=>'group1','id'=>'lv2', 'disabled'=> true, 'required'=>true)); ?></p>
      <p class="box-item">以前の設定: <?= $data['selectForm2'] ?></p>
    </div>
    <div class="box">
      <p class="box-item">３段目</p>
      <p class="box-item"><?=$this->Form->select('selectForm3',$options, array('class'=>'group1','id'=>'lv3', 'disabled'=> true, 'required'=>true)); ?></p>
      <p class="box-item">以前の設定: <?= $data['selectForm3'] ?></p>
    </div>
    <div class="box">
      <p class="box-item">４段目</p>
      <p class="box-item"><?=$this->Form->select('selectForm4',$options, array('class'=>'group1','id'=>'lv4', 'disabled'=> true, 'required'=>true)); ?></p>
      <p class="box-item">以前の設定: <?= $data['selectForm4'] ?></p>
    </div>
    <div class="box">
      <p class="box-item">５段目</p>
      <p class="box-item"><?=$this->Form->select('selectForm5',$options, array('class'=>'group1','id'=>'lv5', 'disabled'=> true)); ?></p>
      <p class="box-item">以前の設定: <?= $data['selectForm5'] ?></p>
    </div>
    <div class="box">
      <p class="box-item">６段目</p>
      <p class="box-item"><?=$this->Form->select('selectForm6',$options, array('class'=>'group1','id'=>'lv6', 'disabled'=> true)); ?></p>
      <p class="box-item">以前の設定: <?= $data['selectForm6'] ?></p>
    </div>
    <div class="box">
      <p class="box-item">７段目</p>
      <p class="box-item"><?=$this->Form->select('selectForm7',$options, array('class'=>'group1','id'=>'lv7', 'disabled'=> true)); ?></p>
      <p class="box-item">以前の設定: <?= $data['selectForm7'] ?></p>
    </div>
    <div class="box">
      <p class="box-item">８段目</p>
      <p class="box-item"><?=$this->Form->select('selectForm8',$options, array('class'=>'group1','id'=>'lv8', 'disabled'=> true)); ?></p>
      <p class="box-item">以前の設定: <?= $data['selectForm8'] ?></p>
    </div>

  </table>
  <p><?=$this->Form->submit('送信',['class'=>'btn btn-primary']) ?></p>
  <p><?= $this->Html->link('戻る', ['controller' => 'News-users', 'action' => 'index', $data->id],['class'=>'btn btn-secondary']) ?></p>

</div>
