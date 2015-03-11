<div class="purchaseDetails view">
<h2><?php echo __('Purchase Detail'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($purchaseDetail['PurchaseDetail']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Passenger'); ?></dt>
		<dd>
			<?php echo $this->Html->link($purchaseDetail['Passenger']['name'], array('controller' => 'passengers', 'action' => 'view', $purchaseDetail['Passenger']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Purchase Amt'); ?></dt>
		<dd>
			<?php echo h($purchaseDetail['PurchaseDetail']['purchase_amt']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Purchase Date'); ?></dt>
		<dd>
			<?php echo h($purchaseDetail['PurchaseDetail']['purchase_date']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Purchase Detail'), array('action' => 'edit', $purchaseDetail['PurchaseDetail']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Purchase Detail'), array('action' => 'delete', $purchaseDetail['PurchaseDetail']['id']), null, __('Are you sure you want to delete # %s?', $purchaseDetail['PurchaseDetail']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Purchase Details'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Purchase Detail'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Passengers'), array('controller' => 'passengers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Passenger'), array('controller' => 'passengers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Reservation Details'), array('controller' => 'reservation_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reservation Detail'), array('controller' => 'reservation_details', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Reservation Details'); ?></h3>
	<?php if (!empty($purchaseDetail['ReservationDetail'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Passenger Id'); ?></th>
		<th><?php echo __('Travel Detail Id'); ?></th>
		<th><?php echo __('Purchase Detail Id'); ?></th>
		<th><?php echo __('Reserved Date'); ?></th>
		<th><?php echo __('No Seat'); ?></th>
		<th><?php echo __('Depature Date'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($purchaseDetail['ReservationDetail'] as $reservationDetail): ?>
		<tr>
			<td><?php echo $reservationDetail['id']; ?></td>
			<td><?php echo $reservationDetail['passenger_id']; ?></td>
			<td><?php echo $reservationDetail['travel_detail_id']; ?></td>
			<td><?php echo $reservationDetail['purchase_detail_id']; ?></td>
			<td><?php echo $reservationDetail['reserved_date']; ?></td>
			<td><?php echo $reservationDetail['no_seat']; ?></td>
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
