<div class="builtins view">
<h2><?php  echo __('Builtin'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($builtin['Builtin']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Item'); ?></dt>
		<dd>
			<?php echo $this->Html->link($builtin['Item']['name'], array('controller' => 'items', 'action' => 'view', $builtin['Item']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Amount'); ?></dt>
		<dd>
			<?php echo h($builtin['Builtin']['amount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Included Item'); ?></dt>
		<dd>
			<?php echo $this->Html->link($builtin['IncludedItem']['name'], array('controller' => 'items', 'action' => 'view', $builtin['IncludedItem']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Builtin'), array('action' => 'edit', $builtin['Builtin']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Builtin'), array('action' => 'delete', $builtin['Builtin']['id']), null, __('Are you sure you want to delete # %s?', $builtin['Builtin']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Builtins'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Builtin'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Items'), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item'), array('controller' => 'items', 'action' => 'add')); ?> </li>
	</ul>
</div>
