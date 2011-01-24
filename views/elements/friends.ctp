<div id="friends">
<ul>
<?php foreach ($friends as $friend): ?>
	<li><?php echo $this->Html->link($friend['Account']['name'], array('controller' => 'accounts', 'action' => 'view', $friend['Account']['username'])); ?></li>
<?php endforeach; ?>
</ul>
</div>
