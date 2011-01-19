<div class="accounts form">
<?php echo $this->Form->create('Account');?>
	<fieldset>
 		<legend><?php __('Edit Account'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('name');
		echo $this->Form->input('email');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Account.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Account.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Accounts'), array('action' => 'index'));?></li>
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