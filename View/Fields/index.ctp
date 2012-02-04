<div class="fields index">
	<h2><?php echo __('Fields');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('field_name');?></th>
			<th><?php echo $this->Paginator->sort('field_value');?></th>
			<th><?php echo $this->Paginator->sort('field_type');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($fields as $field): ?>
	<tr>
		<td><?php echo h($field['Field']['id']); ?>&nbsp;</td>
		<td><?php echo h($field['Field']['field_name']); ?>&nbsp;</td>
		<td><?php echo h($field['Field']['field_value']); ?>&nbsp;</td>
		<td><?php echo h($field['Field']['field_type']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $field['Field']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $field['Field']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $field['Field']['id']), null, __('Are you sure you want to delete # %s?', $field['Field']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Field'), array('action' => 'add')); ?></li>
	</ul>
</div>
