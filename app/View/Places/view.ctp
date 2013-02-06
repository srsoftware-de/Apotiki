<div class="places view">
<h2><?php  echo __('Place'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($place['Place']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($place['Place']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Outer Place'); ?></dt>
		<dd>
			<?php echo $this->Html->link($place['OuterPlace']['description'], array('controller' => 'places', 'action' => 'view', $place['OuterPlace']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Place'), array('action' => 'edit', $place['Place']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Place'), array('action' => 'delete', $place['Place']['id']), null, __('Are you sure you want to delete # %s?', $place['Place']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Places'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Items'), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item'), array('controller' => 'items', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Places'); ?></h3>
	<?php if (!empty($place['InnerPlace'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Place Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($place['InnerPlace'] as $innerPlace): ?>
		<tr>
			<td><?php echo $innerPlace['id']; ?></td>
			<td><?php echo $innerPlace['description']; ?></td>
			<td><?php echo $innerPlace['place_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'places', 'action' => 'view', $innerPlace['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'places', 'action' => 'edit', $innerPlace['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'places', 'action' => 'delete', $innerPlace['id']), null, __('Are you sure you want to delete # %s?', $innerPlace['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Inner Place'), array('controller' => 'places', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Items'); ?></h3>
	<?php if (!empty($place['Item'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Erased'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($place['Item'] as $item): ?>
		<tr>
			<td><?php echo $item['name']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'items', 'action' => 'view', $item['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'items', 'action' => 'edit', $item['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'items', 'action' => 'delete', $item['id']), null, __('Are you sure you want to delete # %s?', $item['id'])); ?>
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
