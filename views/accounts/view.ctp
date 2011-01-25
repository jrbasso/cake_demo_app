<h2><?php echo $user['Account']['name']; ?></h2>
<?php if ($canBeMyFriend): ?>
<div id="add_as_friend">
	<?php echo $this->Html->link(__('Add as friend'), array('controller' => 'accounts', 'action' => 'add_friend', $user['Account']['username'])); ?>
</div>
<?php endif; ?>

<div id="user_data">
	<div id="user_info">
		<?php echo $this->element('friends'); ?>
		<?php echo $this->element('photos'); ?>
	</div>

	<div id="updates">
<?php if ($me): ?>
		<div id="my_post">
<?php
			echo $this->Form->create('Post', array('url' => array('controller' => 'posts', 'action' => 'add')));
			echo $this->Form->hidden('account_id', array('value' => $user['Account']['id']));
			echo $this->Form->input('message', array('type' => 'textarea', 'maxlenght' => 255, 'autocomplete' => 'off', 'placeholder' => __('Type or message here.')));
			echo $this->Form->end(__('Post'));
?>
		</div>
<?php endif; ?>
		<div id="feeds">
<?php foreach ($feeds as $feed): ?>
			<div class="feed">
				<p class="user"><?php echo $this->Html->link($feed['Account']['name'], array('controller' => 'accounts', 'action' => 'view', $feed['Account']['username'])); ?></p>
				<p class="message"><?php echo nl2br(h($feed['Post']['message'])); ?></p>
				<p class="time"><?php echo $this->Time->timeAgoInWords($feed['Post']['created']); ?></p>
				<div class="delete">
<?php
					if ($me && $feed['Account']['username'] === $loggedUser['Account']['username']) {
						echo $this->Form->postLink(__('Delete'), array('action' => 'delete_post', $feed['Post']['id']));
					}
?>
				</div>
				<div class="clear"></div>
			</div>
<?php endforeach; ?>
		</div>
	</div>
</div>