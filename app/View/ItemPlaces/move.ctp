<?php $this->extend('/Common/view');	
	$this->assign('exclude','move');
?>
<div class="itemPlaces form">
<?php echo $this->Form->create('ItemPlace'); ?>
	<fieldset>
		<legend><?php echo __('Move Item'); ?></legend>
	<?php
		echo $this->Form->input('count');
		echo $this->Form->input('item_id');
		echo $this->Form->input('place_id',array('label'=>__('Destination')));		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>