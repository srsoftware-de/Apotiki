<?php $this->extend('/Common/view');	
	$this->assign('exclude','viewitem');
?>
<div class="items view">
	<h2>
		<?php  echo __('Item'); ?>
	</h2>
	<dl>
		<dt>
			<?php echo __('Id'); ?>
		</dt>
		<dd>
			<?php echo h($item['Item']['id']); ?>
			&nbsp;
		</dd>
		<dt>
			<?php echo __('Name'); ?>
		</dt>
		<dd>
			<?php echo h($item['Item']['name']); ?>
			&nbsp;
		</dd>
		<dt>
			<?php echo __('Erased'); ?>
		</dt>
		<dd>
			<?php
			if ($item['Item']['erased']){
					echo __('yes');
					} else echo __('no'); ?>
			&nbsp;
		</dd>
	</dl>
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Create Label'), array('action' => 'label',$item['Item']['id'])); ?>
			</li>
		</ul>
	</div>
	<div class="related">
		<h3>
			<?php echo __('Related Properties'); ?>
		</h3>
		<?php if (!empty($item['Property'])): ?>
		<table cellpadding="0" cellspacing="0">
			<tr>
				<th><?php echo __('Attribute'); ?></th>
				<th><?php echo __('Value'); ?></th>
				<th class="actions"><?php echo __('Actions'); ?></th>
			</tr>
			<?php
			$i = 0;
		foreach ($item['Property'] as $property): ?>

			<tr>
				<td><?php echo $property['Attribute']['name']; ?></td>
				<td><?php echo $property['value']; ?></td>
				<td class="actions"><?php echo $this->Html->link(__('View'), array('controller' => 'properties', 'action' => 'view', $property['id'])); ?>
					<?php echo $this->Html->link(__('Edit'), array('controller' => 'properties', 'action' => 'edit', $property['id'])); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'properties', 'action' => 'delete', $property['id']), null, __('Are you sure you want to delete "%s"?', $property['Attribute']['name'])); ?>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
		<?php endif; ?>

		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('New Property'), array('controller' => 'properties', 'action' => 'add',$item['Item']['id'])); ?>
				</li>
			</ul>
		</div>
	</div>
	<div class="related">
		<h3>
			<?php echo __('Related Files'); ?>
		</h3>
		<?php if (!empty($item['Upload'])): ?>
		<table cellpadding="0" cellspacing="0">
			<tr>
				<th><?php echo __('File Name'); ?></th>
				<th><?php echo __('Type'); ?></th>
				<th class="actions"><?php echo __('Actions'); ?></th>
			</tr>
			<?php
			$i = 0;
		foreach ($item['Upload'] as $upload): ?>

			<tr>
				<td><?php echo $this->Html->link($upload['name'],array('controller'=>'uploads','action'=>'download',$upload['id'])); ?>
				</td>
				<td><?php echo $upload['type']; ?></td>
				<td class="actions"><?php echo $this->Html->link(__('View'), array('controller' => 'uploads', 'action' => 'view', $upload['id'])); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'uploads', 'action' => 'delete', $upload['id']), null, __('Are you sure you want to delete "%s"?', $upload['name'])); ?>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
		<?php endif; ?>

		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Add File'), array('controller' => 'uploads', 'action' => 'add',$item['Item']['id'])); ?>
				</li>
			</ul>
		</div>
	</div>
	<div class="related">
		<h3>
			<?php echo __('Related Item Places'); ?>
		</h3>
		<?php if (!empty($item['ItemPlace'])): ?>
		<table cellpadding="0" cellspacing="0">
			<tr>
				<th><?php echo __('Place '); ?></th>
				<th><?php echo __('Count'); ?></th>
				<th class="actions"><?php echo __('Actions'); ?></th>
			</tr>
			<?php
			$i = 0;
		foreach ($item['ItemPlace'] as $itemPlace): 
			if ($itemPlace['count']<1) continue; ?>
			<tr>
				<td><?php echo $this->Html->link($itemPlace['Place']['description'],array('controller'=>'places','action'=>'view',$itemPlace['Place']['id'])); ?>
				</td>
				<td><?php echo $itemPlace['count']; ?></td>
				<td class="actions"><?php echo $this->Html->link(__('Move'), array('controller' => 'item_places', 'action' => 'move', $itemPlace['id'])); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'item_places', 'action' => 'delete', $itemPlace['id']), null, __('Are you sure you want to delete # %s?', $itemPlace['id'])); ?>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
		<?php endif; ?>

		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('New Item Place'), array('controller' => 'item_places', 'action' => 'add')); ?>
				</li>
			</ul>
		</div>
	</div>
	<div class="related">
		<h3>
			<?php echo __('Related Events'); ?>
		</h3>
		<?php if (!empty($item['Event'])): ?>
		<table cellpadding="0" cellspacing="0">
			<tr>
				<th><?php echo __('Id'); ?></th>
				<th><?php echo __('Description'); ?></th>
				<th><?php echo __('User'); ?></th>
			</tr>
			<?php
			$i = 0;
		foreach ($item['Event'] as $event): ?>
			<tr>
				<td><?php echo $event['id']; ?></td>
				<td><?php echo $event['description']; ?></td>
				<td><?php echo $this->Html->link($event['User']['name'],array('controller'=>'users','action'=>'view',$event['User']['id'])); ?>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
		<?php endif; ?>

		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?>
				</li>
			</ul>
		</div>
	</div>
</div>
