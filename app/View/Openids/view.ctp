<?php $this->extend('/Common/view');	
	$this->assign('exclude','viewopenid');
?>
<div class="openids view">
<h2><?php  echo __('Openid'); ?></h2>
	<dl>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($openid['User']['name'], array('controller' => 'users', 'action' => 'view', $openid['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Identity'); ?></dt>
		<dd>
			<?php echo h($openid['Openid']['identity']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
