<div class="reservationDetails form">
<?php echo $this->Form->create('ReservationDetail'); ?>
	<fieldset>
		<legend><?php echo __('Add Reservation Detail'); ?></legend>
	<?php
		echo $this->Form->input('passenger_id');
		echo $this->Form->input('travel_detail_id');
		echo $this->Form->input('purchase_detail_id');
		echo $this->Form->input('reserved_date');
		echo $this->Form->input('seat_no');
		echo $this->Form->input('depature_date');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Reservation Details'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Passengers'), array('controller' => 'passengers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Passenger'), array('controller' => 'passengers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Travel Details'), array('controller' => 'travel_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Travel Detail'), array('controller' => 'travel_details', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Purchase Details'), array('controller' => 'purchase_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Purchase Detail'), array('controller' => 'purchase_details', 'action' => 'add')); ?> </li>
	</ul>
</div>
