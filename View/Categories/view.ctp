<div class="categories index">
	<h3><?=h(ucfirst($category['Category']['title']))?></h3>
	<?php if (!empty($category['Content'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Alias'); ?></th>
		<th><?php echo __('Redirect'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($category['Content'] as $content): ?>
		<tr>
			<td><?php echo $content['id'];?></td>
			<td><?php echo $content['title'];?></td>
			<td><?php echo $content['alias'];?></td>
			<td><?php echo $content['redirect'];?></td>
			<td><?php echo $content['created'];?></td>
			<td><?php echo $content['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'),       array('controller' => 'contents', 'action' => 'view', $content['id'])); ?>
				<?php echo $this->Html->link(__('Edit'),       array('controller' => 'contents', 'action' => 'edit', $content['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'contents', 'action' => 'delete', $content['id']), null, __('Are you sure you want to delete # %s?', $content['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Content'), array('controller' => 'contents', 'action' => 'add', $category['Category']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Edit Category'), array('action' => 'edit', $category['Category']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Category'), array('action' => 'delete', $category['Category']['id']), null, __('Are you sure you want to delete # %s?', $category['Category']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('action' => 'index')); ?> </li>
	</ul>
</div>