<div class="log_entries index">
	<h3><?php echo ucfirst($log['Log']['name']) . " Log";?></h3>
	<?php if (!empty($log['LogEntry'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Log Id'); ?></th>
		<th><?php echo __('Level'); ?></th>
		<th><?php echo __('Source'); ?></th>
		<th><?php echo __('Message'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($log['LogEntry'] as $logEntry): ?>
		<tr>
			<td><?php echo $logEntry['id'];?></td>
			<td><?php echo $logEntry['log_id'];?></td>
			<td><?php echo $logEntry['level'];?></td>
			<td><?php echo $logEntry['source'];?></td>
			<td><?php echo $logEntry['message'];?></td>
			<td><?php echo $logEntry['created'];?></td>
			<td><?php echo $logEntry['modified'];?></td>
			<td class="actions">
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'log_entries', 'action' => 'delete', $logEntry['id']), null, __('Are you sure you want to delete # %s?', $logEntry['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Log'), array('action' => 'edit', $log['Log']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Log'), array('action' => 'delete', $log['Log']['id']), null, __('Are you sure you want to delete # %s?', $log['Log']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Logs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Log'), array('action' => 'add')); ?> </li>
	</ul>
</div>
