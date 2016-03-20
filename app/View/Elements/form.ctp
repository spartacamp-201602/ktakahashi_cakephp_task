<?php

echo $this->Form->create('Task');
echo $this->Form->input('name');
echo $this->Form->input('body');
echo $this->Form->input('due_date');

?>