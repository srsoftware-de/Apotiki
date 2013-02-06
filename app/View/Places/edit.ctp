<div class="places form">
<?php echo $this->Form->create('Place'); ?>
	<fieldset>
		<legend><?php echo __('Edit Place'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('description');
		echo $this->Form->input('place_id');
		echo $this->Form->input('Item');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Place.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Place.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Places'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Items'), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item'), array('controller' => 'items', 'action' => 'add')); ?> </li>
				<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?>
		</li>
		
	</ul>
</div>
