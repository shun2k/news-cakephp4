<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\NewsUser> $newsUsers
 */
?>
<div class="newsUsers index content">
    <?= $this->Html->link(__('New News User'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('News Users') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('prefecture') ?></th>
                    <th><?= $this->Paginator->sort('local') ?></th>
                    <th><?= $this->Paginator->sort('column_order') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($newsUsers as $newsUser): ?>
                <tr>
                    <td><?= $this->Number->format($newsUser->id) ?></td>
                    <td><?= h($newsUser->name) ?></td>
                    <td><?= h($newsUser->prefecture) ?></td>
                    <td><?= h($newsUser->local) ?></td>
                    <td><?= h($newsUser->column_order) ?></td>
                    <td><?= h($newsUser->email) ?></td>
                    <td><?= h($newsUser->created) ?></td>
                    <td><?= h($newsUser->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $newsUser->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $newsUser->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $newsUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $newsUser->id)]) ?>
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
