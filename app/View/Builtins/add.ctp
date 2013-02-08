<div class="builtins form">
	<?php echo $this->Form->create('Builtin'); ?>
	<fieldset>
		<legend>
			<?php echo __('Add Builtin'); ?>
		</legend>
		<?php
		echo $this->Form->input('included_item_id');
		echo $this->Form->input('amount');
		echo $this->Form->input('item_id',array('label'=>__('included in')));
		?>
	</fieldset>
	<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3>
		<?php echo __('Actions'); ?>
	</h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Builtins'), array('action' => 'index')); ?>
		</li>
		<li><?php echo $this->Html->link(__('List Items'), array('controller' => 'items', 'action' => 'index')); ?>
		</li>
		<li><?php echo $this->Html->link(__('New Item'), array('controller' => 'items', 'action' => 'add')); ?>
		</li>
	</ul>
</div>
