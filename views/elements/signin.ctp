<div class="signin">
	<div class="login">
<?php
		echo $this->Form->create('Account', array('action' => 'login'));
		echo '<h2>', __('Already registered? Sign in.'), '</h2>';
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->end('Login');
?>
	</div>
	<div class="new_account">
		<h3>
			<?php echo __('Do you do not have an account?'); ?>
			<?php echo $this->Html->link('Create one now!', array('controller' => 'accounts', 'action' => 'add')); ?>
		</h3>
	</div>
</div>