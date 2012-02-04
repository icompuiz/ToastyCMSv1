<?=$this->Actions->backToAdministration()?>
<div>
	<h1>Site Settings</h1>
	<div class="admin">
		<div class="admin_links">
			<div class="">
					<?=$this->Html->link('Site Variables', array('action'=>'variables'))?>
			</div>
			<div class="">
					<?=$this->Html->link('Data Sources', array('action'=>'databases'))?>
			</div>
			<div class="">
					<?=$this->Html->link('Config', array('action'=>'config'))?>
			</div>
			<div class="">
					<?=$this->Html->link('Routes', array('action' => 'routes'))?>
			</div>

		</div>
	</div>
</div>