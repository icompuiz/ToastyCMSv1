<?php

class ContentBarHelper extends AppHelper {
	public $helpers = array("Html", 'Form');
	
	public function mediaFiles_index($mediaFiles) {
	?>
	<div id="content_bar mediaFiles">
		<div class="clear"></div>
		<div id="content_box">
			<ul>
			<? foreach (array_keys($mediaFiles)as $type): ?>
				<li>
					<div class="content_category"><?=$type?></div>
					<ul>
						<? foreach ($mediaFiles[$type] as $file): 
							$file = $file['MediaFile'];
						?>
							<li><div class="content_item"><?=$this->Html->link($file['name'], array('action' => 'view', $file['id']))?></div></li>						
						<? endforeach; ?>
					</ul>
				</li>
			<? endforeach; ?>
			</ul>
		</div>
	</div>
	
	<?php	
	}
	public function mediaFiles($mediaFiles) {
	?>
	<div id="content_bar">
		<div class="clear"></div>
		<div id="content_box">
			<ul>
			<? foreach (array_keys($mediaFiles)as $type): ?>
				<li>
					<div class="content_category"><?=$type?></div>
					<ul>
						<? foreach ($mediaFiles[$type] as $file): 
							$file = $file['MediaFile'];
						?>
							<li><div class="content_item"><?=$this->Html->link($file['name'], array('action' => 'view', $file['id']))?></div></li>						
						<? endforeach; ?>
					</ul>
				</li>
			<? endforeach; ?>
			</ul>
		</div>
	</div>
	
	<?php	
	}

	public function dataSources($sources) {
	?>
	
	<div id="content_bar">
		<h1>Select Data Source</h1>

		<div class="clear"></div>
		<div id="content_box">
			<ul>
			<? foreach (array_keys($sources)as $source): ?>
				<li>
					<div class="content_category"><?=$source?></div>
					<ul>
						<? foreach ($sources[$source] as $config): ?>
							<li><div class="content_item"><?=$this->Html->link($config, array('action' => 'database', $source, $config))?></div></li>						
						<? endforeach; ?>
					</ul>
				</li>
			<? endforeach; ?>
			</ul>
		</div>
	</div>
	
	<?php
	}
	
	public function variables($variables) {
	
	?>
	
		<div id="content_bar">
			<div class="clear"></div>
			<div id="content_box">
				<ul>
				<? foreach ($variables as $variable): ?>
					<li>
						<div class="content_category"><?=$this->Html->link($variable['Variable']['key'], array('controller'=>'settings', 'action'=>'variable', $variable['Variable']['key']))?></div>
					<? endforeach; ?>
					</li>
				</ul>
			</div>
		</div>
	
	<?php
	
	}
	
	public function categories($categories) {
	
	?>

	<div id="content_bar">
		<div class="content_actions actions">
			<ul>
				<li><?=$this->Html->link(__('New Content', true),array('controller'=>'contents','action'=>'add'))?></li>
				<li><?=$this->Html->link(__('New Category', true),array('controller'=>'categories','action'=>'add'))?></li>
			</ul>
		</div>
		<div class="clear"></div>
		<div id="content_box">
			<ul>
			<? foreach ($categories as $category): ?>
				<li>
					<div class="content_category"><?=$this->Html->link($category['Category']['title'], array('controller'=>'categories', 'action'=>'edit', $category['Category']['id']))?></div>
					<ul>
						<? 
						$counter = 1;
						foreach (array_keys($category['Content']) as $id):
							$content['title'] = $category['Content'][$id];
							$content['id'] = $id;
							$content['ordering'] = $counter;
							$counter++;
						?>
						<li><div class="content_item"><div class="ordering"><?=$content['ordering']?></div><?=$this->Html->link($content['title'], array('controller'=>'contents', 'action'=>'edit', $content['id']))?></div></li>
						<? endforeach; ?>
					</ul>
				<? endforeach; ?>
				</li>
			</ul>
		</div>
	</div>

	
	<?php
	
	}
	
	public function siteLayouts($siteLayouts) {
	?>
	
	<div id="content_bar">
		<div class="content_actions actions">
			<ul>
				<li><?=$this->Html->link(__('New Layout', true),array('action'=>'add'))?></li>
			</ul>
		</div>
		<div class="clear"></div>
		<div id="content_box">
			<ul>
			<? foreach ($siteLayouts as $layout): ?>
				<li>
					<div class="content_category"><?=$this->Html->link($layout['SiteLayout']['title'], array('action'=>'edit', $layout['SiteLayout']['id']))?></div>
				<? endforeach; ?>
				</li>
			</ul>
		</div>
	</div>
	
	<?php
	}
	
	public function users($groups) {
	?>
	<div id="content_bar">
		<div class="content_actions actions">
			<ul>
				<li><?=$this->Html->link(__('New Group', true),array('controller' => 'groups','action'=>'add'))?></li>
				<li><?=$this->Html->link(__('New User', true),array('controller'=>'users','action'=>'add'))?></li>
			</ul>
		</div>
		<div class="clear"></div>
		<div id="content_box">
			<ul>
			<? foreach ($groups as $group): ?>
				<li>
						<div class="content_category"><?=$this->Html->link($group['Group']['name'], array('controller'=>'groups', 'action'=>'edit', $group['Group']['id']))?></div>
					<ul>
						<? foreach ($group['User'] as $user): ?>
							<li><div class="content_item"><?=$this->Html->link($user['username'], array('controller'=>'users', 'action'=>'edit', $user['id']))?></div></li>
						<? endforeach; ?>
					</ul>
				<? endforeach; ?>
				</li>
			</ul>
		</div>
	</div>
	
	<?php
	}
	
	public function memberGroups($groups) {
	
	?>
	<div id="content_bar">
		<div class="content_actions actions">
			<ul>
				<li><?=$this->Html->link(__('New Member Group', true),array('controller' => 'member_groups','action'=>'add'))?></li>
			</ul>
		</div>
		<div class="clear"></div>
		<div id="content_box">
			<ul>
			<? foreach ($groups as $group): ?>
				<li>
						<div class="content_category"><?=$this->Html->link($group['Group']['name'], array('controller'=>'member_groups', 'action'=>'edit', $group['MemberGroup']['id']))?></div>
					<ul>
						<? foreach ($group['Member'] as $member): ?>
							<li><div class="content_item"><?=$this->Html->link($member['username'], array('controller'=>'members', 'action'=>'edit', $member['id']))?></div></li>
						<? endforeach; ?>
					</ul>
				<? endforeach; ?>
				</li>
			</ul>
		</div>
	</div>
	
	<?php
	}
	
	public function profileLayouts($layouts) {
		?>
		<div id="content_bar">
			<div class="content_actions actions">
				<ul>
					<li><?=$this->Html->link(__('New Profile Layout', true),array('controller' => 'profile_layouts','action'=>'add'))?></li>
				</ul>
			</div>
			<div class="clear"></div>
			<div id="content_box">
				<ul>
				<? foreach ($layouts as $layout): ?>
					<li>
							<div class="content_category"><?=$this->Html->link($layout['ProfileLayout']['name'], array('controller'=>'profile_layouts', 'action'=>'edit', $layout['ProfileLayout']['id']))?></div>
					</li>
				<?endforeach;?>
				</ul>
			</div>
		</div>
		
		<?php
	}
	
	public function galleries($galleries) {
		?>
		<div id="content_bar">
			<div class="content_actions actions">
				<ul>
					<li><?=$this->Html->link(__('New Facebook Gallery', true),array('controller' => 'galleries','action'=>'add', 'facebook'))?></li>
					<li><?=$this->Html->link(__('New Vimeo Gallery', true),array('controller' => 'galleries','action'=>'add', 'vimeo'))?></li>
				</ul>
			</div>
			<div class="clear"></div>
			<div id="content_box">
				<ul>
				<? foreach ($galleries as $gallery): ?>
					<li>
							<div class="content_category"><?=$this->Html->link($gallery['Gallery']['name'], array('controller'=>'galleries', 'action'=>'edit', $gallery['Gallery']['id']))?></div>
					</li>
				<?endforeach;?>
				</ul>
			</div>
		</div>
		
		<?php
	}
	
	

}