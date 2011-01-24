<?php if (empty($invitations)): ?>
<p>No more invites to approve. <?php echo $this->Html->link(__('Return to home.'), '/'); ?></p>
<?php else: ?>
<ul>
<?php foreach ($invitations as $invite): ?>
	<li>
		<span class="username"><?php echo $this->Html->link($invite['DoFriend']['username'], array('controller' => 'accounts', 'action' => 'view', $invite['DoFriend']['username'])); ?></span>
		<?php echo $this->Form->postLink(__('Accept'), array('controller' => 'accounts', 'action' => 'invite_response', $invite['DoFriend']['id']), array('data' => array('accept' => 1))); ?>
		<?php echo $this->Form->postLink(__('Deny'), array('controller' => 'accounts', 'action' => 'invite_response', $invite['DoFriend']['id']), array('data' => array('accept' => 0))); ?>
	</li>
<?php endforeach; ?>
</ul>
<?php endif; ?>
