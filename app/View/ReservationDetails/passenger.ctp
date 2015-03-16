<div class="passengers form">
<?php echo $this->Form->create('ReservationDetail',array('controller'=>'reservation_details','action'=>'reservation/passenger'));?>
	<fieldset>
		<legend><?php echo __('Passenger Detail'); ?></legend>
	<?php
		echo $this->Form->input('Passenger.name');
		echo $this->Form->input('Passenger.email');
		echo $this->Form->input('Passenger.address');
		echo $this->Form->input('Passenger.phone_no');
		echo $this->Form->input('Passenger.mobile');
	?>
	<button id="cancel" name="Cancel">Cancel</button>
	</fieldset>
<?php echo $this->Form->end(__('Continue >>')); ?>

</div>
