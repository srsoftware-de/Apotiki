<?php $this->extend('/Common/view');	
	$this->assign('exclude','viewbuiltin');
?>
<div class="builtins view">
<h2><?php  echo __('Builtin'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($builtin['Builtin']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Item'); ?></dt>
		<dd>
			<?php echo $this->Html->link($builtin['Item']['name'], array('controller' => 'items', 'action' => 'view', $builtin['Item']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Amount'); ?></dt>
		<dd>
			<?php echo h($builtin['Builtin']['amount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Included Item'); ?></dt>
		<dd>
			<?php echo $this->Html->link($builtin['IncludedItem']['name'], array('controller' => 'items', 'action' => 'view', $builtin['IncludedItem']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
