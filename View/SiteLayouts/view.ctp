<div class="siteLayouts view">
<h2><?php  echo __('Site Layout');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($siteLayout['SiteLayout']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($siteLayout['SiteLayout']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Path'); ?></dt>
		<dd>
			<?php echo h($siteLayout['SiteLayout']['path']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Js Files'); ?></dt>
		<dd>
			<?php echo h($siteLayout['SiteLayout']['js_files']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Css Files'); ?></dt>
		<dd>
			<?php echo h($siteLayout['SiteLayout']['css_files']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($siteLayout['SiteLayout']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($siteLayout['SiteLayout']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Site Layout'), array('action' => 'edit', $siteLayout['SiteLayout']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Site Layout'), array('action' => 'delete', $siteLayout['SiteLayout']['id']), null, __('Are you sure you want to delete # %s?', $siteLayout['SiteLayout']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Site Layouts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Site Layout'), array('action' => 'add')); ?> </li>
	</ul>
</div>
