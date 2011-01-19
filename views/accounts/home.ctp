<h2>Hi, Welcome to Demo Application.</h2>

<ul>
	<li><?php echo $this->Html->link('Show accounts', array('controller' => 'accounts', 'action' => 'all')); ?></li>
</ul>

<br><br><br>

<?php echo $this->element('login'); ?>
