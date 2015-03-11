<div class="reservationDetails view">
<h2><?php echo __('Reservation Detail'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($reservationDetail['ReservationDetail']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Passenger'); ?></dt>
		<dd>
			<?php echo $this->Html->link($reservationDetail['Passenger']['name'], array('controller' => 'passengers', 'action' => 'view', $reservationDetail['Passenger']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Travel Detail'); ?></dt>
		<dd>
			<?php echo $this->Html->link($reservationDetail['TravelDetail']['id'], array('controller' => 'travel_details', 'action' => 'view', $reservationDetail['TravelDetail']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Purchase Detail'); ?></dt>
		<dd>
			<?php echo $this->Html->link($reservationDetail['PurchaseDetail']['id'], array('controller' => 'purchase_details', 'action' => 'view', $reservationDetail['PurchaseDetail']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reserved Date'); ?></dt>
		<dd>
			<?php echo h($reservationDetail['ReservationDetail']['reserved_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Seat No.'); ?></dt>
		<dd>
			<?php echo h($reservationDetail['ReservationDetail']['seat_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Depature Date'); ?></dt>
		<dd>
			<?php echo h($reservationDetail['ReservationDetail']['depature_date']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Reservation Detail'), array('action' => 'edit', $reservationDetail['ReservationDetail']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Reservation Detail'), array('action' => 'delete', $reservationDetail['ReservationDetail']['id']), null, __('Are you sure you want to delete # %s?', $reservationDetail['ReservationDetail']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Reservation Details'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reservation Detail'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Passengers'), array('controller' => 'passengers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Passenger'), array('controller' => 'passengers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Travel Details'), array('controller' => 'travel_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Travel Detail'), array('controller' => 'travel_details', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Purchase Details'), array('controller' => 'purchase_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Purchase Detail'), array('controller' => 'purchase_details', 'action' => 'add')); ?> </li>
	</ul>
</div>
