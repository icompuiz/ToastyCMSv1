<div class="profileLayouts view">
<h2><?php  echo __('Profile Layout');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($profileLayout['ProfileLayout']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($profileLayout['ProfileLayout']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($profileLayout['ProfileLayout']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($profileLayout['ProfileLayout']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Profile Layout'), array('action' => 'edit', $profileLayout['ProfileLayout']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Profile Layout'), array('action' => 'delete', $profileLayout['ProfileLayout']['id']), null, __('Are you sure you want to delete # %s?', $profileLayout['ProfileLayout']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Profile Layouts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Profile Layout'), array('action' => 'add')); ?> </li>
	</ul>
</div>
