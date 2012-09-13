 <?=$this->Form->error($fieldname)?>
 <?=$this->Form->label($fieldname, $label)?>
<? if (!empty($description) ) { ?>
<div class='field_description'><p><?=$description?></p></div>
<? } ?>
 <?=$this->Multifile->makeFileArea($fieldname, $formname, $count, $allowedtypes)?>