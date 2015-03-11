<div class="purchaseDetails index">
	<h2><?php echo __('Purchase Details'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('passenger_id'); ?></th>
			<th><?php echo $this->Paginator->sort('purchase_amt'); ?></th>
			<th><?php echo $this->Paginator->sort('purchase_date'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($purchaseDetails as $purchaseDetail): ?>
	<tr>
		<td><?php echo h($purchaseDetail['PurchaseDetail']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($purchaseDetail['Passenger']['name'], array('controller' => 'passengers', 'action' => 'view', $purchaseDetail['Passenger']['id'])); ?>
		</td>
		<td><?php echo h($purchaseDetail['PurchaseDetail']['purchase_amt']); ?>&nbsp;</td>
		<td><?php echo h($purchaseDetail['PurchaseDetail']['purchase_date']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $purchaseDetail['PurchaseDetail']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $purchaseDetail['PurchaseDetail']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $purchaseDetail['PurchaseDetail']['id']), null, __('Are you sure you want to delete # %s?', $purchaseDetail['PurchaseDetail']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Purchase Detail'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Passengers'), array('controller' => 'passengers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Passenger'), array('controller' => 'passengers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Reservation Details'), array('controller' => 'reservation_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reservation Detail'), array('controller' => 'reservation_details', 'action' => 'add')); ?> </li>
	</ul>
</div>
