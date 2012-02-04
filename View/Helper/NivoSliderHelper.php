<?php

class NivoSliderHelper extends AppHelper {
	public $helpers = array('Html', 'Form');
	
	public function displaySlider($elements = null) {

	if ( null != $elements ) {

		
		
		?>
		<div class="slideshow">
			<div class="left-button" rel="this_particular_slideshow"></div>
			<div class="simpleSlide-window" rel="this_particular_slideshow">
				<div class="simpleSlide-tray" rel="this_particular_slideshow">
						<?php
							foreach($elements as $element)
							{
								if ( !isset($elements['image']) ) {
									$elements['image'] = '';
								}
								if ( !isset($elements['title']) ) {
									$elements['title'] = '';
								}
								if ( !isset($elements['url']) ) {
									$elements['url'] = '';
								}
								// if ( !isset($elements['text']) ) {
									// $elements['text'] = '';
								// }
								?>
								<div class="simpleSlide-slide" rel="this_particular_slideshow">
								<?php
								echo $this->Html->image($element['image'], array(
								'title' => $element['title'],
								'url'   => $element['url']));
								?>
								</div>
								<?php
							}
						?>
				</div>
				<div class="jump-to" rel="this_particular_slideshow" alt="1"></div>
			</div>
			<div class="right-button" rel="this_particular_slideshow"></div>
			</div>
			<div class="simpleSlideStatus-tray" rel="this_particular_slideshow">
				<div class="simpleSlideStatus-window" rel="this_particular_slideshow"></div>
			</div>
	<?php
		}
	}

}