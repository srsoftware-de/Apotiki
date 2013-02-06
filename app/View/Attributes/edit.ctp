<div class="actions"><?php echo $this->Html->link('logout',array('controller'=>'users','action'=>'logout'))?></div>
<div class="attributes form">
<?php echo $this->Form->create('Attribute'); ?>
	<fieldset>
		<legend><?php echo __('Edit Attribute'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Attribute.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Attribute.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Attributes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Items'), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item'), array('controller' => 'items', 'action' => 'add')); ?> </li>
				<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?>
		</li>
		
	</ul>
</div>
