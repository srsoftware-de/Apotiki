<?php $this->extend('/Common/view');	
	$this->assign('exclude','viewuser');
?>
<div class="actions"><?php echo $this->Html->link(__('Logout'),array('controller'=>'users','action'=>'logout'))?></div><div class="users view">
<h2><?php  echo __('User').": ".$user['User']['name']; ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Supervisor'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['Supervisor']['name'], array('controller' => 'users', 'action' => 'view', $user['Supervisor']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
<div class="related">
	<h3><?php echo __('Openids'); ?></h3>
	<?php if (!empty($user['Openid'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Identity'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Openid'] as $openid): ?>
		<tr>
			<td><?php echo $openid['identity']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'openids', 'action' => 'edit', $openid['identity'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'openids', 'action' => 'delete', $openid['identity']), null, __('Are you sure you want to delete # %s?', $openid['identity'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Openid'), array('controller' => 'openids', 'action' => 'add',$user['User']['id'])); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Events'); ?></h3>
	<?php if (!empty($user['Event'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Item Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Event'] as $event): ?>
		<tr>
			<td><?php echo $event['id']; ?></td>
			<td><?php echo $event['description']; ?></td>
			<td><?php echo $this->Html->link($event['Item']['name'],array('controller'=>'items','action'=>'view',$event['Item']['id'])); ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'events', 'action' => 'view', $event['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'events', 'action' => 'edit', $event['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'events', 'action' => 'delete', $event['id']), null, __('Are you sure you want to delete # %s?', $event['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
</div>
