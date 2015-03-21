<div class="passengerTypes view">
<h2><?php echo __('Passenger Type'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($passengerType['PassengerType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($passengerType['PassengerType']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Passenger Type'), array('action' => 'edit', $passengerType['PassengerType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Passenger Type'), array('action' => 'delete', $passengerType['PassengerType']['id']), null, __('Are you sure you want to delete # %s?', $passengerType['PassengerType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Passenger Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Passenger Type'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Other Features'), array('controller' => 'other_features', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Other Feature'), array('controller' => 'other_features', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Other Features'); ?></h3>
	<?php if (!empty($passengerType['OtherFeature'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($passengerType['OtherFeature'] as $otherFeature): ?>
		<tr>
			<td><?php echo $otherFeature['id']; ?></td>
			<td><?php echo $otherFeature['name']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'other_features', 'action' => 'view', $otherFeature['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'other_features', 'action' => 'edit', $otherFeature['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'other_features', 'action' => 'delete', $otherFeature['id']), null, __('Are you sure you want to delete # %s?', $otherFeature['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Other Feature'), array('controller' => 'other_features', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
