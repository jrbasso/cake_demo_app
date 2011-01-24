<h2><?php echo __('Hi, %s.', $user['Account']['name']); ?></h2>
<?php if ($canBeMyFriend): ?>
<div id="add_as_friend">
	<?php echo $this->Html->link(__('Add as friend'), array('controller' => 'accounts', 'action' => 'add_friend', $user['Account']['username'])); ?>
</div>
<?php endif; ?>

<div id="user_data">
	<?php echo $this->element('friends'); ?>
	<?php echo $this->element('photos'); ?>

	<div id="updates">
<?php if ($me): ?>
		<div id="my_post">
<?php
			echo $this->Form->create('Post', array('url' => array('controller' => 'posts', 'action' => 'add')));
			echo $this->Form->hidden('account_id', array('value' => $user['Account']['id']));
			echo $this->Form->input('message');
			echo $this->Form->end(__('Post'));
?>
		</div>
<?php endif; ?>
		<div id="feeds">
<?php foreach ($feeds as $feed): ?>
			<div class="feed">
				<p><?php
					echo __(
						'%s said on %s:',
						'<span class="user">' . $this->Html->link($feed['Account']['username'], array('controller' => 'accounts', 'action' => 'view', $feed['Account']['username'])) . '</span>',
						$this->Time->timeAgoInWords($feed['Post']['created'])
					);
				?></p>
				<p class="message"><?php echo nl2br(h($feed['Post']['message'])); ?></p>
			</div>
<?php endforeach; ?>
		</div>
	</div>
</div>