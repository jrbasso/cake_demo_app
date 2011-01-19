<div class="accounts view">
<h2><?php  echo __('Account');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo h($account['Account']['id']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Username'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo h($account['Account']['username']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Password'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo h($account['Account']['password']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo h($account['Account']['name']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Email'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo h($account['Account']['email']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo h($account['Account']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Account'), array('action' => 'edit', $account['Account']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Account'), array('action' => 'delete', $account['Account']['id']), null, __('Are you sure you want to delete # %s?', $account['Account']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Accounts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Photos'), array('controller' => 'photos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Photo'), array('controller' => 'photos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Posts'), array('controller' => 'posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Photo Comments'), array('controller' => 'photo_comments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Photo Comment'), array('controller' => 'photo_comments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Post Comments'), array('controller' => 'post_comments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post Comment'), array('controller' => 'post_comments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Private Messages'), array('controller' => 'private_messages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Send Private Message'), array('controller' => 'private_messages', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Friends'), array('controller' => 'friends', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Do Friend'), array('controller' => 'friends', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Photos');?></h3>
	<?php if (!empty($account['Photo'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Account Id'); ?></th>
		<th><?php echo __('Path Location'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($account['Photo'] as $photo):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $photo['id'];?></td>
			<td><?php echo $photo['account_id'];?></td>
			<td><?php echo $photo['path_location'];?></td>
			<td><?php echo $photo['description'];?></td>
			<td><?php echo $photo['created'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'photos', 'action' => 'view', $photo['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'photos', 'action' => 'edit', $photo['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'photos', 'action' => 'delete', $photo['id']), null, __('Are you sure you want to delete # %s?', $photo['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Photo'), array('controller' => 'photos', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Posts');?></h3>
	<?php if (!empty($account['Post'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Account Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Message'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($account['Post'] as $post):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $post['id'];?></td>
			<td><?php echo $post['account_id'];?></td>
			<td><?php echo $post['created'];?></td>
			<td><?php echo $post['message'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'posts', 'action' => 'view', $post['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'posts', 'action' => 'edit', $post['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'posts', 'action' => 'delete', $post['id']), null, __('Are you sure you want to delete # %s?', $post['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Photo Comments');?></h3>
	<?php if (!empty($account['PhotoComment'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Photo Id'); ?></th>
		<th><?php echo __('Commenter Id'); ?></th>
		<th><?php echo __('Comment'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($account['PhotoComment'] as $photoComment):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $photoComment['id'];?></td>
			<td><?php echo $photoComment['photo_id'];?></td>
			<td><?php echo $photoComment['commenter_id'];?></td>
			<td><?php echo $photoComment['comment'];?></td>
			<td><?php echo $photoComment['created'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'photo_comments', 'action' => 'view', $photoComment['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'photo_comments', 'action' => 'edit', $photoComment['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'photo_comments', 'action' => 'delete', $photoComment['id']), null, __('Are you sure you want to delete # %s?', $photoComment['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Photo Comment'), array('controller' => 'photo_comments', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Post Comments');?></h3>
	<?php if (!empty($account['PostComment'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Post Id'); ?></th>
		<th><?php echo __('Commenter Id'); ?></th>
		<th><?php echo __('Comment'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($account['PostComment'] as $postComment):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $postComment['id'];?></td>
			<td><?php echo $postComment['post_id'];?></td>
			<td><?php echo $postComment['commenter_id'];?></td>
			<td><?php echo $postComment['comment'];?></td>
			<td><?php echo $postComment['created'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'post_comments', 'action' => 'view', $postComment['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'post_comments', 'action' => 'edit', $postComment['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'post_comments', 'action' => 'delete', $postComment['id']), null, __('Are you sure you want to delete # %s?', $postComment['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Post Comment'), array('controller' => 'post_comments', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Private Messages');?></h3>
	<?php if (!empty($account['SendPrivateMessage'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Sender Id'); ?></th>
		<th><?php echo __('Destination Id'); ?></th>
		<th><?php echo __('Read'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Message'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($account['SendPrivateMessage'] as $sendPrivateMessage):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $sendPrivateMessage['id'];?></td>
			<td><?php echo $sendPrivateMessage['sender_id'];?></td>
			<td><?php echo $sendPrivateMessage['destination_id'];?></td>
			<td><?php echo $sendPrivateMessage['read'];?></td>
			<td><?php echo $sendPrivateMessage['created'];?></td>
			<td><?php echo $sendPrivateMessage['message'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'private_messages', 'action' => 'view', $sendPrivateMessage['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'private_messages', 'action' => 'edit', $sendPrivateMessage['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'private_messages', 'action' => 'delete', $sendPrivateMessage['id']), null, __('Are you sure you want to delete # %s?', $sendPrivateMessage['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Send Private Message'), array('controller' => 'private_messages', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Private Messages');?></h3>
	<?php if (!empty($account['ReceivePrivateMessage'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Sender Id'); ?></th>
		<th><?php echo __('Destination Id'); ?></th>
		<th><?php echo __('Read'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Message'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($account['ReceivePrivateMessage'] as $receivePrivateMessage):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $receivePrivateMessage['id'];?></td>
			<td><?php echo $receivePrivateMessage['sender_id'];?></td>
			<td><?php echo $receivePrivateMessage['destination_id'];?></td>
			<td><?php echo $receivePrivateMessage['read'];?></td>
			<td><?php echo $receivePrivateMessage['created'];?></td>
			<td><?php echo $receivePrivateMessage['message'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'private_messages', 'action' => 'view', $receivePrivateMessage['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'private_messages', 'action' => 'edit', $receivePrivateMessage['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'private_messages', 'action' => 'delete', $receivePrivateMessage['id']), null, __('Are you sure you want to delete # %s?', $receivePrivateMessage['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Receive Private Message'), array('controller' => 'private_messages', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Friends');?></h3>
	<?php if (!empty($account['DoFriend'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Request Friend Id'); ?></th>
		<th><?php echo __('Requested Friend Id'); ?></th>
		<th><?php echo __('Accepted'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($account['DoFriend'] as $doFriend):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $doFriend['id'];?></td>
			<td><?php echo $doFriend['request_friend_id'];?></td>
			<td><?php echo $doFriend['requested_friend_id'];?></td>
			<td><?php echo $doFriend['accepted'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'friends', 'action' => 'view', $doFriend['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'friends', 'action' => 'edit', $doFriend['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'friends', 'action' => 'delete', $doFriend['id']), null, __('Are you sure you want to delete # %s?', $doFriend['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Do Friend'), array('controller' => 'friends', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Friends');?></h3>
	<?php if (!empty($account['InvitedFriend'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Request Friend Id'); ?></th>
		<th><?php echo __('Requested Friend Id'); ?></th>
		<th><?php echo __('Accepted'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($account['InvitedFriend'] as $invitedFriend):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $invitedFriend['id'];?></td>
			<td><?php echo $invitedFriend['request_friend_id'];?></td>
			<td><?php echo $invitedFriend['requested_friend_id'];?></td>
			<td><?php echo $invitedFriend['accepted'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'friends', 'action' => 'view', $invitedFriend['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'friends', 'action' => 'edit', $invitedFriend['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'friends', 'action' => 'delete', $invitedFriend['id']), null, __('Are you sure you want to delete # %s?', $invitedFriend['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Invited Friend'), array('controller' => 'friends', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
