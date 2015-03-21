<div class="otherFeatures view">
<h2><?php echo __('Other Feature'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($otherFeature['OtherFeature']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($otherFeature['OtherFeature']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Other Feature'), array('action' => 'edit', $otherFeature['OtherFeature']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Other Feature'), array('action' => 'delete', $otherFeature['OtherFeature']['id']), null, __('Are you sure you want to delete # %s?', $otherFeature['OtherFeature']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Other Features'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Other Feature'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Passenger Types'), array('controller' => 'passenger_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Passenger Type'), array('controller' => 'passenger_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Travel Details'), array('controller' => 'travel_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Travel Detail'), array('controller' => 'travel_details', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Passenger Types'); ?></h3>
	<?php if (!empty($otherFeature['PassengerType'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($otherFeature['PassengerType'] as $passengerType): ?>
		<tr>
			<td><?php echo $passengerType['id']; ?></td>
			<td><?php echo $passengerType['name']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'passenger_types', 'action' => 'view', $passengerType['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'passenger_types', 'action' => 'edit', $passengerType['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'passenger_types', 'action' => 'delete', $passengerType['id']), null, __('Are you sure you want to delete # %s?', $passengerType['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Passenger Type'), array('controller' => 'passenger_types', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Travel Details'); ?></h3>
	<?php if (!empty($otherFeature['TravelDetail'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Bus Id'); ?></th>
		<th><?php echo __('Route Id'); ?></th>
		<th><?php echo __('Depature Time'); ?></th>
		<th><?php echo __('Arrival Time'); ?></th>
		<th><?php echo __('Fare'); ?></th>
		<th><?php echo __('Freq Detail Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($otherFeature['TravelDetail'] as $travelDetail): ?>
		<tr>
			<td><?php echo $travelDetail['id']; ?></td>
			<td><?php echo $travelDetail['bus_id']; ?></td>
			<td><?php echo $travelDetail['route_id']; ?></td>
			<td><?php echo $travelDetail['depature_time']; ?></td>
			<td><?php echo $travelDetail['arrival_time']; ?></td>
			<td><?php echo $travelDetail['fare']; ?></td>
			<td><?php echo $travelDetail['freq_detail_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'travel_details', 'action' => 'view', $travelDetail['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'travel_details', 'action' => 'edit', $travelDetail['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'travel_details', 'action' => 'delete', $travelDetail['id']), null, __('Are you sure you want to delete # %s?', $travelDetail['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Travel Detail'), array('controller' => 'travel_details', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
