<p><?php __('Hi, %s.', $user['Account']['name']); ?></p>

<div id="user_data">
	<div id="friends">
	</div>

	<div id="updates">
		<div id="my_post">
<?php
			echo $this->Form->create('Post', array('url' => array('controller' => 'posts', 'action' => 'add')));
			echo $this->Form->input('message');
			echo $this->Form->end(__('Post'));
?>
		</div>
	</div>
</div>