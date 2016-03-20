<h2>未完了タスク一覧</h2>
<?= $this->Html->link('新規タスク',
                        array(
                        'controller' => 'tasks',
                        'action' => 'create')); ?>

<h3><?= count($tasks) ?>件のタスクが未完了です</h3>

<?php foreach($tasks as $task) :?>
    <?= $this->element('task', array('task' => $task)); ?>
<?php endforeach; ?>