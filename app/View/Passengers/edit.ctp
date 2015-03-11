<div class="passengers form">
<?php echo $this->Form->create('Passenger'); ?>
	<fieldset>
		<legend><?php echo __('Edit Passenger'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('email');
		echo $this->Form->input('address');
		echo $this->Form->input('phone_no');
		echo $this->Form->input('mobile');
		echo $this->Form->input('created_at');
		echo $this->Form->input('updated_at');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Passenger.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Passenger.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Passengers'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Purchase Details'), array('controller' => 'purchase_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Purchase Detail'), array('controller' => 'purchase_details', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Reservation Details'), array('controller' => 'reservation_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reservation Detail'), array('controller' => 'reservation_details', 'action' => 'add')); ?> </li>
	</ul>
</div>
