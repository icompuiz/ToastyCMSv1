<div class="settings index">
	<h2><?=__('Settings')?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('key');?></th>
			<th><?php echo $this->Paginator->sort('value');?></th>
	</tr>
	<?php 
	$i = 0;
	foreach ($settings as $setting):
	?>
	<tr>
		<td><?php echo h($setting['Setting']['key']); ?>&nbsp;</td>
		<td><?php echo h($setting['Setting']['value']); ?>&nbsp;</td>
	</tr>
	<? endforeach ?>
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
