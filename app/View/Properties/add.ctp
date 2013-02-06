<div class="actions"><?php echo $this->Html->link(__('Logout'),array('controller'=>'users','action'=>'logout'))?></div>
<div class="properties form">
	<?php echo $this->Form->create('Property'); ?>
	<fieldset>
		<legend>
			<?php echo __('Add Property'); ?>
		</legend>
		<?php
		echo $this->Form->input('item_id');
		echo $this->Form->input('attribute_id');
		echo $this->Form->label(__('Value'));
		echo $this->Form->text('value');
		?>
	</fieldset>
	<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3>
		<?php echo __('Actions'); ?>
	</h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Item'), array('controller' => 'items','action' => 'add')); ?>
		</li>
		<li><?php echo $this->Html->link(__('New Item Place'), array('controller' => 'item_places', 'action' => 'add')); ?>
		</li>
		<li><?php echo $this->Html->link(__('New Attribute'), array('controller' => 'attributes', 'action' => 'add')); ?>
		</li>
	</ul>
</div>
<div class="actions">
	<h3>
		<?php echo __('Lists'); ?>
	</h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Items'), array('controller' => 'items', 'action' => 'index')); ?>
		</li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'item_events', 'action' => 'index')); ?>
		</li>
		<li><?php echo $this->Html->link(__('List Places'), array('controller' => 'places', 'action' => 'index')); ?>
		</li>
		<li><?php echo $this->Html->link(__('List Properties'), array('controller' => 'properties', 'action' => 'index')); ?>
		</li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?>
		</li>
	</ul>
</div>
