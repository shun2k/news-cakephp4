<div class="row">
    <p>入力情報の確認</p>
    <div class="box">
      <p class="box-item">お名前</p>
      <p class="box-item"><?= h($data['name']) ?></p>
    </div>
    <div class="box">
      <p class="box-item">都道府県</p>
      <p class="box-item"><?= $this->Listup->prefName($data['prefecture'], $pref_city) ?></p>
    </div>
    <div class="box">
      <p class="box-item">市町村</p>
      <p class="box-item"><?= $this->Listup->cityName($data['prefecture'], $data['local'] , $pref_city) ?></p>
    </div>
    <div class="box">
      <p class="box-item">メールアドレス</p>
      <p class="box-item"><?= h($data['email']) ?></p>
    </div>

    <hr/>
    <p><ニュースの表示順番></p>
    <?php
        $view = "";
        $col =  "";  // データベースから取得した$column_orderには空白文字があるためtrimで削除する
        $countval = 0;
        // dataの最後のキーを取得し、selectFormの最後の数字を取り出して、for文に使う
        $lastkey = array_key_last($data);
        $end = intval(substr($lastkey, -1));

        for ($i=1; $i<=$end; $i++) {
            if ($data["selectForm$i"] == "") {
                break;
            }
            $col .= $data["selectForm$i"];
            $countval += 1;
        }
        
        for ($i=0; $i < $countval; $i++) {
            $number = $i + 1;
            $view .= "<div class='box'>". "\n" . "<p class='box-item'>" . $number . "段目 </p> ";
            switch ($col[$i]) {
                case "1":
                $view .= "<p class='box-item'> 天気予報 </p>" . "\n" . "</div>";
                break;

                case "2":
                $view .= "<p class='box-item'> ビジネス </p>" . "\n" . "</div>";
                break;

                case "3":
                $view .= "<p class='box-item'> エンターテイメント </p>" . "\n" . "</div>";
                break;

                case "4":
                $view .= "<p class='box-item'> 全般 </p>" . "\n" . "</div>";
                break;

                case "5":
                $view .= "<p class='box-item'> 健康 </p>" . "\n" . "</div>";
                break;

                case "6":
                $view .= "<p class='box-item'> サイエンス </p>" . "\n" . "</div>";
                break;

                case "7":
                $view .= "<p class='box-item'> スポーツ </p>" . "\n" . "</div>";
                break;

                case "8":
                $view .= "<p class='box-item'> テクノロジー </p>" . "\n" . "</div>";
                break;


                default:
                break;
            }
        }
        echo $view;

    ?>
    <p></p>

    <?= $this->Form->create(null, ['name'=>'Form', 'type' => 'post', 'url'=>['controller'=>'News-users', 'action'=>'update']]) ?>
    
    <div><p><?=$this->Form->submit('確定', ['class'=>'btn btn-primary']) ?></p></div>
    <?= $this->Form->end() ?>
    <p><?= $this->Html->link('戻る', ['controller' => 'News-users', 'action' => 'edit',$id],['class'=>'btn btn-danger']) ?></p>

</div>