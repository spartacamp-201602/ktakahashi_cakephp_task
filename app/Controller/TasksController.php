<?php

class TasksController extends AppController {

    public $helpers = array('Html');

    public function index() {
        $options = array(
            'conditions' => array(
            'Task.status' => 0)
            );
        $tasks = $this->Task->find('all', $options);

        $this->set('tasks', $tasks);

    }
}