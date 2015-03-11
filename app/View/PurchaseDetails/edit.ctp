<div class="purchaseDetails form">
<?php echo $this->Form->create('PurchaseDetail'); ?>
	<fieldset>
		<legend><?php echo __('Edit Purchase Detail'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('passenger_id');
		echo $this->Form->input('purchase_amt');
		echo $this->Form->input('purchase_date');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('PurchaseDetail.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('PurchaseDetail.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Purchase Details'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Passengers'), array('controller' => 'passengers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Passenger'), array('controller' => 'passengers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Reservation Details'), array('controller' => 'reservation_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reservation Detail'), array('controller' => 'reservation_details', 'action' => 'add')); ?> </li>
	</ul>
</div>
