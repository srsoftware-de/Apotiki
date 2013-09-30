<?php $this->extend('/Common/view');	
	$this->assign('exclude','openids');
?>
<div class="openids index">
	<h2><?php echo __('Openids'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('identity'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($openids as $openid): ?>
	<tr>
		<td><?php echo h($openid['Openid']['identity']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($openid['User']['name'], array('controller' => 'users', 'action' => 'view', $openid['User']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', str_replace("://", "_", $openid['Openid']['identity']))); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', str_replace("://", "_", $openid['Openid']['identity']))); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', str_replace("://", "_", $openid['Openid']['identity'])), null, __('Are you sure you want to delete %s?', $openid['Openid']['identity'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>