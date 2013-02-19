<?php $this->extend('/Common/view');	
	$this->assign('exclude','items');
?>
<div class="items index">
	<h2>
		<?php echo __('Items'); ?>
	</h2>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('erased'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php
	foreach ($items as $item): ?>
		<tr>
			<td><?php echo h($item['Item']['id']); ?>&nbsp;</td>
			<td><?php echo $this->Html->link($item['Item']['name'],array('action'=>'view',$item['Item']['id'])); ?>&nbsp;</td>
			<td><?php echo h($item['Item']['erased']); ?>&nbsp;</td>
			<td class="actions">
				<?php echo $this->Html->link(__('Label'), array('action' => 'label', $item['Item']['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $item['Item']['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $item['Item']['id']), null, __('Are you sure you want to delete # %s?', $item['Item']['id'])); ?>
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