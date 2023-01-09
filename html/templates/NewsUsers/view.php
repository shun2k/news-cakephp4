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
            <?= $this->Html->link(__('Edit News User'), ['action' => 'edit', $newsUser->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete News User'), ['action' => 'delete', $newsUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $newsUser->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List News Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New News User'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="newsUsers view content">
            <h3><?= h($newsUser->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($newsUser->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Prefecture') ?></th>
                    <td><?= h($newsUser->prefecture) ?></td>
                </tr>
                <tr>
                    <th><?= __('Local') ?></th>
                    <td><?= h($newsUser->local) ?></td>
                </tr>
                <tr>
                    <th><?= __('Column Order') ?></th>
                    <td><?= h($newsUser->column_order) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($newsUser->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($newsUser->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($newsUser->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($newsUser->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
