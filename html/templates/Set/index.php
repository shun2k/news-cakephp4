<div class="row">

    <p>現在の設定</p>

    <div class="box">
      <p class="box-item">お名前</p>
      <p class="box-item"><?= $person->name ?></p>
    </div>
    <div class="box">
      <p class="box-item">地名</p>
      <p class="box-item"><?= $person->prefecture ?></p>
    </div>
    <div class="box">
      <p class="box-item">メールアドレス</p>
      <p class="box-item"><?= $person->email ?></p>
    </div>
    <div class="box">
      <p class="box-item">パスワード</p>
      <p class="box-item"><?= $person->password ?></p>
    </div>
  <hr/>
    <p><ニュースの表示順番></p>
  <?php
    mb_internal_encoding("UTF-8");
    $view = "";
    $col = trim($person->column_order);   // データベースから取得した$column_orderには空白文字があるためtrimで削除する
    $countval = mb_strlen($col, "UTF-8");
    
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
  <p><?= $this->Html->link('アカウントを編集する', ['controller' => 'Set', 'action' => 'edit', $person->id],['class'=>'btn btn-primary']) ?></p>
  <p><?= $this->Html->link('アカウントを削除する', ['controller' => 'Set', 'action' => 'delete', $person->id],['class'=>'btn btn-danger']) ?></p>
</div>
