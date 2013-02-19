<?php $this->extend('/Common/view');	
	$this->assign('exclude','viewproperty');
?>
<div class="properties view">
<h2><?php  echo __('Property'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($property['Property']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Attribute'); ?></dt>
		<dd>
			<?php echo $this->Html->link($property['Attribute']['name'], array('controller' => 'attributes', 'action' => 'view', $property['Attribute']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Value'); ?></dt>
		<dd>
			<?php echo h($property['Property']['value']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Item'); ?></dt>
		<dd>
			<?php echo $this->Html->link($property['Item']['name'], array('controller' => 'items', 'action' => 'view', $property['Item']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
