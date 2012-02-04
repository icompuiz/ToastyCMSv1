<div class="contents index">
	<h2><?php echo __('Contents');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('alias');?></th>
			<th><?php echo $this->Paginator->sort('category_id');?></th>
			<th><?php echo $this->Paginator->sort('redirect');?></th>
			<th><?php echo $this->Paginator->sort('parent');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($contents as $content): ?>
	<tr>
		<td><?php echo h($content['Content']['id']); ?>&nbsp;</td>
		<td><?php echo h($content['Content']['title']); ?>&nbsp;</td>
		<td><?php echo h($content['Content']['alias']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($content['Category']['title'], array('controller' => 'categories', 'action' => 'view', $content['Category']['id'])); ?>
		</td>
		<td><?php echo h($content['Content']['redirect']); ?>&nbsp;</td>
		<td><?php echo h($content['Content']['parent']); ?>&nbsp;</td>
		<td><?php echo h($content['Content']['created']); ?>&nbsp;</td>
		<td><?php echo h($content['Content']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('controller' => 'content', 'action' => 'display', $content['Content']['alias'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $content['Content']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $content['Content']['id']), null, __('Are you sure you want to delete # %s?', $content['Content']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Content'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
