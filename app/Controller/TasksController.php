<?php

class TasksController extends AppController
{
    // public $scaffold;

    public $helpers = array('Html', 'Form');

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

    // public function done($id)
    // {
    //     // 既存のレコードを取得
    //     $task = $this->Task->findById($id);

    //     if (!$task)
    //     {
    //         // 既存レコードが見つからない場合
    //         throw new NotFoundException('そんなタスクないよ〜');
    //     } else
    //     {
    //         $this->Task->id = $id;
    //         $this->Task->save(array('status' => 1));

    //         // フラッシュメッセージ
    //         $this->Flash->success('ID:' . $id . 'のタスクを完了しました');

    //         // リダイレクト
    //         return $this->redirect(array('action' => 'index'));
    //     }
    // }
}