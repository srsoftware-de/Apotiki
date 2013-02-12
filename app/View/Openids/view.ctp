<div class="openids view">
<h2><?php  echo __('Openid'); ?></h2>
	<dl>
		<dt><?php echo __('Identity'); ?></dt>
		<dd>
			<?php echo h($openid['Openid']['identity']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($openid['User']['name'], array('controller' => 'users', 'action' => 'view', $openid['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Openid'), array('action' => 'edit', $openid['Openid']['identity'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Openid'), array('action' => 'delete', $openid['Openid']['identity']), null, __('Are you sure you want to delete # %s?', $openid['Openid']['identity'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Openids'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Openid'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
