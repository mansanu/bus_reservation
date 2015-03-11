<div class="reservationDetails index">
	<h2><?php echo __('Reservation Details'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('passenger_id'); ?></th>
			<th><?php echo $this->Paginator->sort('travel_detail_id'); ?></th>
			<th><?php echo $this->Paginator->sort('purchase_detail_id'); ?></th>
			<th><?php echo $this->Paginator->sort('reserved_date'); ?></th>
			<th><?php echo $this->Paginator->sort('seat_no'); ?></th>
			<th><?php echo $this->Paginator->sort('depature_date'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($reservationDetails as $reservationDetail): ?>
	<tr>
		<td><?php echo h($reservationDetail['ReservationDetail']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($reservationDetail['Passenger']['name'], array('controller' => 'passengers', 'action' => 'view', $reservationDetail['Passenger']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($reservationDetail['TravelDetail']['id'], array('controller' => 'travel_details', 'action' => 'view', $reservationDetail['TravelDetail']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($reservationDetail['PurchaseDetail']['id'], array('controller' => 'purchase_details', 'action' => 'view', $reservationDetail['PurchaseDetail']['id'])); ?>
		</td>
		<td><?php echo h($reservationDetail['ReservationDetail']['reserved_date']); ?>&nbsp;</td>
		<td><?php echo h($reservationDetail['ReservationDetail']['seat_no']); ?>&nbsp;</td>
		<td><?php echo h($reservationDetail['ReservationDetail']['depature_date']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $reservationDetail['ReservationDetail']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $reservationDetail['ReservationDetail']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $reservationDetail['ReservationDetail']['id']), null, __('Are you sure you want to delete # %s?', $reservationDetail['ReservationDetail']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Reservation Detail'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Passengers'), array('controller' => 'passengers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Passenger'), array('controller' => 'passengers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Travel Details'), array('controller' => 'travel_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Travel Detail'), array('controller' => 'travel_details', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Purchase Details'), array('controller' => 'purchase_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Purchase Detail'), array('controller' => 'purchase_details', 'action' => 'add')); ?> </li>
	</ul>
</div>
