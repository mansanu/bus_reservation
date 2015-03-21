<div class="otherFeaturesPassengerTypes index">
	<h2><?php echo __('Other Features Passenger Types'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('other_feature_id'); ?></th>
			<th><?php echo $this->Paginator->sort('passenger_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('fare'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($otherFeaturesPassengerTypes as $otherFeaturesPassengerType): ?>
	<tr>
		<td><?php echo h($otherFeaturesPassengerType['OtherFeaturesPassengerType']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($otherFeaturesPassengerType['OtherFeature']['name'], array('controller' => 'other_features', 'action' => 'view', $otherFeaturesPassengerType['OtherFeature']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($otherFeaturesPassengerType['PassengerType']['name'], array('controller' => 'passenger_types', 'action' => 'view', $otherFeaturesPassengerType['PassengerType']['id'])); ?>
		</td>
		<td><?php echo h($otherFeaturesPassengerType['OtherFeaturesPassengerType']['fare']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $otherFeaturesPassengerType['OtherFeaturesPassengerType']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $otherFeaturesPassengerType['OtherFeaturesPassengerType']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $otherFeaturesPassengerType['OtherFeaturesPassengerType']['id']), null, __('Are you sure you want to delete # %s?', $otherFeaturesPassengerType['OtherFeaturesPassengerType']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Other Features Passenger Type'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Other Features'), array('controller' => 'other_features', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Other Feature'), array('controller' => 'other_features', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Passenger Types'), array('controller' => 'passenger_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Passenger Type'), array('controller' => 'passenger_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
