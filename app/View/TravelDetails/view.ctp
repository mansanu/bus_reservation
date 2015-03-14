<div class="travelDetails view">
<h2><?php echo __('Travel Detail'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($travelDetail['TravelDetail']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bus'); ?></dt>
		<dd>
			<?php echo $this->Html->link($travelDetail['Bus']['id'], array('controller' => 'buses', 'action' => 'view', $travelDetail['Bus']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Route'); ?></dt>
		<dd>
			<?php echo $this->Html->link($travelDetail['Route']['id'], array('controller' => 'routes', 'action' => 'view', $travelDetail['Route']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Depature Time'); ?></dt>
		<dd>
			<?php echo h($travelDetail['TravelDetail']['depature_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Arrival Time'); ?></dt>
		<dd>
			<?php echo h($travelDetail['TravelDetail']['arrival_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fare'); ?></dt>
		<dd>
			<?php echo h($travelDetail['TravelDetail']['fare']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Freq Detail'); ?></dt>
		<dd>
			<?php echo $this->Html->link($travelDetail['FreqDetail']['id'], array('controller' => 'freq_details', 'action' => 'view', $travelDetail['FreqDetail']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Travel Detail'), array('action' => 'edit', $travelDetail['TravelDetail']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Travel Detail'), array('action' => 'delete', $travelDetail['TravelDetail']['id']), null, __('Are you sure you want to delete # %s?', $travelDetail['TravelDetail']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Travel Details'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Travel Detail'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Buses'), array('controller' => 'buses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bus'), array('controller' => 'buses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Routes'), array('controller' => 'routes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Route'), array('controller' => 'routes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Freq Details'), array('controller' => 'freq_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Freq Detail'), array('controller' => 'freq_details', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Reservation Details'), array('controller' => 'reservation_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reservation Detail'), array('controller' => 'reservation_details', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Reservation Details'); ?></h3>
	<?php if (!empty($travelDetail['ReservationDetail'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Passenger Id'); ?></th>
		<th><?php echo __('Travel Detail Id'); ?></th>
		<th><?php echo __('Purchase Detail Id'); ?></th>
		<th><?php echo __('Reserved Date'); ?></th>
		<th><?php echo __('Seat no.'); ?></th>
		<th><?php echo __('Depature Date'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($travelDetail['ReservationDetail'] as $reservationDetail): ?>
		<tr>
			<td><?php echo $reservationDetail['id']; ?></td>
			<td><?php echo $reservationDetail['passenger_id']; ?></td>
			<td><?php echo $reservationDetail['travel_detail_id']; ?></td>
			<td><?php echo $reservationDetail['purchase_detail_id']; ?></td>
			<td><?php echo $reservationDetail['reserved_date']; ?></td>
			<td><?php echo $reservationDetail['seat_no']; ?></td>
			<td><?php echo $reservationDetail['depature_date']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'reservation_details', 'action' => 'view', $reservationDetail['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'reservation_details', 'action' => 'edit', $reservationDetail['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'reservation_details', 'action' => 'delete', $reservationDetail['id']), null, __('Are you sure you want to delete # %s?', $reservationDetail['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Reservation Detail'), array('controller' => 'reservation_details', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
