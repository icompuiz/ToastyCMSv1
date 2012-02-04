<div class="mediaFiles index">
	<h2><?php echo __('Media Files');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('path');?></th>
			<th><?php echo $this->Paginator->sort('fileType');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($mediaFiles as $mediaFile): ?>
	<tr>
		<td><?php echo h($mediaFile['MediaFile']['id']); ?>&nbsp;</td>
		<td><?php echo h($mediaFile['MediaFile']['name']); ?>&nbsp;</td>
		<td><?php echo h($mediaFile['MediaFile']['path']); ?>&nbsp;</td>
		<td><?php echo h($mediaFile['MediaFile']['fileType']); ?>&nbsp;</td>
		<td><?php echo h($mediaFile['MediaFile']['created']); ?>&nbsp;</td>
		<td><?php echo h($mediaFile['MediaFile']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $mediaFile['MediaFile']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $mediaFile['MediaFile']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $mediaFile['MediaFile']['id']), null, __('Are you sure you want to delete # %s?', $mediaFile['MediaFile']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Media File'), array('action' => 'add')); ?></li>
	</ul>
</div>
