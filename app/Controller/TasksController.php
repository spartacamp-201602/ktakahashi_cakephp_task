<?php

class TasksController extends AppController {

    public $helpers = array('Html', 'Form');

    public $components = array('Flash');

    public function index() {
        $options = array(
            'conditions' => array(
            'Task.status' => 0)
            );
        $tasks = $this->Task->find('all', $options);

        $this->set('tasks', $tasks);

    }

    public function done($id) {
        $this->Task->id = $id;
        if ($this->Task->saveField('status', 1))
        {
            $msg = sprintf('タスク %s を完了しました。', $id);
            $this->Flash->success($msg);

            $this->redirect(array('action' => 'index'));
        }
        else
        {
            // 更新に失敗した場合
            $this->Flash->error('更新できませんでした。。。');
        }
    }

    public function create() {
        // ポストメソッドの時
        if ($this->request->is('post'))
        {
            if ($this->Task->save($this->request->data))
            {
                $msg = sprintf('タスク %s を作成しました。', $this->Task->id);
                $this->Flash->success($msg);

                $this->redirect(array('action' => 'index'));
            }
            else
            {
                $this->Flash->error('保存できませんでした。。。');
            }
        }
    }

    public function edit($id) {
        $task = $this->Task->findById($id);

        if (!$task)
        {
            $this->Flash->error('そんなタスクないよ');
            $this->redirect(array('action' => 'index'));
        }

        $this->Task->id = $id;

        // フォームからの送信をチェックします
        if ($this->request->is(array('post', 'put')))
        {
            // 更新を試みる
            if ($this->Task->save($this->request->data))
            {
                // 更新に成功した場合
                // フラッシュメッセージとともにリダイレクト
                // フラッシュメッセージ
                $this->Flash->success('タスク' . $id . 'を更新しました！');

                // リダイレクト
                $this->redirect(array('action' => 'index'));
            }
            else
            {
                // 更新に失敗した場合
                $this->Flash->error('タスクを更新できませんでした。。。');
            }
        }
        else
        {
            $this->request->data = $task;
        }

    }
}