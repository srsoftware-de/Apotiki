<div class="actions">
	<?php echo $this->Html->link(__('Logout'),array('controller'=>'users','action'=>'logout'))?>
</div>
<div class="properties index">
	<h2>
		<?php echo __('Properties'); ?>
	</h2>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('attribute_id'); ?></th>
			<th><?php echo $this->Paginator->sort('value'); ?></th>
			<th><?php echo $this->Paginator->sort('item_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php
	foreach ($properties as $property): ?>
		<tr>
			<td><?php echo h($property['Property']['id']); ?>&nbsp;</td>
			<td><?php echo $this->Html->link($property['Attribute']['name'], array('controller' => 'attributes', 'action' => 'view', $property['Attribute']['id'])); ?>
			</td>
			<td><?php echo h($property['Property']['value']); ?>&nbsp;</td>
			<td><?php echo $this->Html->link($property['Item']['name'], array('controller' => 'items', 'action' => 'view', $property['Item']['id'])); ?>
			</td>
			<td class="actions"><?php echo $this->Html->link(__('View'), array('action' => 'view', $property['Property']['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $property['Property']['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $property['Property']['id']), null, __('Are you sure you want to delete # %s?', $property['Property']['id'])); ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<p>
		<?php
		echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>
	</p>

	<div class="paging">
		<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
		?>
	</div>
</div>
<div class="actions">
	<h3>
		<?php echo __('Actions'); ?>
	</h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Item'), array('action' => 'add')); ?>
		</li>
		<li><?php echo $this->Html->link(__('New Item Place'), array('controller' => 'item_places', 'action' => 'add')); ?>
		</li>
		<li><?php echo $this->Html->link(__('New Attribute'), array('controller' => 'attributes', 'action' => 'add')); ?>
		</li>
		<li><?php echo $this->Html->link(__('New Property'), array('controller' => 'properties', 'action' => 'add')); ?>
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
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?>
		</li>
	</ul>
</div>
