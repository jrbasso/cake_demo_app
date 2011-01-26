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
			echo $this->Form->input('message', array('type' => 'textarea', 'maxlenght' => 255, 'autocomplete' => 'off'));
			echo $this->Form->end(__('Post'));
?>
		</div>
<?php endif; ?>
		<div id="feeds">
<?php foreach ($feeds as $feed): ?>
			<div class="feed">
				<div class="user"><?php echo $this->Html->link($feed['Account']['name'], array('controller' => 'accounts', 'action' => 'view', $feed['Account']['username'])); ?></div>
				<div class="post_message"><?php echo nl2br(h($feed['Post']['message'])); ?></div>
				<div class="time"><?php echo $this->Time->timeAgoInWords($feed['Post']['created']); ?></div>
				<div class="delete">
<?php
					if ($me && $feed['Account']['username'] === $loggedUser['Account']['username']) {
						echo $this->Form->postLink(__('Delete'), array('action' => 'delete_post', $feed['Post']['id']));
					}
?>
				</div>
				<div class="clear"></div>
<?php if ($me || $myFriend || !empty($feed['PostComment'])): ?>
				<div class="comments">
					<h4><?php echo __('Comments'); ?></h4>
<?php foreach ($feed['PostComment'] as $comment): ?>
					<div class="comment">
						<div>
							<?php echo $this->Html->link($comment['Commenter']['name'], array('controller' => 'accounts', 'view' => 'view', $comment['Commenter']['username'])); ?>
							<?php echo nl2br(h($comment['comment'])); ?>
						</div>
						<div class="time"><?php echo $this->Time->timeAgoInWords($comment['created']); ?></div>
					</div>
<?php endforeach; ?>
<?php if ($me || $myFriend): ?>
					<div class="new_comment">
<?php
						echo $this->Form->create('PostComment', array('url' => array('controller' => 'posts', 'action' => 'add_comment')));
						echo $this->Form->hidden('post_id', array('value' => $feed['Post']['id']));
						echo $this->Form->input('message', array('type' => 'textarea', 'maxlength' => 255, 'autocomplete' => 'off', 'label' => false, 'div' => false));
						echo $this->Form->end(__('Comment'));
?>
					</div>
<?php endif; ?>
				</div>
				<div class="clear"></div>
<?php endif; ?>
			</div>
<?php endforeach; ?>
		</div>
	</div>
</div>