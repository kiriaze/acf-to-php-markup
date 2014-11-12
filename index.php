// Export ACF field groups to markup v.1 alpha

// grab all acf field groups
$field_objects = get_field_objects();

// for each field group, set and render variables to values
foreach ( $field_objects as $key => $value ) {
	
	// sp($key);
	
	if ( $key == 'content_creator_kit' ) : // arbitrary value - testing purposes
		
		$type    = $value['type'];
		$layouts = $value['layouts'];
		
		foreach ( $layouts as $layout ) {
			
			$layoutName = $layout['name'];
			$subFields  = $layout['sub_fields'];

			foreach ( $subFields as $subField ) {
				$subFieldName    = $subField['name'];
				$subFieldType    = $subField['type'];

				// sp($subFieldName);
				
				if ( $subFieldType == 'flexible_content' ) :
				
					$subFieldLayouts = $subField['layouts'];
				
					foreach ( $subFieldLayouts as $subFieldLayout ) {
						
						$subFieldName    = $subFieldLayout['name'];
						$subFields  = $subFieldLayout['sub_fields'];
						// sp($subFieldName);
						// sp($subFields);
						
						$count = 0;
						$foo = count($subFields);
						echo '<br>';
						echo '&lt?php';
						foreach ( $subFields as $subField ) {
							$subFieldName    = $subField['name'];
							$subFieldType    = $subField['type'];
							// sp($subFieldName);
							// sp($subFieldType);
							echo '<br>';
							echo '$'. $subFieldName .' = get_field("'. $subFieldName .'");'; // or set it to field key
							$count++;
							if ( $count >= $foo ) {
								echo '<br>';
								echo '?&gt';
							}
						}

					}

				endif;

				// sp($subField);
			}
		}
		
		// sp($value);

	endif;
}
