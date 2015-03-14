<div class="passengers view">
<h2><?php echo __('Passenger'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($passenger['Passenger']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($passenger['Passenger']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($passenger['Passenger']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($passenger['Passenger']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone No'); ?></dt>
		<dd>
			<?php echo h($passenger['Passenger']['phone_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mobile'); ?></dt>
		<dd>
			<?php echo h($passenger['Passenger']['mobile']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created At'); ?></dt>
		<dd>
			<?php echo h($passenger['Passenger']['created_at']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated At'); ?></dt>
		<dd>
			<?php echo h($passenger['Passenger']['updated_at']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Passenger'), array('action' => 'edit', $passenger['Passenger']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Passenger'), array('action' => 'delete', $passenger['Passenger']['id']), null, __('Are you sure you want to delete # %s?', $passenger['Passenger']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Passengers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Passenger'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Purchase Details'), array('controller' => 'purchase_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Purchase Detail'), array('controller' => 'purchase_details', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Reservation Details'), array('controller' => 'reservation_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reservation Detail'), array('controller' => 'reservation_details', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Purchase Details'); ?></h3>
	<?php if (!empty($passenger['PurchaseDetail'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Passenger Id'); ?></th>
		<th><?php echo __('Purchase Amt'); ?></th>
		<th><?php echo __('Purchase Date'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($passenger['PurchaseDetail'] as $purchaseDetail): ?>
		<tr>
			<td><?php echo $purchaseDetail['id']; ?></td>
			<td><?php echo $purchaseDetail['passenger_id']; ?></td>
			<td><?php echo $purchaseDetail['purchase_amt']; ?></td>
			<td><?php echo $purchaseDetail['purchase_date']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'purchase_details', 'action' => 'view', $purchaseDetail['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'purchase_details', 'action' => 'edit', $purchaseDetail['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'purchase_details', 'action' => 'delete', $purchaseDetail['id']), null, __('Are you sure you want to delete # %s?', $purchaseDetail['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Purchase Detail'), array('controller' => 'purchase_details', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Reservation Details'); ?></h3>
	<?php if (!empty($passenger['ReservationDetail'])): ?>
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
	<?php foreach ($passenger['ReservationDetail'] as $reservationDetail): ?>
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
