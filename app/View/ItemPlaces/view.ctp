<div class="actions"><?php echo $this->Html->link('logout',array('controller'=>'users','action'=>'logout'))?></div>
<div class="itemPlaces view">
<h2><?php  echo __('Item Place'); ?></h2>
	<dl>
		<dt><?php echo __('Count'); ?></dt>
                <dd>
                        <?php echo h($itemPlace['ItemPlace']['count']); ?>
                        &nbsp;
                </dd>
		<dt><?php echo __('Item'); ?></dt>
                <dd>
                        <?php echo $this->Html->link($itemPlace['Item']['name'], array('controller' => 'items', 'action' => 'view', $itemPlace['Item']['id'])); ?>
                        &nbsp;
                </dd>

		<dt><?php echo __('Place'); ?></dt>
		<dd>
			<?php echo $this->Html->link($itemPlace['Place']['description'], array('controller' => 'places', 'action' => 'view', $itemPlace['Place']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Item Place'), array('action' => 'edit', $itemPlace['ItemPlace']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Item Place'), array('action' => 'delete', $itemPlace['ItemPlace']['id']), null, __('Are you sure you want to delete # %s?', $itemPlace['ItemPlace']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Item Places'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item Place'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Places'), array('controller' => 'places', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place'), array('controller' => 'places', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Items'), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item'), array('controller' => 'items', 'action' => 'add')); ?> </li>
	</ul>
</div>
