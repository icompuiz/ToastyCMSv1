<?php

class FeedHelper extends AppHelper {

	public $helpers = array('Form', 'Html');
	
	public function display($feed=null) {
		
		$title = $feed['title'];
		$tid = str_replace(array(" ", ",","-"), "_", $title);
		unset($feed['title']);
	?>
		
		<div class="feed">
		<div class="feed-title"><h1><?=$title?></h1>
		</div>
		<?php if ( !empty($feed) ) : ?>
		<?php if(count($feed) > 3): ?>
			<div class="feed_nav">
				<div class="next_<?=$tid?> next"><?=$this->Html->image('arrows.png')?></div>
				<div class="prev_<?=$tid?> prev"><?=$this->Html->image('arrows.png')?></div>
			</div>
			<div class="clear"></div>
		<? endif; ?>
		<div class="elements" id="<?=$tid?>" >
			<ul class="feed-list">
				<? foreach ($feed as $element): ?>
					<li class="feed-element">
						<div class="feed-element-info">
							<div class="feed-element-icon element">
								<?=$this->Html->image($element['icon'], array('alt'=>$element['title'], 'url' => $element['link']))?>
							</div>
							<div class="feed-element-text">
								<div class="feed-element-title">
									<h2>
									<?=$this->Html->link($element['title'], $element['link'])?>
									</h2>
								</div>
								<div class="feed-element-body">
									<?=substr($element['text'], 0, 100) . $this->Html->link("...", $element['link'])?>
								</div>
							</div>
							<div class="clear"></div>
						</div>
					</li>
				<? endforeach; ?>
			</ul>
		</div>
		
		<?php else: ?>
			<div class="no-elements">
				<?="No " . $title ?>
			</div>
		<? endif;?>
	</div>
	
	<?php
	}

}