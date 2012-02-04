<div class="themes view">
<h2><?php  echo __('Theme');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($theme['Theme']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($theme['Theme']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Layout'); ?></dt>
		<dd>
			<?php echo h($theme['Theme']['layout']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Stylesheets'); ?></dt>
		<dd>
			<?php echo h($theme['Theme']['stylesheets']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Javascript'); ?></dt>
		<dd>
			<?php echo h($theme['Theme']['javascript']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($theme['Theme']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($theme['Theme']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Theme'), array('action' => 'edit', $theme['Theme']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Theme'), array('action' => 'delete', $theme['Theme']['id']), null, __('Are you sure you want to delete # %s?', $theme['Theme']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Themes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Theme'), array('action' => 'add')); ?> </li>
	</ul>
</div>
