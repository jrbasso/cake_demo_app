<h2><?php __('Hi, Welcome to Demo Application.'); ?></h2>

<ul>
	<li><?php echo $this->Html->link(__('Show accounts'), array('controller' => 'accounts', 'action' => 'all')); ?></li>
</ul>

<br><br><br>

<?php echo $this->element('login'); ?>
