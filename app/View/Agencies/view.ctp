<div class="agencies view">
<h2><?php echo __('Agency'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($agency['Agency']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($agency['Agency']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($agency['Agency']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone No'); ?></dt>
		<dd>
			<?php echo h($agency['Agency']['phone_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mobile'); ?></dt>
		<dd>
			<?php echo h($agency['Agency']['mobile']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($agency['Agency']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($agency['Agency']['description']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Agency'), array('action' => 'edit', $agency['Agency']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Agency'), array('action' => 'delete', $agency['Agency']['id']), null, __('Are you sure you want to delete # %s?', $agency['Agency']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Agencies'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Agency'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Buses'), array('controller' => 'buses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bus'), array('controller' => 'buses', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Buses'); ?></h3>
	<?php if (!empty($agency['Bus'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Bus Reg No'); ?></th>
		<th><?php echo __('Bus Max Seat'); ?></th>
		<th><?php echo __('Bus Type Id'); ?></th>
		<th><?php echo __('Agency Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($agency['Bus'] as $bus): ?>
		<tr>
			<td><?php echo $bus['id']; ?></td>
			<td><?php echo $bus['bus_reg_no']; ?></td>
			<td><?php echo $bus['bus_max_seat']; ?></td>
			<td><?php echo $bus['bus_type_id']; ?></td>
			<td><?php echo $bus['agency_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'buses', 'action' => 'view', $bus['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'buses', 'action' => 'edit', $bus['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'buses', 'action' => 'delete', $bus['id']), null, __('Are you sure you want to delete # %s?', $bus['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Bus'), array('controller' => 'buses', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
