<?php $this->extend('/Common/view');	
	$this->assign('exclude','events');
?>
<div class="events index">
	<h2>
		<?php echo __('Events'); ?>
	</h2>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('item_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php
	foreach ($events as $event): ?>
		<tr>
			<td><?php echo h($event['Event']['id']); ?>&nbsp;</td>
			<td><?php echo $this->Html->link($event['User']['name'], array('controller' => 'users', 'action' => 'view', $event['User']['id'])); ?>
			</td>
			<td><?php echo h($event['Event']['description']); ?>&nbsp;</td>
			<td><?php echo $this->Html->link($event['Item']['name'], array('controller' => 'items', 'action' => 'view', $event['Item']['id'])); ?>
			</td>
			<td><?php echo h($event['Event']['created']); ?>&nbsp;</td>
			<td class="actions"><?php echo $this->Html->link(__('View'), array('action' => 'view', $event['Event']['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $event['Event']['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $event['Event']['id']), null, __('Are you sure you want to delete # %s?', $event['Event']['id'])); ?>
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