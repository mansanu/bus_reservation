<div class="passengers index">
	<h2><?php echo __('Passengers'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('address'); ?></th>
			<th><?php echo $this->Paginator->sort('phone_no'); ?></th>
			<th><?php echo $this->Paginator->sort('mobile'); ?></th>
			<th><?php echo $this->Paginator->sort('created_at'); ?></th>
			<th><?php echo $this->Paginator->sort('updated_at'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($passengers as $passenger): ?>
	<tr>
		<td><?php echo h($passenger['Passenger']['id']); ?>&nbsp;</td>
		<td><?php echo h($passenger['Passenger']['name']); ?>&nbsp;</td>
		<td><?php echo h($passenger['Passenger']['email']); ?>&nbsp;</td>
		<td><?php echo h($passenger['Passenger']['address']); ?>&nbsp;</td>
		<td><?php echo h($passenger['Passenger']['phone_no']); ?>&nbsp;</td>
		<td><?php echo h($passenger['Passenger']['mobile']); ?>&nbsp;</td>
		<td><?php echo h($passenger['Passenger']['created_at']); ?>&nbsp;</td>
		<td><?php echo h($passenger['Passenger']['updated_at']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $passenger['Passenger']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $passenger['Passenger']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $passenger['Passenger']['id']), null, __('Are you sure you want to delete # %s?', $passenger['Passenger']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Passenger'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Purchase Details'), array('controller' => 'purchase_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Purchase Detail'), array('controller' => 'purchase_details', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Reservation Details'), array('controller' => 'reservation_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reservation Detail'), array('controller' => 'reservation_details', 'action' => 'add')); ?> </li>
	</ul>
</div>
