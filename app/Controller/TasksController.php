<?php

class TasksController extends AppController
{
    // public $scaffold;

    public $helpers = array('Html', 'Form');

    public $components = array('Flash');

    public function index()
    {
        $options = array(
            'conditions' => array(
                'Task.status' => 0
                )
            );

        $tasks = $this->Task->find('all', $options);
        // select * from tasks where status = 0;

        $this->set('tasks', $tasks);
    }

    public function done($id)
    {
        $this->Task->id = $id;

        // 単一のレコードのカラムを更新
        $this->Task->SaveField('status', 1);

        //完了したことをフラッシュメッセージで表示
        $msg = sprintf('タスク %s を完了しました', $id);
        $this->Flash->success($msg);

        // リダイレクト
        return $this->redirect(array('action' => 'index'));
    }

    public function create()
    {
        //POSTメソッドのチェック
        if ($this->request->is('post'))
        {
            if ($this->Task->save($this->request->data))
            {
                $this->Flash->success('タスク'. $this->Task->id. 'を登録しました');

                // リダイレクト
                $this->redirect(array('action' => 'index'));
            }
            else
            {
                $this->Flash->error('登録できませんでした。。。');
            }
        }
    }
}