<?php $this->extend('/Common/view');	
	$this->assign('exclude','viewitemplace');
?>
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
