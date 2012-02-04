<div class="fields view">
<h2><?php  echo __('Field');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($field['Field']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Field Name'); ?></dt>
		<dd>
			<?php echo h($field['Field']['field_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Field Value'); ?></dt>
		<dd>
			<?php echo h($field['Field']['field_value']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Field Type'); ?></dt>
		<dd>
			<?php echo h($field['Field']['field_type']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Field'), array('action' => 'edit', $field['Field']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Field'), array('action' => 'delete', $field['Field']['id']), null, __('Are you sure you want to delete # %s?', $field['Field']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Fields'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Field'), array('action' => 'add')); ?> </li>
	</ul>
</div>
