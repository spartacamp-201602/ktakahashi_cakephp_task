<?php

/**
*
*/
class Task extends AppModel
{

    public $validate = array(
        // ここにルールを書いていく
        // ルール1 → 対象となるデータ
        // ルール2 → どんなバリデーションをするのか？
        // ルール3 → 引っかかったらどんなメッセージを出すか？
        'name' => array(
            'rule' => array('between', 5, 30),
            'message' => 'タスク名は5文字以上30文字以内で書いてね'
            ),
        'body' => array(
            'rule' => array('maxLength', 50),
            'message' => '詳細は50文字以内で書いてね'
            )
        );
}