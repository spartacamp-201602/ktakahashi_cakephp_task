<h2>未完了タスク一覧</h2>

<?= $this->Html->link('新規タスク',
                        array(
                        'controller' => 'tasks',
                        'action' => 'create'
                        )); ?>

<h3><?= count($tasks) ?>件のタスクが未完了です</h3>

<table>
    <tr>
        <th>ID</th>
        <th>タスク名</th>
        <th>期限</th>
        <th>作成日</th>
        <th>操作</th>
    </tr>
    <?php foreach($tasks as $task) :?>
        <tr>
            <td><?= $this->Html->link($task['Task']['id'],
                            array(
                            'controller' => 'tasks',
                            'action' => 'view',
                            $task['Task']['id']
                            )); ?></td>
            <td><?= $task['Task']['name'] ?></td>
            <td><?= $task['Task']['due_date'] ?></td>
            <td><?= $task['Task']['created'] ?></td>
            <td><?= $this->Html->link('完了する',
                            array(
                            'controller' => 'tasks',
                            'action' => 'done',
                            $task['Task']['id']
                            )); ?></td>
        </tr>
    <?php endforeach ; ?>
</table>