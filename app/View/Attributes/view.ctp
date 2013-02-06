<div class="actions"><?php echo $this->Html->link('logout',array('controller'=>'users','action'=>'logout'))?></div>
<div class="attributes view">
<h2><?php  echo __('Attribute'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($attribute['Attribute']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($attribute['Attribute']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Attribute'), array('action' => 'edit', $attribute['Attribute']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Attribute'), array('action' => 'delete', $attribute['Attribute']['id']), null, __('Are you sure you want to delete # %s?', $attribute['Attribute']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Attributes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Attribute'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Properties'), array('controller' => 'properties', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Property'), array('controller' => 'properties', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Properties'); ?></h3>
	<?php if (!empty($attribute['Property'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Attribute Id'); ?></th>
		<th><?php echo __('Value'); ?></th>
		<th><?php echo __('Item Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($attribute['Property'] as $property): ?>
		<tr>
			<td><?php echo $property['id']; ?></td>
			<td><?php echo $property['attribute_id']; ?></td>
			<td><?php echo $property['value']; ?></td>
			<td><?php echo $property['item_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'properties', 'action' => 'view', $property['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'properties', 'action' => 'edit', $property['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'properties', 'action' => 'delete', $property['id']), null, __('Are you sure you want to delete # %s?', $property['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Item'), array('controller' => 'items', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
