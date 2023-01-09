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
            <?= $this->Html->link(__('Edit Jcode'), ['action' => 'edit', $jcode->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Jcode'), ['action' => 'delete', $jcode->id], ['confirm' => __('Are you sure you want to delete # {0}?', $jcode->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Jcodes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Jcode'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="jcodes view content">
            <h3><?= h($jcode->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($jcode->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Json') ?></th>
                    <td><?= h($jcode->json) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($jcode->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($jcode->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($jcode->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
