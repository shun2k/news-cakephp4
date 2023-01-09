<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Jcode> $jcodes
 */
?>
<div class="jcodes index content">
    <?= $this->Html->link(__('New Jcode'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Jcodes') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('json') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($jcodes as $jcode): ?>
                <tr>
                    <td><?= $this->Number->format($jcode->id) ?></td>
                    <td><?= h($jcode->name) ?></td>
                    <td><?= h($jcode->json) ?></td>
                    <td><?= h($jcode->created) ?></td>
                    <td><?= h($jcode->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $jcode->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $jcode->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $jcode->id], ['confirm' => __('Are you sure you want to delete # {0}?', $jcode->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
