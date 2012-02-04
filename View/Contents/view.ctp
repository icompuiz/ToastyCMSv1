<div class="contents view">
<h2><?php  echo __('Content');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($content['Content']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($content['Content']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Html'); ?></dt>
		<dd>
			<?php echo h($content['Content']['html']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Js'); ?></dt>
		<dd>
			<?php echo h($content['Content']['js']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Css'); ?></dt>
		<dd>
			<?php echo h($content['Content']['css']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Css Files'); ?></dt>
		<dd>
			<?php echo h($content['Content']['css_files']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Js Files'); ?></dt>
		<dd>
			<?php echo h($content['Content']['js_files']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Alias'); ?></dt>
		<dd>
			<?php echo h($content['Content']['alias']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($content['Category']['title'], array('controller' => 'categories', 'action' => 'view', $content['Category']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Redirect'); ?></dt>
		<dd>
			<?php echo h($content['Content']['redirect']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parent'); ?></dt>
		<dd>
			<?php echo h($content['Content']['parent']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($content['Content']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($content['Content']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Content'), array('action' => 'edit', $content['Content']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Content'), array('action' => 'delete', $content['Content']['id']), null, __('Are you sure you want to delete # %s?', $content['Content']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Contents'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Content'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
