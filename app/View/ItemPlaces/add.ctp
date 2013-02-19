<?php $this->extend('/Common/view');	
	$this->assign('exclude','additemplace');
?>
<div class="itemPlaces form">
<?php echo $this->Form->create('ItemPlace'); ?>
	<fieldset>
		<legend><?php echo __('Add Item Place'); ?></legend>
	<?php
		echo $this->Form->input('item_id',array('label'=>'Item'));
		echo $this->Form->input('place_id',array('label'=>'Place'));
		echo $this->Form->input('count',array('label'=>'Anzahl','value'=>'1'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>