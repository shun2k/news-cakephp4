<div class="row">
    <div class="news-users form">
        <h3>ログイン画面</h3>
        
        <?= $this->Form->create() ?>
        <fieldset>
            <p><?= __('ユーザー名とパスワードを入力してください') ?></P>
            <?= $this->Flash->render() ?>
            <div class="box">
                <p class="box-item">メールアドレス</p>
                <p class="box-item">
                    <?= $this->Form->text('email') ?>
                </p>
            </div>
            <div class="box">
                <p class="box-item">パスワード</p>
                <p class="box-item">
                    <?= $this->Form->password('password') ?>
                </p>
            </div>
        </fieldset>
        <p>
            <?= $this->Form->submit('ログイン', ['class'=>'btn btn-primary']); ?>
        </p>
        <?= $this->Form->end() ?>
        <p>
            <?= $this->Html->link("新規作成", ['controller' => 'News-users', 'action' => 'add'],['class'=>'btn btn-secondary']) ?>
        </p>
    </div>
</div>
