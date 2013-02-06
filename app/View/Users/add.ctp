<div class="actions"><?php echo $this->Html->link('logout',array('controller'=>'users','action'=>'logout'))?></div>
<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Add User'); ?></legend>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->text('name');
		echo $this->Form->input('password');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Item Events'), array('controller' => 'item_events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item Event'), array('controller' => 'item_events', 'action' => 'add')); ?> </li>
				<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?>
		</li>
		
	</ul>
</div>
