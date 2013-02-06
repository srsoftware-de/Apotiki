<div class="actions"><?php echo $this->Html->link('logout',array('controller'=>'users','action'=>'logout'))?></div>
<div class="itemPlaces form">
<?php echo $this->Form->create('ItemPlace'); ?>
	<fieldset>
		<legend><?php echo __('Move Item'); ?></legend>
	<?php
		echo $this->Form->input('count');
		echo $this->Form->input('item_id');
		echo $this->Form->input('place_id',array('label'=>__('Destination')));		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ItemPlace.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ItemPlace.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Item Places'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Places'), array('controller' => 'places', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place'), array('controller' => 'places', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Items'), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item'), array('controller' => 'items', 'action' => 'add')); ?> </li>
	</ul>
</div>
