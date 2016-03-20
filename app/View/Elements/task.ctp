<!-- CSSの読み込み -->
<?= $this->Html->css('task'); ?>

<div class="roundBox">
<table>
    <tr>
        <th>ID</th>
        <th>名前</th>
        <th>期限日</th>
        <th>作成日</th>
        <th>操作</th>
    </tr>

    <tr>
        <td><?= h($task['Task']['id']) ?></td>
        <td><?= h($task['Task']['name']) ?>
            <?php foreach($task['Note'] as $note) :?>
            <li><?= $note['body'] ?></li>
            <?php endforeach; ?>
            <li><?= $this->Html->link('コメントを追加',
                                array(
                                'controller' => 'notes',
                                'action' => 'add')) ?></li>
        </td>
        <td><?= h($task['Task']['due_date']) ?></td>
        <td><?= h($task['Task']['created']) ?></td>
        <td><?= $this->Html->link('編集',
                                array(
                                'controller' => 'tasks',
                                'action' => 'edit',
                                $task['Task']['id'])) ?>
            <?= $this->Html->link('完了',
                                array(
                                'controller' => 'tasks',
                                'action' => 'done',
                                $task['Task']['id'])) ?></td>
    </tr>

</table>
</div>