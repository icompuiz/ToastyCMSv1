<div class="forms form">
<?php 
	// pr($fields); exit;
	
	
	$form_name = $fields['form']['@name'];
	$form_content = "<div id='$form_name' class='form'>";
	
	
	
	if ( !empty($fields['form']['title']) ) {
		$form_title = $fields['form']['title'];
		$form_content .= "<div id='form_title'><h1>$form_title</h1></div>";
	}
	
	if ( !empty($fields['form']['description']) ) {
		$form_description = $fields['form']['description'];
		$form_content .= "<div id='form_description'><p>$form_description</p></div>";
	}
	
	$form_sections = $fields['form']['sections']['section'];
	
	foreach ($form_sections as $section) 
	{

		$section_name = $section['@name'];
		
		$section_content = "<div id='$section_name' class='section'>";
		
		if ( !empty($section['title']) ) {
			$section_title = $section['title'];
			$section_content .= "<div class='section_title'><h2>$section_title</h2></div>";
			
		}

		if ( !empty($section['description']) ) {
			$section_description = $section['description'];
			$section_content .= "<div class='section_description'><p>$section_description</p></div>";
		}
		
		$section_blocks = $section['blocks']['block'];
		foreach ($section_blocks as $block) 
		{
			
			if( empty($block['@name']) ) {
				continue;
			}
		
			$block_name = $block['@name'];
			
			$block_content = "<div id='$block_name' class='block'>";
			
			if ( !empty($block['title']) ) {
				$block_title = $block['title'];
				$block_content .= "<div class='block_title'><h3>$block_title</h3></div>";
			}
			
			if ( !empty($block['description']) ) {
				$block_description = $block['description'];
				$block_content .= "<div class='block_description'><p>$block_description</p></div>";
			}
			
			if ( empty($block['fields']['field'] ) ) { 
				continue;
			}
			
			$block_fields = $block['fields']['field'];
			
			foreach ( $block_fields as $field ) 
			{
			
				if( empty($field['@name']) ) {
					continue;
				}
				if( empty($field['@type']) ) {
					continue;
				}
			
				$field_type = $field['@type'];
				$field_name = $field['@name'];
				$field_label = $field['label'];
				$field_options = array();
				
				$field_required = "required";
				if ( !empty($field['@required']) ) {
					if ( $field['@required'] == "false" ) {
						$field_required = "";
					}	
				}
				$field_content = "<div id='$field_name' class='field $field_required'>";
				
				if ( !empty($field['options']) ) {
					$field_options = $field['options'];
				}
				$field_description = "";
				if ( !empty($field['description']) ) {
					$field_description = $field['description'];
				}
				
				if ( $field_type != "file" ) {
				
					$field_content .= $this->element($field_type, 
					array(
						"label" => $field_label,
						"fieldname" => "FormSubmission.".$field_name,
						"description" => $field_description,
						"options" => $field_options
					));
				} else {
				
					$file_form = true;
				
					$count = 1;
					if ( !empty($field['count']) ) {
						$count = $field['count'];
					}
					
					$allowedtypes = "*";
					if ( !empty($field['allowedtypes']) ) {
						$allowedtypes = $field['allowedtypes'];
					}
				
					$field_content .= $this->element($field_type, 
					array(
						"label" => $field_label,
						"fieldname" => "FormSubmission.".$field_name,
						"description" => $field_description,
						"options" => $field_options,
						"formname" => "FormSubmission",
						"count" => $count,
						"allowedtypes" => $allowedtypes
						
						
					));
				
				}
				
				
				$field_content .= "</div>";
				
				$block_content .= $field_content;
			
			}
			
			$block_content .= "</div>";
			$section_content .= $block_content;
		}
		
		$section_content .= "</div>";
		$form_content .= $section_content;
		
	}
	$form_content .= "</div>";
	
	if ( !empty($file_form)) {
		echo $this->Form->create('FormSubmission', array('type' => 'file'));
		
	} else {
		echo $this->Form->create('FormSubmission');
	}
	
	echo $form_content;
	
	echo $this->Form->hidden('form_id');
	// echo $this->element('text', array(
		// "label" => "name",
		// "fieldname" => "name",
		// "options" => array()
	// ));
	
	// echo $this->element('textarea', array(
		// "fieldname" => "name",
		// "label" => "name",
		// "options" => array()
	// ));
	
	
	echo $this->Form->end('Submit Form');


?>

</div>