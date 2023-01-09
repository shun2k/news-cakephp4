<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Jcode $jcode
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $jcode->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $jcode->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Jcodes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="jcodes form content">
            <?= $this->Form->create($jcode) ?>
            <fieldset>
                <legend><?= __('Edit Jcode') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('json');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
