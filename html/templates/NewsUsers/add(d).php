<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\NewsUser $newsUser
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List News Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="newsUsers form content">
            <?= $this->Form->create($newsUser) ?>
            <fieldset>
                <legend><?= __('Add News User') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('prefecture');
                    echo $this->Form->control('local');
                    echo $this->Form->control('column_order');
                    echo $this->Form->control('email');
                    echo $this->Form->control('password');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
