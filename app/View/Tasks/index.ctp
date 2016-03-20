<h2>未完了タスク一覧</h2>
<?= $this->Html->link('新規タスク',
                        array(
                        'controller' => 'tasks',
                        'action' => 'create')); ?>

<h3><?= count($tasks) ?>件のタスクが未完了です</h3>

<table>
    <tr>
        <th>ID</th>
        <th>名前</th>
        <th>期限日</th>
        <th>作成日</th>
        <th>操作</th>
    </tr>
    <?php foreach($tasks as $task) :?>
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
    <?php endforeach; ?>
</table>