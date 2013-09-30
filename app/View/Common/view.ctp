<div class="actions">
	<?php echo $this->Html->link(__('Logout'),array('controller'=>'users','action'=>'logout')); ?>
	<?php echo $this->Html->link(__('Profile'),array('controller'=>'users','action'=>'view')); ?>
</div>

<?php echo $this->fetch('content');
	$exclude=explode(',',$this->fetch('exclude'));
?>

<div class="actions">
	<h3>
		<?php echo __('Actions'); ?>
	</h3>
	<ul>
		<li><?php if (!in_array('additem', $exclude)) echo $this->Html->link(__('New Item'), array('controller' => 'items', 'action' => 'add')); ?>
		</li>
		<li><?php if (!in_array('additemplace', $exclude)) echo $this->Html->link(__('New Item Place'), array('controller' => 'item_places', 'action' => 'add')); ?>
		</li>
		<li><?php if (!in_array('place', $exclude)) echo $this->Html->link(__('New Place'), array('controller' => 'places', 'action' => 'add')); ?>
		</li>
		<li><?php if (!in_array('addproperty', $exclude)) echo $this->Html->link(__('New Property'), array('controller' => 'properties', 'action' => 'add')); ?>
		</li>
		<li><?php if (in_array('addproperty', $exclude)) echo $this->Html->link(__('New Attribute'), array('controller' => 'attributes', 'action' => 'add')); ?>
		</li>
		<li><?php if (!in_array('adduser', $exclude)) echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?>
		</li>
		</ul>
</div>
<div class="actions">
	<h3>
		<?php echo __('Lists'); ?>
	</h3>
	<ul>
		<li><?php if (!in_array('items', $exclude)) echo $this->Html->link(__('List Items'), array('controller' => 'items', 'action' => 'index')); ?>
		</li>
		<li><?php if (!in_array('events', $exclude)) echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?>
		</li>
		<li><?php if (!in_array('places', $exclude)) echo $this->Html->link(__('List Places'), array('controller' => 'places', 'action' => 'index')); ?>
		</li>
		<li><?php if (!in_array('properties', $exclude)) echo $this->Html->link(__('List Properties'), array('controller' => 'properties', 'action' => 'index')); ?>
		</li>
		<li><?php if (!in_array('users', $exclude)) echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?>
		</li>
		<li><?php if (!in_array('openids', $exclude)) echo $this->Html->link(__('List Openids'), array('controller' => 'openids', 'action' => 'index')); ?>
		</li>
		<li><?php echo $this->Html->link(__('All Labels'), array('controller' => 'items', 'action' => 'label')); ?>
		</li>
		</ul>
</div>