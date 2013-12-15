<h1>Login to Continue</h1>
<?php
  echo $this->Form->create('User', array('url'=>array('controller'=>'users', 'action' => 'login'), 'role' => 'form'));
  echo $this->Form->input('username', array('class' => 'form-control', 'div' => false, 'label' => 'Username', 'placeholder' => 'Your Username'));
  echo $this->Form->input('password', array('class' => 'form-control', 'div' => false, 'label' => 'Password', 'placeholder' => 'Your Password'));
  echo $this->Form->submit('Submit', array('class' => 'btn btn-default'));
  echo $this->Form->end();
?>
