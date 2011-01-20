<h2><?php echo __('Hi, %s.', $user['Account']['name']); ?></h2>
<?php if ($canAddAsFriend): ?>
<div id="add_as_friend">
	<?php echo $this->Helpers->Html->link('Add as friend', array('controller' => 'accounts', 'add_friend', $user['Account']['username'])); ?>
</div>
<?php endif; ?>

<div id="user_data">
	<?php echo $this->element('friends'); ?>
	<?php echo $this->element('photos'); ?>

	<div id="updates">
		<div id="my_post">
<?php
			echo $this->Helpers->Form->create('Post', array('url' => array('controller' => 'posts', 'action' => 'add')));
			echo $this->Helpers->Form->input('message');
			echo $this->Helpers->Form->end(__('Post'));
?>
		</div>
		<div id="feeds">
<?php foreach ($feeds as $feed): ?>
<?php endforeach; ?>
		</div>
	</div>
</div>