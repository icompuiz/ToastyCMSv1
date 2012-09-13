<?=$this->Actions->backToAdministration()?>
<?if(!empty($controllers)):?>
<div class="permissions form">
	<?=$this->Form->create(null, array('url' => array('controller'=>'permissions', 'action' => 'setPermissions')))?>
	<fieldset>
		<legend><?php echo __('Manage Permissions'); ?></legend>
		<div class="controllers box"> 
			<ul class="controllers list">
			<?foreach($controllers as $controller):?>
				<li class="controller item">
					<div class="controller box">
						<div class="controller name"><?=$controller['controller']?></div>
						<div class="headers box">
							<ul class="headers list">
								<?foreach($groups as $group):?>
									<li class="header item">
										<div class="header box">
											<div class="header permission box"><?=$group['Group']['name']?></div>
										</div>
									</li>
								<?endforeach?>
							</ul>
						</div>
						<div class="methods box">
							<ul class="methods list">
							<?foreach($controller['actions'] as $action):?>
								<li class="method item">
									<div class="method box">
										<div class="method name"><?=$action?></div>
										<div class="groups box">
											<ul class="groups list">
												<?foreach($groups as $group):?>
													<li class="group item">
														<div class="group box">
															<div class="permission box"><?=$this->Form->checkbox('Permissions.Groups.'.$group['Group']['id']. "." . $controller['controller']. "." .$action)?></div>
														</div>
													</li>
												<?endforeach?>
											</ul>
										</div>
									</div>
								</li>
							<?endforeach?>
							</ul>
						</div>
					</div>
				</li>
			<?endforeach?>
			</ul>
		</div>
	</fieldset>
	<?php echo $this->Form->end(__('Submit'));?>
	</div>
<?endif?>