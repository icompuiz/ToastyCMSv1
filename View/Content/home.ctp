<script language="JavaScript">
		
	var theImages = new Array() 

	theImages[0] = '<?=$this->Html->image('nyubalsa/home01.jpg', array('class'=>'home_random_img'))?>';
	theImages[1] = '<?=$this->Html->image('nyubalsa/home02.jpg', array('class'=>'home_random_img'))?>';
	theImages[2] = '<?=$this->Html->image('nyubalsa/home03.jpg', array('class'=>'home_random_img'))?>';
	theImages[3] = '<?=$this->Html->image('nyubalsa/home04.jpg', array('class'=>'home_random_img'))?>';
	theImages[4] = '<?=$this->Html->image('nyubalsa/home05.jpg', array('class'=>'home_random_img'))?>';
	theImages[5] = '<?=$this->Html->image('nyubalsa/home06.jpg', array('class'=>'home_random_img'))?>';
	theImages[6] = '<?=$this->Html->image('nyubalsa/home07.jpg', array('class'=>'home_random_img'))?>';
	theImages[7] = '<?=$this->Html->image('nyubalsa/home08.jpg', array('class'=>'home_random_img'))?>';
	theImages[8] = '<?=$this->Html->image('nyubalsa/home09.jpg', array('class'=>'home_random_img'))?>';
	theImages[9] = '<?=$this->Html->image('nyubalsa/home10.jpg', array('class'=>'home_random_img'))?>';

	var j = 0
	var p = theImages.length;
	var whichImage = Math.round(Math.random()*(p-1));
	function showImage(){
	document.write(theImages[whichImage]);
	}
</script>
<div class="home_content"> 
	<div class="home_left">
		<div class="home_welcome_image">
			<script language="javascript">
				showImage();
			</script>
			<?=$this->Html->image('nyubalsa/homeh.gif', array('class'=>'homeh'))?>
		</div>
		<div class="home_welcome_text">
			<div class="first_parargraph">
				<p>
				The Black Allied Law Students Association was founded on the campus of 
				New York University and the founding chapter of BALSA has flourished for 40 years. With over 100 
				members, NYU BALSA continues to touch and enhance the lives of not only its members, but the 
				students of NYU and the community at large.
				</p>
				<div class="fp_image">
					<?=$this->Html->image('nyubalsa/shield.gif')?>
				</div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
			<div class="second_paragraph">
				<p>
				The NYU Black Allied Law Students Association exists to articulate and promote the needs and 
				goals of Black law students, increase the professional competence among Black attorneys, 
				prepare and encourage secondary and collegiate students for entry into law school, and 
				increase the awareness and answer the needs of the Black community.
				</p>
			</div>
		</div>
	</div>
	<div class="home_right">
		<div class="latest_news">
			<div class="latest_news_heading">
				<?=$this->Html->image('nyubalsa/latestnews.gif')?>
			</div>
			<div class="latest_news_feed">
				<ul>
					<li>
							<?=$this->Html->image('nyubalsa/news03.png', array('class'=>"news_item_icon",'url' => array('controller' => 'content', 'action' => 'prospective_students')))?>
							<div class="news_item_text">
								<p>We invite qualified applicants to submit an application for the Legends Scholarship. If chosen, you will be required to attend the anniversary celebration gala on October 19, 2012 at which time you will be presented with the scholarship. We look forward to reading your application! 
								<?=$this->Html->link('Click here for more information.',  array('controller' => 'content', 'action' => 'legends_scholarship'))?>
								</p>
							</div>
					</li>
					<li>
							<?=$this->Html->image('nyubalsa/news01.gif', array('class'=>"news_item_icon",'url' => array('controller' => 'content', 'action' => 'prospective_students')))?>
							<div class="news_item_text">
								<p>The NYU BALSA is here to assist
								you with the process of becoming a member of the NYU Law community. 
								In your offer of admission, you are welcome to join The NYU BALSA. 
								<?=$this->Html->link('Click here for more information.',  array('controller' => 'content', 'action' => 'prospective_students'))?>
								</p>
							</div>
					</li>
					<div class="clear"></div>
					<li>
							<?=$this->Html->image('nyubalsa/news02.gif', array('class'=>"news_item_icon",'url' => array('controller' => 'content', 'action' => 'media')))?>
							<div class="news_item_text">
								<p>Customize your desktop today with wallpapers from The NYU BALSA. 
								<?=$this->Html->link('Click here to visit the NYU BALSA media page.', array('controller' => 'content', 'action' => 'media'))?>
								</p>
							</div>
					</li>
					<div class="clear"></div>

				</ul>
			</div>
		</div>
			<div class="upcoming_events_heading">
				<?=$this->Html->image('nyubalsa/upcoming.gif')?>
				<div class="current_events">
				<?php
					foreach ($events as $event): 
					outputEvent($event, false, $this, isset($admin_mode));
					endforeach ?>
				</div>
			</div>
	</div>
	<div class="clear"></div>
</div>

<?
function outputEvent($event,$past=false, $hack, $admin_mode=false) {
?>
<div class="event_post">
			<div class="event_info">
				<div class="event_title">
					<?=$event['Event']['title']?>
				</div>
				<div class="event_time">
					<?=$hack->TimeFormat->getTime($event['Event']['start_time'], $event['Event']['end_time'])?>
				</div>
				<div class="event_location">
						<?=$event['Event']['location']?>
				</div>
			</div>
			<div class="clear"></div>
		</div>
<?
}
 ?>