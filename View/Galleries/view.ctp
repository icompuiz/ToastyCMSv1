<div class="galleries view">
<h2><?php  echo __('Gallery');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($gallery['Gallery']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($gallery['Gallery']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Variables'); ?></dt>
		<dd>
			<?php echo h($gallery['Gallery']['variables']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Gallery'), array('action' => 'edit', $gallery['Gallery']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Gallery'), array('action' => 'delete', $gallery['Gallery']['id']), null, __('Are you sure you want to delete # %s?', $gallery['Gallery']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Galleries'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gallery'), array('action' => 'add')); ?> </li>
	</ul>
</div>
