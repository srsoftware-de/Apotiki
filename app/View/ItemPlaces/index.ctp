<?php $this->extend('/Common/view');	
	$this->assign('exclude','itemplaces');
?>
<div class="itemPlaces index">
	<h2>
		<?php echo __('Item Places'); ?>
	</h2>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('item_id',__('Item')); ?></th>
			<th><?php echo $this->Paginator->sort('place_id',__('Location')); ?>
			</th>
			<th><?php echo $this->Paginator->sort('count',__('Count')); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php
	foreach ($itemPlaces as $itemPlace): ?>
		<tr>
			<td><?php echo h($itemPlace['ItemPlace']['id']); ?>&nbsp;</td>
			<td><?php echo $this->Html->link($itemPlace['Item']['name'], array('controller' => 'items', 'action' => 'view', $itemPlace['Item']['id'])); ?>
			</td>
			<td><?php echo $this->Html->link($itemPlace['Place']['description'], array('controller' => 'places', 'action' => 'view', $itemPlace['Place']['id'])); ?>
			</td>
			<td><?php echo h($itemPlace['ItemPlace']['count']); ?>&nbsp;</td>
			<td class="actions"><?php echo $this->Html->link(__('View'), array('action' => 'view', $itemPlace['ItemPlace']['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $itemPlace['ItemPlace']['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $itemPlace['ItemPlace']['id']), null, __('Are you sure you want to delete # %s?', $itemPlace['ItemPlace']['id'])); ?>
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