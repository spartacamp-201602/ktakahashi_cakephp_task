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
        <td><?= $task['Task']['id'] ?></td>
        <td><?= $task['Task']['name'] ?></td>
        <td><?= $task['Task']['due_date'] ?></td>
        <td><?= $task['Task']['created'] ?></td>
        <td><?= $this->Html->link('このタスクを完了する',
                                array(
                                'controller' => 'tasks',
                                'action' => 'done')) ?></td>
    </tr>
    <?php endforeach; ?>
</table>