<?php
function ale_init_metaboxes()
{
	if (!function_exists('aletheme_metaboxes')) {
		return;
	}
	
	add_filter('ale_meta_boxes', 'aletheme_metaboxes' );
	
	$meta_boxes = array();
	$meta_boxes = apply_filters ( 'ale_meta_boxes' , $meta_boxes );
	foreach ( $meta_boxes as $meta_box ) {
		new Ale_Meta_Box( $meta_box );
	}
}
if (is_admin()) {
	add_action('init', 'ale_init_metaboxes');
}

/**
 * Validate value of meta fields
 * Define ALL validation methods inside this class and use the names of these 
 * methods in the definition of meta boxes (key 'validate_func' of each field)
 */
class ale_meta_box_validate {
	function check_text( $text ) {
		if ($text != 'hello') {
			return false;
		}
		return true;
	}
}

/**
 * Create meta boxes
 */
class Ale_Meta_Box {
	protected $_meta_box;

	function __construct( $meta_box ) {
		if ( !is_admin() ) return;

		$this->_meta_box = $meta_box;

		$upload = false;
		foreach ( $meta_box['fields'] as $field ) {
			if ( $field['type'] == 'file' || $field['type'] == 'file_list' ) {
				$upload = true;
				break;
			}
		}
		
		global $pagenow;		
		if ( $upload && in_array( $pagenow, array( 'page.php', 'page-new.php', 'post.php', 'post-new.php' ) ) ) {
			add_action( 'admin_head', array( &$this, 'add_post_enctype' ) );
		}

		add_action( 'admin_menu', array( &$this, 'add' ) );
		add_action( 'save_post', array( &$this, 'save' ) );

		add_filter( 'ale_show_on', array( &$this, 'add_for_id' ), 10, 2 );
		add_filter( 'ale_show_on', array( &$this, 'add_for_page_template' ), 10, 2 );
	}

	function add_post_enctype() {
		echo '
		<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery("#post").attr("enctype", "multipart/form-data");
			jQuery("#post").attr("encoding", "multipart/form-data");
		});
		</script>';
	}

	// Add metaboxes
	function add() {
		$this->_meta_box['context'] = empty($this->_meta_box['context']) ? 'normal' : $this->_meta_box['context'];
		$this->_meta_box['priority'] = empty($this->_meta_box['priority']) ? 'high' : $this->_meta_box['priority'];
		$this->_meta_box['show_on'] = empty( $this->_meta_box['show_on'] ) ? array('key' => false, 'value' => false) : $this->_meta_box['show_on'];
		
		foreach ( $this->_meta_box['pages'] as $page ) {
			if( apply_filters( 'ale_show_on', true, $this->_meta_box ) )
				add_meta_box( $this->_meta_box['id'], $this->_meta_box['title'], array(&$this, 'show'), $page, $this->_meta_box['context'], $this->_meta_box['priority']) ;
		}
	}
	
	/**
	 * Show On Filters
	 * Use the 'ale_show_on' filter to further refine the conditions under which a metabox is displayed.
	 * Below you can limit it by ID and page template
	 */
	 
	// Add for ID 
	function add_for_id( $display, $meta_box ) {
		if ( 'id' !== $meta_box['show_on']['key'] )
			return $display;

		// If we're showing it based on ID, get the current ID					
		if( isset( $_GET['post'] ) ) $post_id = $_GET['post'];
		elseif( isset( $_POST['post_ID'] ) ) $post_id = $_POST['post_ID'];
		if( !isset( $post_id ) )
			return false;
		
		// If value isn't an array, turn it into one	
		$meta_box['show_on']['value'] = !is_array( $meta_box['show_on']['value'] ) ? array( $meta_box['show_on']['value'] ) : $meta_box['show_on']['value'];
		
		// If current page id is in the included array, display the metabox

		if ( in_array( $post_id, $meta_box['show_on']['value'] ) )
			return true;
		else
			return false;
	}
	
	// Add for Page Template
	function add_for_page_template( $display, $meta_box ) {
		if( 'page-template' !== $meta_box['show_on']['key'] )
			return $display;
			
		// Get the current ID
		if( isset( $_GET['post'] ) ) $post_id = $_GET['post'];
		elseif( isset( $_POST['post_ID'] ) ) $post_id = $_POST['post_ID'];
		if( !( isset( $post_id ) || is_page() ) ) return false;
			
		// Get current template
		$current_template = get_post_meta( $post_id, '_wp_page_template', true );
		
		// If value isn't an array, turn it into one	
		$meta_box['show_on']['value'] = !is_array( $meta_box['show_on']['value'] ) ? array( $meta_box['show_on']['value'] ) : $meta_box['show_on']['value'];

		// See if there's a match
		if( in_array( $current_template, $meta_box['show_on']['value'] ) )
			return true;
		else
			return false;
	}
	
	// Show fields
	function show() {

		global $post;

		// Use nonce for verification
		echo '<input type="hidden" name="wp_meta_box_nonce" value="', wp_create_nonce( basename(__FILE__) ), '" />';
		echo '<table class="form-table ale_metabox">';

		foreach ( $this->_meta_box['fields'] as $field ) {
			// Set up blank or default values for empty ones
			if ( !isset( $field['name'] ) ) $field['name'] = '';
			if ( !isset( $field['desc'] ) ) $field['desc'] = '';
			if ( !isset( $field['std'] ) ) $field['std'] = '';
			if ( 'file' == $field['type'] && !isset( $field['allow'] ) ) $field['allow'] = array( 'url', 'attachment' );
			if ( 'file' == $field['type'] && !isset( $field['save_id'] ) )  $field['save_id']  = false;
			if ( 'multicheck' == $field['type'] ) $field['multiple'] = true;  
						
			$meta = get_post_meta( $post->ID, $field['id'], 'multicheck' != $field['type'] /* If multicheck this can be multiple values */ );

			echo '<tr>';
	
			if ( $field['type'] == "title" ) {
				echo '<td colspan="2">';
			} else {
				if( $this->_meta_box['show_names'] == true ) {
					echo '<th style="width:18%"><label for="', $field['id'], '">', $field['name'], '</label></th>';
				}			
				echo '<td>';
			}		
						
			switch ( $field['type'] ) {

				case 'text':
					echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', '' !== $meta ? $meta : $field['std'], '" />','<p class="ale_metabox_description">', $field['desc'], '</p>';
					break;
				case 'text_small':
					echo '<input class="ale_text_small" type="text" name="', $field['id'], '" id="', $field['id'], '" value="', '' !== $meta ? $meta : $field['std'], '" /><span class="ale_metabox_description">', $field['desc'], '</span>';
					break;
				case 'text_medium':
					echo '<input class="ale_text_medium" type="text" name="', $field['id'], '" id="', $field['id'], '" value="', '' !== $meta ? $meta : $field['std'], '" /><span class="ale_metabox_description">', $field['desc'], '</span>';
					break;
				case 'text_date':
					echo '<input class="ale_text_small ale_datepicker" type="text" name="', $field['id'], '" id="', $field['id'], '" value="', '' !== $meta ? $meta : $field['std'], '" /><span class="ale_metabox_description">', $field['desc'], '</span>';
					break;
				case 'text_date_timestamp':
					echo '<input class="ale_text_small ale_datepicker" type="text" name="', $field['id'], '" id="', $field['id'], '" value="', '' !== $meta ? date( 'm\/d\/Y', $meta ) : $field['std'], '" /><span class="ale_metabox_description">', $field['desc'], '</span>';
					break;
				case 'text_datetime_timestamp':
					echo '<input class="ale_text_small ale_datepicker" type="text" name="', $field['id'], '[date]" id="', $field['id'], '_date" value="', '' !== $meta ? date( 'm\/d\/Y', $meta ) : $field['std'], '" />';
					echo '<input class="ale_timepicker text_time" type="text" name="', $field['id'], '[time]" id="', $field['id'], '_time" value="', '' !== $meta ? date( 'h:i A', $meta ) : $field['std'], '" /><span class="ale_metabox_description" >', $field['desc'], '</span>';
					break;
				case 'text_time':
					echo '<input class="ale_timepicker text_time" type="text" name="', $field['id'], '" id="', $field['id'], '" value="', '' !== $meta ? $meta : $field['std'], '" /><span class="ale_metabox_description">', $field['desc'], '</span>';
					break;					
				case 'text_money':
					echo '$ <input class="ale_text_money" type="text" name="', $field['id'], '" id="', $field['id'], '" value="', '' !== $meta ? $meta : $field['std'], '" /><span class="ale_metabox_description">', $field['desc'], '</span>';
					break;
				case 'colorpicker':
					echo '<div id="' . esc_attr( $field['id'] . '_picker' ) . '" class="colorSelector"><div style="' . esc_attr( 'background-color:' . ('' !== $meta ? $meta : $field['std']) ) . '"></div></div>';
					echo '<input class="ale_colorpicker ale_text_small" name="' . $field['id'] . '" id="' . esc_attr($field['id']) . '" type="text" value="', '' !== $meta ? $meta : $field['std'], '" />';
					break;
				case 'textarea':
					echo '<textarea name="', $field['id'], '" id="', $field['id'], '" cols="60" rows="10">', '' !== $meta ? $meta : $field['std'], '</textarea>','<p class="ale_metabox_description">', $field['desc'], '</p>';
					break;
				case 'textarea_small':
					echo '<textarea name="', $field['id'], '" id="', $field['id'], '" cols="60" rows="4">', '' !== $meta ? $meta : $field['std'], '</textarea>','<p class="ale_metabox_description">', $field['desc'], '</p>';
					break;
				case 'textarea_code':
					echo '<textarea name="', $field['id'], '" id="', $field['id'], '" cols="60" rows="10" class="ale_textarea_code">', '' !== $meta ? $meta : $field['std'], '</textarea>','<p class="ale_metabox_description">', $field['desc'], '</p>';
					break;					
				case 'select':
					echo '<select name="', $field['id'], '" id="', $field['id'], '">';
					foreach ($field['options'] as $option) {
						echo '<option value="', $option['value'], '"', $meta == $option['value'] ? ' selected="selected"' : '', '>', $option['name'], '</option>';
					}
					echo '</select>';
					echo '<p class="ale_metabox_description">', $field['desc'], '</p>';
					break;
				case 'custom_post_select':
				    echo '<select name="', $field['id'], '" id="', $field['id'], '">';
				    echo '<option value="0"></option>';
				    $items = get_posts( array('post_type'=> $field['post_type'], 'numberposts' => -1) );
				                                       
				    foreach ( $items as $item ) {
                       echo '<option value="', $item->ID, '"', $meta == $item->ID ? ' selected="selected"' : '', '>', $item->post_title, '</option>';
				    }
				    echo '</select>';
				    echo '<p class="ale_metabox_description">', $field['desc'], '</p>';
				    break;					
				case 'radio_inline':
					if( empty( $meta ) && !empty( $field['std'] ) ) $meta = $field['std'];
					echo '<div class="ale_radio_inline">';
					$i = 1;
					foreach ($field['options'] as $option) {
						echo '<div class="ale_radio_inline_option"><input type="radio" name="', $field['id'], '" id="', $field['id'], $i, '" value="', $option['value'], '"', $meta == $option['value'] ? ' checked="checked"' : '', ' /><label for="', $field['id'], $i, '">', $option['name'], '</label></div>';
						$i++;
					}
					echo '</div>';
					echo '<p class="ale_metabox_description">', $field['desc'], '</p>';
					break;
				case 'radio':
					if( empty( $meta ) && !empty( $field['std'] ) ) $meta = $field['std'];
					echo '<ul>';
					$i = 1;
					foreach ($field['options'] as $option) {
						echo '<li><input type="radio" name="', $field['id'], '" id="', $field['id'], $i,'" value="', $option['value'], '"', $meta == $option['value'] ? ' checked="checked"' : '', ' /><label for="', $field['id'], $i, '">', $option['name'].'</label></li>';
						$i++;
					}
					echo '</ul>';
					echo '<p class="ale_metabox_description">', $field['desc'], '</p>';
					break;
				case 'checkbox':
					echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' checked="checked"' : '', ' />';
					echo '<span class="ale_metabox_description">', $field['desc'], '</span>';
					break;
				case 'multicheck':
					echo '<ul>';
					$i = 1;
					foreach ( $field['options'] as $value => $name ) {
						// Append `[]` to the name to get multiple values
						// Use in_array() to check whether the current option should be checked
						echo '<li><input type="checkbox" name="', $field['id'], '[]" id="', $field['id'], $i, '" value="', $value, '"', in_array( $value, $meta ) ? ' checked="checked"' : '', ' /><label for="', $field['id'], $i, '">', $name, '</label></li>';	
						$i++;
					}
					echo '</ul>';
					echo '<span class="ale_metabox_description">', $field['desc'], '</span>';					
					break;		
				case 'title':
					echo '<h5 class="ale_metabox_title">', $field['name'], '</h5>';
					echo '<p class="ale_metabox_description">', $field['desc'], '</p>';
					break;
				case 'wysiwyg':
					wp_editor( $meta ? $meta : $field['std'], $field['id'], isset( $field['options'] ) ? $field['options'] : array() );
			        echo '<p class="ale_metabox_description">', $field['desc'], '</p>';
					break;
				case 'taxonomy_select':
					echo '<select name="', $field['id'], '" id="', $field['id'], '">';
					$names= wp_get_object_terms( $post->ID, $field['taxonomy'] );
					$terms = get_terms( $field['taxonomy'], 'hide_empty=0' );
					foreach ( $terms as $term ) {
						if (!is_wp_error( $names ) && !empty( $names ) && !strcmp( $term->slug, $names[0]->slug ) ) {
							echo '<option value="' . $term->slug . '" selected>' . $term->name . '</option>';
						} else {
							echo '<option value="' . $term->slug . '  ' , $meta == $term->slug ? $meta : ' ' ,'  ">' . $term->name . '</option>';
						}
					}
					echo '</select>';
					echo '<p class="ale_metabox_description">', $field['desc'], '</p>';
					break;
				case 'taxonomy_radio':
					$names= wp_get_object_terms( $post->ID, $field['taxonomy'] );
					$terms = get_terms( $field['taxonomy'], 'hide_empty=0' );
					echo '<ul>';
					foreach ( $terms as $term ) {
						if ( !is_wp_error( $names ) && !empty( $names ) && !strcmp( $term->slug, $names[0]->slug ) ) {
							echo '<li><input type="radio" name="', $field['id'], '" value="'. $term->slug . '" checked>' . $term->name . '</li>';
						} else {
							echo '<li><input type="radio" name="', $field['id'], '" value="' . $term->slug . '  ' , $meta == $term->slug ? $meta : ' ' ,'  ">' . $term->name .'</li>';
						}
					}
					echo '</ul>';
					echo '<p class="ale_metabox_description">', $field['desc'], '</p>';
					break;
				case 'taxonomy_multicheck':
					echo '<ul>';
					$names = wp_get_object_terms( $post->ID, $field['taxonomy'] );
					$terms = get_terms( $field['taxonomy'], 'hide_empty=0' );
					foreach ($terms as $term) {
						echo '<li><input type="checkbox" name="', $field['id'], '[]" id="', $field['id'], '" value="', $term->name , '"'; 
						foreach ($names as $name) {
							if ( $term->slug == $name->slug ){ echo ' checked="checked" ';};
						}
						echo' /><label>', $term->name , '</label></li>';
					}
				break;
				case 'file_list':
					echo '<input class="ale_upload_file" type="text" size="36" name="', $field['id'], '" value="" />';
					echo '<input class="ale_upload_button button" type="button" value="Upload File" />';
					echo '<p class="ale_metabox_description">', $field['desc'], '</p>';
						$args = array(
								'post_type' => 'attachment',
								'numberposts' => null,
								'post_status' => null,
								'post_parent' => $post->ID
							);
							$attachments = get_posts($args);
							if ($attachments) {
								echo '<ul class="attach_list">';
								foreach ($attachments as $attachment) {
									echo '<li>'.wp_get_attachment_link($attachment->ID, 'thumbnail', 0, 0, 'Download');
									echo '<span>';
									echo apply_filters('the_title', '&nbsp;'.$attachment->post_title);
									echo '</span></li>';
								}
								echo '</ul>';
							}
						break;
				case 'file':
					$input_type_url = "hidden";
					if ( 'url' == $field['allow'] || ( is_array( $field['allow'] ) && in_array( 'url', $field['allow'] ) ) )
						$input_type_url="text";
					echo '<input class="ale_upload_file" type="' . $input_type_url . '" size="45" id="', $field['id'], '" name="', $field['id'], '" value="', $meta, '" />';
					echo '<input class="ale_upload_button button" type="button" value="Upload File" />';
					echo '<input class="ale_upload_file_id" type="hidden"  id="', $field['id'], '_id" name="', $field['id'], '_id" value="', get_post_meta( $post->ID, $field['id'] . "_id",true), '" />';					
					echo '<p class="ale_metabox_description">', $field['desc'], '</p>';
					echo '<div id="', $field['id'], '_status" class="ale_upload_status">';	
						if ( $meta != '' ) { 
							$check_image = preg_match( '/(^.*\.jpg|jpeg|png|gif|ico*)/i', $meta );
							if ( $check_image ) {
								echo '<div class="img_status">';
								echo '<img src="', $meta, '" alt="" width="300"/><br>';
								echo '<a href="#" class="ale_remove_file_button" rel="', $field['id'], '">Remove Image</a>';
								echo '</div>';
							} else {
								$parts = explode( '/', $meta );
								for( $i = 0; $i < count( $parts ); ++$i ) {
									$title = $parts[$i];
								} 
								echo 'File: <strong>', $title, '</strong>&nbsp;&nbsp;&nbsp; (<a href="', $meta, '" target="_blank" rel="external">Download</a> / <a href="#" class="ale_remove_file_button" rel="', $field['id'], '">Remove</a>)';
							}	
						}
					echo '</div>'; 
				break;
				default:
					do_action('ale_render_' . $field['type'] , $field, $meta);
			}
			
			echo '</td>','</tr>';
		}
		echo '</table>';
	}

	// Save data from metabox
	function save( $post_id)  {

		// verify nonce
		if ( ! isset( $_POST['wp_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['wp_meta_box_nonce'], basename(__FILE__) ) ) {
			return $post_id;
		}

		// check autosave
		if ( defined('DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return $post_id;
		}

		// check permissions
		if ( 'page' == $_POST['post_type'] ) {
			if ( !current_user_can( 'edit_page', $post_id ) ) {
				return $post_id;
			}
		} elseif ( !current_user_can( 'edit_post', $post_id ) ) {
			return $post_id;
		}

		foreach ( $this->_meta_box['fields'] as $field ) {
			$name = $field['id'];			

			if ( ! isset( $field['multiple'] ) )
				$field['multiple'] = ( 'multicheck' == $field['type'] ) ? true : false;    
				  
			$old = get_post_meta( $post_id, $name, !$field['multiple'] /* If multicheck this can be multiple values */ );
			$new = isset( $_POST[$field['id']] ) ? $_POST[$field['id']] : null;
			
			if ( in_array( $field['type'], array( 'taxonomy_select', 'taxonomy_radio', 'taxonomy_multicheck' ) ) )  {	
				$new = wp_set_object_terms( $post_id, $new, $field['taxonomy'] );	
			}
			
			if ( ($field['type'] == 'textarea') || ($field['type'] == 'textarea_small') ) {
				$new = htmlspecialchars( $new );
			}

			if ( ($field['type'] == 'textarea_code') ) {
				$new = htmlspecialchars_decode( $new );
			}
			
			if ( $field['type'] == 'text_date_timestamp' ) {
				$new = strtotime( $new );
			}

			if ( $field['type'] == 'text_datetime_timestamp' ) {
				$string = $new['date'] . ' ' . $new['time'];
				$new = strtotime( $string );
			}
			
			$new = apply_filters('ale_validate_' . $field['type'], $new, $post_id, $field);			
			
			// validate meta value
			if ( isset( $field['validate_func']) ) {
				$ok = call_user_func( array( 'ale_meta_box_validate', $field['validate_func']), $new );
				if ( $ok === false ) { // pass away when meta value is invalid
					continue;
				}
			} elseif ( $field['multiple'] ) {
				delete_post_meta( $post_id, $name );	
				if ( !empty( $new ) ) {
					foreach ( $new as $add_new ) {
						add_post_meta( $post_id, $name, $add_new, false );
					}
				}			
			} elseif ( '' !== $new && $new != $old  ) {
				update_post_meta( $post_id, $name, $new );
			} elseif ( '' == $new ) {
				delete_post_meta( $post_id, $name );
			}
			
			if ( 'file' == $field['type'] ) {
				$name = $field['id'] . "_id";
				$old = get_post_meta( $post_id, $name, !$field['multiple'] /* If multicheck this can be multiple values */ );
				if ( isset( $field['save_id'] ) && $field['save_id'] ) {
					$new = isset( $_POST[$name] ) ? $_POST[$name] : null;
				} else {
					$new = "";
				}

				if ( $new && $new != $old ) {
					update_post_meta( $post_id, $name, $new );
				} elseif ( '' == $new && $old ) {
					delete_post_meta( $post_id, $name, $old );
				}
			}			
		}
	}
}

function ale_editor_footer_scripts() { ?>
	<?php
	if ( isset( $_GET['ale_force_send'] ) && 'true' == $_GET['ale_force_send'] ) { 
		$label = $_GET['ale_send_label']; 
		if ( empty( $label ) ) $label="Select File";
		?>	
		<script type="text/javascript">
		jQuery(function($) {
			$('td.savesend input').val('<?php echo $label; ?>');
		});
		</script>
		<?php 
	}
}
add_action( 'admin_print_footer_scripts', 'ale_editor_footer_scripts', 99 );

// Force 'Insert into Post' button from Media Library 
add_filter( 'get_media_item_args', 'ale_force_send' );
function ale_force_send( $args ) {
		
	// if the Gallery tab is opened from a custom meta box field, add Insert Into Post button	
	if ( isset( $_GET['ale_force_send'] ) && 'true' == $_GET['ale_force_send'] )
		$args['send'] = true;
	
	// if the From Computer tab is opened AT ALL, add Insert Into Post button after an image is uploaded	
	if ( isset( $_POST['attachment_id'] ) && '' != $_POST["attachment_id"] ) {
		$args['send'] = true;
	}		
	
	// change the label of the button on the From Computer tab
	if ( isset( $_POST['attachment_id'] ) && '' != $_POST["attachment_id"] ) {

		echo '
			<script type="text/javascript">
				function cmbGetParameterByNameInline(name) {
					name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
					var regexS = "[\\?&]" + name + "=([^&#]*)";
					var regex = new RegExp(regexS);
					var results = regex.exec(window.location.href);
					if(results == null)
						return "";
					else
						return decodeURIComponent(results[1].replace(/\+/g, " "));
				}
							
				jQuery(function($) {
					if (cmbGetParameterByNameInline("ale_force_send")=="true") {
						var ale_send_label = cmbGetParameterByNameInline("ale_send_label");
						$("td.savesend input").val(ale_send_label);
					}
				});
			</script>
		';
	}
	 
    return $args;

}


/**
 * Add metabox for Top level pages only
 */
function ale_metabox_add_for_top_level_posts_only( $display, $meta_box ) {

	if ( 'parent-id' !== $meta_box['show_on']['key'] )
		return $display;

	// Get the post's ID so we can see if it has ancestors					
	if( isset( $_GET['post'] ) ) $post_id = $_GET['post'];
	elseif( isset( $_POST['post_ID'] ) ) $post_id = $_POST['post_ID'];
	if( !isset( $post_id ) )
		return false;

	// If the post doesn't have ancestors, show the box
	if ( !get_post_ancestors( $post_id ) )
		return $display;
        // Otherwise, it's not a top level post, so don't show it
	else
		return false;
}
add_filter( 'ale_show_on', 'ale_metabox_add_for_top_level_posts_only', 10, 2 );

/**
 * Add metabox for ancestor pages
 */
function ale_metabox_add_for_ancestors_posts_only( $display, $meta_box ) {

	if ( 'ancestor' !== $meta_box['show_on']['key'] )
		return $display;

	// Get the post's ID so we can see if it has ancestors					
	if( isset( $_GET['post'] ) ) $post_id = $_GET['post'];
	elseif( isset( $_POST['post_ID'] ) ) $post_id = $_POST['post_ID'];
	if( !isset( $post_id ) )
		return false;
	
	$post = get_post($post_id);
	
	// If the post doesn't have ancestors, show the box
	if ($post->post_parent)
		return $display;
        // Otherwise, it's not a top level post, so don't show it
	else
		return false;
}
add_filter( 'ale_show_on', 'ale_metabox_add_for_ancestors_posts_only', 10, 2 );

function aletheme_metaboxes($meta_boxes) {
	$meta_boxes = array();


 $prefix = "ale_";

 //Home Page Metaboxes

     $meta_boxes[] = array(
        'id'         => 'home_metaboxes',
        'title'      => 'Home Page Settings',
        'pages'      => array( 'page', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        'show_on'    => array( 'key' => 'page-template', 'value' => array('templates/template-home.php'), ), // Specific post templates to display this metabox
        'fields' => array(
            array(
                'name' => __('Main Title', 'aletheme'),
                'desc' => __('Insert the title', 'aletheme'),
                'id'   => $prefix . 'main_title',
                'type' => 'text',
            ),
            array(
                'name' => __('Main Description', 'aletheme'),
                'desc' => __('Insert description', 'aletheme'),
                'id'   => $prefix . 'main_description',
                'type' => 'textarea',
            ),
            array(
                'name' => __('Button title', 'aletheme'),
                'desc' => __('Insert button title', 'aletheme'),
                'id'   => $prefix . 'main_button',
                'type' => 'text',
            ),
            array(
                'name' => __('File Upload', 'aletheme'),
                'desc' => __('Upload main photo', 'aletheme'),
                'id'   => $prefix . 'file_upload_main_photo',
                'type' => 'file',
            ),
            array(
                'name' => __('Welcome section title 1', 'aletheme'),
                'desc' => __('Insert your title', 'aletheme'),
                'id'   => $prefix . 'welcome_section_title_1',
                'type' => 'text',
            ),
            array(
                'name' => __('Welcome section title 2', 'aletheme'),
                'desc' => __('Insert your title', 'aletheme'),
                'id'   => $prefix . 'welcome_section_title_2',
                'type' => 'text',
            ),
            array(
                'name' => __('Welcome section description', 'aletheme'),
                'desc' => __('Insert your description', 'aletheme'),
                'id'   => $prefix . 'welcome_section_description',
                'type' => 'textarea',
            ),
            array(
                'name' => __('File Upload', 'aletheme'),
                'desc' => __('Upload icon 1', 'aletheme'),
                'id'   => $prefix . 'file_upload_icon_1',
                'type' => 'file',
            ),
             array(
                'name' => __('Icon title 1', 'aletheme'),
                'desc' => __('Insert icon title', 'aletheme'),
                'id'   => $prefix . 'icon_title_1',
                'type' => 'text',
            ),
            array(
                'name' => __('Icon description 1', 'aletheme'),
                'desc' => __('Insert icon description', 'aletheme'),
                'id'   => $prefix . 'icon_description_1',
                'type' => 'textarea',
            ),
            array(
                'name' => __('Button title', 'aletheme'),
                'desc' => __('Insert icon button title', 'aletheme'),
                'id'   => $prefix . 'icon_button_1',
                'type' => 'text',
            ),
            array(
                'name' => __('File Upload', 'aletheme'),
                'desc' => __('Upload icon 2', 'aletheme'),
                'id'   => $prefix . 'file_upload_icon_2',
                'type' => 'file',
            ),
             array(
                'name' => __('Icon title 2', 'aletheme'),
                'desc' => __('Insert icon title', 'aletheme'),
                'id'   => $prefix . 'icon_title_2',
                'type' => 'text',
            ),
            array(
                'name' => __('Icon description 2', 'aletheme'),
                'desc' => __('Insert icon description', 'aletheme'),
                'id'   => $prefix . 'icon_description_2',
                'type' => 'textarea',
            ),
            array(
                'name' => __('Button title', 'aletheme'),
                'desc' => __('Insert icon button title', 'aletheme'),
                'id'   => $prefix . 'icon_button_2',
                'type' => 'text',
            ),
            array(
                'name' => __('File Upload', 'aletheme'),
                'desc' => __('Upload icon 3', 'aletheme'),
                'id'   => $prefix . 'file_upload_icon_3',
                'type' => 'file',
            ),
             array(
                'name' => __('Icon title 3', 'aletheme'),
                'desc' => __('Insert icon title', 'aletheme'),
                'id'   => $prefix . 'icon_title_3',
                'type' => 'text',
            ),
            array(
                'name' => __('Icon description 3', 'aletheme'),
                'desc' => __('Insert icon description', 'aletheme'),
                'id'   => $prefix . 'icon_description_3',
                'type' => 'textarea',
            ),
            array(
                'name' => __('Button title', 'aletheme'),
                'desc' => __('Insert icon button title', 'aletheme'),
                'id'   => $prefix . 'icon_button_3',
                'type' => 'text',
            ),
             array(
                'name' => __('Have questions title', 'aletheme'),
                'desc' => __('Insert the title', 'aletheme'),
                'id'   => $prefix . 'have_questions_title',
                'type' => 'text',
            ),
             array(
                'name' => __('Button title', 'aletheme'),
                'desc' => __('Insert button title', 'aletheme'),
                'id'   => $prefix . 'have_questions_button',
                'type' => 'text',
            ),
             array(
                'name' => __('File Upload', 'aletheme'),
                'desc' => __('Have questions Section Background', 'aletheme'),
                'id'   => $prefix . 'file_upload_have_questions_background',
                'type' => 'file',
            ),
              array(
                'name' => __('People Section Title', 'aletheme'),
                'desc' => __('Insert the title', 'aletheme'),
                'id'   => $prefix . 'people_section_title',
                'type' => 'text',
            ),
            array(
                'name' => __('People Section Description', 'aletheme'),
                'desc' => __('Insert description', 'aletheme'),
                'id'   => $prefix . 'people_section_description',
                'type' => 'textarea',
            ),
            array(
                'name' => __('File Upload', 'aletheme'),
                'desc' => __('People item 1', 'aletheme'),
                'id'   => $prefix . 'file_upload_people_item_1',
                'type' => 'file',
            ),
            array(
                'name' => __('People Item Position 1', 'aletheme'),
                'desc' => __('Insert position', 'aletheme'),
                'id'   => $prefix . 'people_item_position_1',
                'type' => 'text',
            ),
            array(
                'name' => __('People Item Name 1', 'aletheme'),
                'desc' => __('Insert employee name', 'aletheme'),
                'id'   => $prefix . 'people_item_employee_name_1',
                'type' => 'text',
            ),
            array(
                'name' => __('People Item Facebook 1', 'aletheme'),
                'desc' => __('Insert employee facebook', 'aletheme'),
                'id'   => $prefix . 'people_item_facebook_1',
                'type' => 'text',
            ),
            array(
                'name' => __('People Item Twitter 1', 'aletheme'),
                'desc' => __('Insert employee twitter', 'aletheme'),
                'id'   => $prefix . 'people_item_twitter_1',
                'type' => 'text',
            ),
            array(
                'name' => __('People Item Instagram 1', 'aletheme'),
                'desc' => __('Insert employee instagram', 'aletheme'),
                'id'   => $prefix . 'people_item_instagram_1',
                'type' => 'text',
            ),
            array(
                'name' => __('People Item Pinterest 1', 'aletheme'),
                'desc' => __('Insert employee pinterest', 'aletheme'),
                'id'   => $prefix . 'people_item_pinterest_1',
                'type' => 'text',
            ),
            array(
                'name' => __('File Upload', 'aletheme'),
                'desc' => __('People item 2', 'aletheme'),
                'id'   => $prefix . 'file_upload_people_item_2',
                'type' => 'file',
            ),
            array(
                'name' => __('People Item Position 2', 'aletheme'),
                'desc' => __('Insert position', 'aletheme'),
                'id'   => $prefix . 'people_item_position_2',
                'type' => 'text',
            ),
            array(
                'name' => __('People Item Name 2', 'aletheme'),
                'desc' => __('Insert employee name', 'aletheme'),
                'id'   => $prefix . 'people_item_employee_name_2',
                'type' => 'text',
            ),
            array(
                'name' => __('People Item Facebook 2', 'aletheme'),
                'desc' => __('Insert employee facebook', 'aletheme'),
                'id'   => $prefix . 'people_item_facebook_2',
                'type' => 'text',
            ),
            array(
                'name' => __('People Item Twitter 2', 'aletheme'),
                'desc' => __('Insert employee twitter', 'aletheme'),
                'id'   => $prefix . 'people_item_twitter_2',
                'type' => 'text',
            ),
            array(
                'name' => __('People Item Instagram 2', 'aletheme'),
                'desc' => __('Insert employee instagram', 'aletheme'),
                'id'   => $prefix . 'people_item_instagram_2',
                'type' => 'text',
            ),
            array(
                'name' => __('People Item Pinterest 2', 'aletheme'),
                'desc' => __('Insert employee pinterest', 'aletheme'),
                'id'   => $prefix . 'people_item_pinterest_2',
                'type' => 'text',
            ),
            array(
                'name' => __('File Upload', 'aletheme'),
                'desc' => __('People item 3', 'aletheme'),
                'id'   => $prefix . 'file_upload_people_item_3',
                'type' => 'file',
            ),
            array(
                'name' => __('People Item Position 3', 'aletheme'),
                'desc' => __('Insert position', 'aletheme'),
                'id'   => $prefix . 'people_item_position_3',
                'type' => 'text',
            ),
            array(
                'name' => __('People Item Name 3', 'aletheme'),
                'desc' => __('Insert employee name', 'aletheme'),
                'id'   => $prefix . 'people_item_employee_name_3',
                'type' => 'text',
            ),
            array(
                'name' => __('People Item Facebook 3', 'aletheme'),
                'desc' => __('Insert employee facebook', 'aletheme'),
                'id'   => $prefix . 'people_item_facebook_3',
                'type' => 'text',
            ),
            array(
                'name' => __('People Item Twitter 3', 'aletheme'),
                'desc' => __('Insert employee twitter', 'aletheme'),
                'id'   => $prefix . 'people_item_twitter_3',
                'type' => 'text',
            ),
            array(
                'name' => __('People Item Instagram 3', 'aletheme'),
                'desc' => __('Insert employee instagram', 'aletheme'),
                'id'   => $prefix . 'people_item_instagram_3',
                'type' => 'text',
            ),
            array(
                'name' => __('People Item Pinterest 3', 'aletheme'),
                'desc' => __('Insert employee pinterest', 'aletheme'),
                'id'   => $prefix . 'people_item_pinterest_3',
                'type' => 'text',
            ),
            array(
                'name' => __('File Upload', 'aletheme'),
                'desc' => __('People item 4', 'aletheme'),
                'id'   => $prefix . 'file_upload_people_item_4',
                'type' => 'file',
            ),
            array(
                'name' => __('People Item Position 4', 'aletheme'),
                'desc' => __('Insert position', 'aletheme'),
                'id'   => $prefix . 'people_item_position_4',
                'type' => 'text',
            ),
            array(
                'name' => __('People Item Name 4', 'aletheme'),
                'desc' => __('Insert employee name', 'aletheme'),
                'id'   => $prefix . 'people_item_employee_name_4',
                'type' => 'text',
            ),
            array(
                'name' => __('People Item Facebook 4', 'aletheme'),
                'desc' => __('Insert employee facebook', 'aletheme'),
                'id'   => $prefix . 'people_item_facebook_4',
                'type' => 'text',
            ),
            array(
                'name' => __('People Item Twitter 4', 'aletheme'),
                'desc' => __('Insert employee twitter', 'aletheme'),
                'id'   => $prefix . 'people_item_twitter_4',
                'type' => 'text',
            ),
            array(
                'name' => __('People Item Instagram 4', 'aletheme'),
                'desc' => __('Insert employee instagram', 'aletheme'),
                'id'   => $prefix . 'people_item_instagram_4',
                'type' => 'text',
            ),
            array(
                'name' => __('People Item Pinterest 4', 'aletheme'),
                'desc' => __('Insert employee pinterest', 'aletheme'),
                'id'   => $prefix . 'people_item_pinterest_4',
                'type' => 'text',
            ),
            array(
                'name' => __('File Upload', 'aletheme'),
                'desc' => __('Brand icon 1', 'aletheme'),
                'id'   => $prefix . 'file_upload_brand_icon_1',
                'type' => 'file',
            ),
            array(
                'name' => __('File Upload', 'aletheme'),
                'desc' => __('Brand icon 2', 'aletheme'),
                'id'   => $prefix . 'file_upload_brand_icon_2',
                'type' => 'file',
            ),
            array(
                'name' => __('File Upload', 'aletheme'),
                'desc' => __('Brand icon 3', 'aletheme'),
                'id'   => $prefix . 'file_upload_brand_icon_3',
                'type' => 'file',
            ),
            array(
                'name' => __('File Upload', 'aletheme'),
                'desc' => __('Brand icon 4', 'aletheme'),
                'id'   => $prefix . 'file_upload_brand_icon_4',
                'type' => 'file',
            ),
            array(
                'name' => __('File Upload', 'aletheme'),
                'desc' => __('Brand icon 5', 'aletheme'),
                'id'   => $prefix . 'file_upload_brand_icon_5',
                'type' => 'file',
            ),
            array(
                'name' => __('File Upload', 'aletheme'),
                'desc' => __('Brand icon 6', 'aletheme'),
                'id'   => $prefix . 'file_upload_brand_icon_6',
                'type' => 'file',
            ),
            array(
                'name' => __('File Upload', 'aletheme'),
                'desc' => __('Brand icon 7', 'aletheme'),
                'id'   => $prefix . 'file_upload_brand_icon_7',
                'type' => 'file',
            ),
            array(
                'name' => __('Youtube title', 'aletheme'),
                'desc' => __('Insert youtube title', 'aletheme'),
                'id'   => $prefix . 'youtube_title',
                'type' => 'text',
            ),
            array(
                'name' => __('Youtube subtitle', 'aletheme'),
                'desc' => __('Insert youtube subtitle', 'aletheme'),
                'id'   => $prefix . 'youtube_subtitle',
                'type' => 'text',
            ),
            array(
                'name' => __('Youtube description', 'aletheme'),
                'desc' => __('Insert youtube description', 'aletheme'),
                'id'   => $prefix . 'youtube_description',
                'type' => 'textarea',
            ),
            array(
                'name' => __('Youtube content', 'aletheme'),
                'desc' => __('Insert youtube content', 'aletheme'),
                'id'   => $prefix . 'youtube_content',
                'type' => 'text',
            ),
            /*array(
                'name' => 'Text Date',
                'desc' => 'Insert the text',
                'id'   => $prefix . 'datefield',
                'type' => 'wysiwyg',
            ), */
        )
    );

//Post type Services Metaboxes
    
    $meta_boxes[] = array(
        'id'         => 'services_metaboxes',
        'title'      => 'Services Section Settings',
        'pages'      => array( 'Services' ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        
        'fields' => array(
            
            array(
                'name' => __('File Upload', 'aletheme'),
                'desc' => __('Service icon 1', 'aletheme'),
                'id'   => $prefix . 'file_upload_service_icon_1',
                'type' => 'file',
            ),
             array(
                'name' => __('Service icon title 1', 'aletheme'),
                'desc' => __('Insert service icon title', 'aletheme'),
                'id'   => $prefix . 'service_icon_title_1',
                'type' => 'text',
            ),
             array(
                'name' => __('File Upload', 'aletheme'),
                'desc' => __('Service icon 2', 'aletheme'),
                'id'   => $prefix . 'file_upload_service_icon_2',
                'type' => 'file',
            ),
             array(
                'name' => __('Service icon title 2', 'aletheme'),
                'desc' => __('Insert service icon title', 'aletheme'),
                'id'   => $prefix . 'service_icon_title_2',
                'type' => 'text',
            ),
             array(
                'name' => __('File Upload', 'aletheme'),
                'desc' => __('Service icon 3', 'aletheme'),
                'id'   => $prefix . 'file_upload_service_icon_3',
                'type' => 'file',
            ),
             array(
                'name' => __('Service icon title 3', 'aletheme'),
                'desc' => __('Insert service icon title', 'aletheme'),
                'id'   => $prefix . 'service_icon_title_3',
                'type' => 'text',
            ),
             array(
                'name' => __('File Upload', 'aletheme'),
                'desc' => __('Service icon 4', 'aletheme'),
                'id'   => $prefix . 'file_upload_service_icon_4',
                'type' => 'file',
            ),
             array(
                'name' => __('Service icon title 4', 'aletheme'),
                'desc' => __('Insert service icon title', 'aletheme'),
                'id'   => $prefix . 'service_icon_title_4',
                'type' => 'text',
            ),
             array(
                'name' => __('File Upload', 'aletheme'),
                'desc' => __('Service icon 5', 'aletheme'),
                'id'   => $prefix . 'file_upload_service_icon_5',
                'type' => 'file',
            ),
             array(
                'name' => __('Service icon title 5', 'aletheme'),
                'desc' => __('Insert service icon title', 'aletheme'),
                'id'   => $prefix . 'service_icon_title_5',
                'type' => 'text',
            ),
             array(
                'name' => __('File Upload', 'aletheme'),
                'desc' => __('Service icon 6', 'aletheme'),
                'id'   => $prefix . 'file_upload_service_icon_6',
                'type' => 'file',
            ),
             array(
                'name' => __('Service icon title 6', 'aletheme'),
                'desc' => __('Insert service icon title', 'aletheme'),
                'id'   => $prefix . 'service_icon_title_6',
                'type' => 'text',
            ),
        )
    );

//Page About Metaboxes
   
     $meta_boxes[] = array(
        'id'         => 'about_metaboxes',
        'title'      => 'About Page Settings',
        'pages'      => array( 'page', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        'show_on'    => array( 'key' => 'page-template', 'value' => array('templates/template-about.php'), ), // Specific post templates to display this metabox
        'fields' => array(
        	array(
                'name' => __('File Upload', 'aletheme'),
                'desc' => __('Upload main photo', 'aletheme'),
                'id'   => $prefix . 'file_upload_main_about_photo',
                'type' => 'file',
            ),
            array(
                'name' => __('Main Title', 'aletheme'),
                'desc' => __('Insert the title', 'aletheme'),
                'id'   => $prefix . 'main_about_title',
                'type' => 'text',
            ),
            array(
                'name' => __('Main Description', 'aletheme'),
                'desc' => __('Insert description', 'aletheme'),
                'id'   => $prefix . 'main_about_description',
                'type' => 'textarea',
            ),
            array(
                'name' => __('List 1', 'aletheme'),
                'desc' => __('Insert list 1', 'aletheme'),
                'id'   => $prefix . 'about_list1',
                'type' => 'text',
            ),array(
                'name' => __('List 2', 'aletheme'),
                'desc' => __('Insert list 2', 'aletheme'),
                'id'   => $prefix . 'about_list2',
                'type' => 'text',
            ),array(
                'name' => __('List 3', 'aletheme'),
                'desc' => __('Insert list 3', 'aletheme'),
                'id'   => $prefix . 'about_list3',
                'type' => 'text',
            ),array(
                'name' => __('List 4', 'aletheme'),
                'desc' => __('Insert list 4', 'aletheme'),
                'id'   => $prefix . 'about_list4',
                'type' => 'text',
            ),
            array(
                'name' => __('Button title', 'aletheme'),
                'desc' => __('Insert button title', 'aletheme'),
                'id'   => $prefix . 'about_button',
                'type' => 'text',
            ),
            array(
                'name' => __('File Upload', 'aletheme'),
                'desc' => __('Upload icon 1', 'aletheme'),
                'id'   => $prefix . 'file_upload_about_icon_1',
                'type' => 'file',
            ),
             array(
                'name' => __('Icon title 1', 'aletheme'),
                'desc' => __('Insert icon title', 'aletheme'),
                'id'   => $prefix . 'icon_about_title_1',
                'type' => 'text',
            ),
            array(
                'name' => __('Icon description 1', 'aletheme'),
                'desc' => __('Insert icon description', 'aletheme'),
                'id'   => $prefix . 'icon_about_description_1',
                'type' => 'textarea',
            ),
            array(
                'name' => __('File Upload', 'aletheme'),
                'desc' => __('Upload icon 2', 'aletheme'),
                'id'   => $prefix . 'file_upload_about_icon_2',
                'type' => 'file',
            ),
             array(
                'name' => __('Icon title 2', 'aletheme'),
                'desc' => __('Insert icon title', 'aletheme'),
                'id'   => $prefix . 'icon_about_title_2',
                'type' => 'text',
            ),
            array(
                'name' => __('Icon description 2', 'aletheme'),
                'desc' => __('Insert icon description', 'aletheme'),
                'id'   => $prefix . 'icon_about_description_2',
                'type' => 'textarea',
            ),
            array(
                'name' => __('File Upload', 'aletheme'),
                'desc' => __('Upload icon 3', 'aletheme'),
                'id'   => $prefix . 'file_upload_about_icon_3',
                'type' => 'file',
            ),
             array(
                'name' => __('Icon title 3', 'aletheme'),
                'desc' => __('Insert icon title', 'aletheme'),
                'id'   => $prefix . 'icon_about_title_3',
                'type' => 'text',
            ),
            array(
                'name' => __('Icon description 3', 'aletheme'),
                'desc' => __('Insert icon description', 'aletheme'),
                'id'   => $prefix . 'icon_about_description_3',
                'type' => 'textarea',
            ),
            array(
                'name' => __('File Upload', 'aletheme'),
                'desc' => __('Upload icon 4', 'aletheme'),
                'id'   => $prefix . 'file_upload_about_icon_4',
                'type' => 'file',
            ),
             array(
                'name' => __('Icon title 4', 'aletheme'),
                'desc' => __('Insert icon title', 'aletheme'),
                'id'   => $prefix . 'icon_about_title_4',
                'type' => 'text',
            ),
            array(
                'name' => __('Icon description 4', 'aletheme'),
                'desc' => __('Insert icon description', 'aletheme'),
                'id'   => $prefix . 'icon_about_description_4',
                'type' => 'textarea',
            ),
            array(
                'name' => __('Counter value 1', 'aletheme'),
                'desc' => __('Insert counter value 1', 'aletheme'),
                'id'   => $prefix . 'counter_value_1',
                'type' => 'text',
            ),
            array(
                'name' => __('Counter title 1', 'aletheme'),
                'desc' => __('Insert counter title 1', 'aletheme'),
                'id'   => $prefix . 'counter_title_1',
                'type' => 'text',
            ),
            array(
                'name' => __('Counter value 2', 'aletheme'),
                'desc' => __('Insert counter value 2', 'aletheme'),
                'id'   => $prefix . 'counter_value_2',
                'type' => 'text',
            ),
            array(
                'name' => __('Counter title 2', 'aletheme'),
                'desc' => __('Insert counter title 2', 'aletheme'),
                'id'   => $prefix . 'counter_title_2',
                'type' => 'text',
            ),
            array(
                'name' => __('Counter value 3', 'aletheme'),
                'desc' => __('Insert counter value 3', 'aletheme'),
                'id'   => $prefix . 'counter_value_3',
                'type' => 'text',
            ),
            array(
                'name' => __('Counter title 3', 'aletheme'),
                'desc' => __('Insert counter title 3', 'aletheme'),
                'id'   => $prefix . 'counter_title_3',
                'type' => 'text',
            ),
            array(
                'name' => __('Counter value 4', 'aletheme'),
                'desc' => __('Insert counter value 4', 'aletheme'),
                'id'   => $prefix . 'counter_value_4',
                'type' => 'text',
            ),
            array(
                'name' => __('Counter title 4', 'aletheme'),
                'desc' => __('Insert counter title 4', 'aletheme'),
                'id'   => $prefix . 'counter_title_4',
                'type' => 'text',
            ),
             array(
                'name' => __('FAQ section title', 'aletheme'),
                'desc' => __('Insert FAQ title', 'aletheme'),
                'id'   => $prefix . 'faq_title',
                'type' => 'text',
            ),
            array(
                'name' => __('FAQ section description', 'aletheme'),
                'desc' => __('Insert FAQ description', 'aletheme'),
                'id'   => $prefix . 'faq_description',
                'type' => 'textarea',
            ),
            array(
                'name' => __('FAQ section question 1', 'aletheme'),
                'desc' => __('Insert question 1', 'aletheme'),
                'id'   => $prefix . 'faq_question_1',
                'type' => 'text',
            ),
            array(
                'name' => __('FAQ section answer 1', 'aletheme'),
                'desc' => __('Insert answer 1', 'aletheme'),
                'id'   => $prefix . 'faq_answer_1',
                'type' => 'textarea',
            ),
            array(
                'name' => __('FAQ section question 2', 'aletheme'),
                'desc' => __('Insert question 2', 'aletheme'),
                'id'   => $prefix . 'faq_question_2',
                'type' => 'text',
            ),
            array(
                'name' => __('FAQ section answer 2', 'aletheme'),
                'desc' => __('Insert answer 2', 'aletheme'),
                'id'   => $prefix . 'faq_answer_2',
                'type' => 'textarea',
            ),
            array(
                'name' => __('FAQ section question 3', 'aletheme'),
                'desc' => __('Insert question 3', 'aletheme'),
                'id'   => $prefix . 'faq_question_3',
                'type' => 'text',
            ),
            array(
                'name' => __('FAQ section answer 3', 'aletheme'),
                'desc' => __('Insert answer 3', 'aletheme'),
                'id'   => $prefix . 'faq_answer_3',
                'type' => 'textarea',
            ),
            array(
                'name' => __('FAQ section question 4', 'aletheme'),
                'desc' => __('Insert question 4', 'aletheme'),
                'id'   => $prefix . 'faq_question_4',
                'type' => 'text',
            ),
            array(
                'name' => __('FAQ section answer 4', 'aletheme'),
                'desc' => __('Insert answer 4', 'aletheme'),
                'id'   => $prefix . 'faq_answer_4',
                'type' => 'textarea',
            ),
            array(
                'name' => __('FAQ section question 5', 'aletheme'),
                'desc' => __('Insert question 5', 'aletheme'),
                'id'   => $prefix . 'faq_question_5',
                'type' => 'text',
            ),
            array(
                'name' => __('FAQ section answer 5', 'aletheme'),
                'desc' => __('Insert answer 5', 'aletheme'),
                'id'   => $prefix . 'faq_answer_5',
                'type' => 'textarea',
            ),
            array(
                'name' => __('FAQ section question 6', 'aletheme'),
                'desc' => __('Insert question 6', 'aletheme'),
                'id'   => $prefix . 'faq_question_6',
                'type' => 'text',
            ),
            array(
                'name' => __('FAQ section answer 6', 'aletheme'),
                'desc' => __('Insert answer 6', 'aletheme'),
                'id'   => $prefix . 'faq_answer_6',
                'type' => 'textarea',
            ),
            array(
                'name' => __('FAQ section question 7', 'aletheme'),
                'desc' => __('Insert question 7', 'aletheme'),
                'id'   => $prefix . 'faq_question_7',
                'type' => 'text',
            ),
            array(
                'name' => __('FAQ section answer 7', 'aletheme'),
                'desc' => __('Insert answer 7', 'aletheme'),
                'id'   => $prefix . 'faq_answer_7',
                'type' => 'textarea',
            ),
            array(
                'name' => __('FAQ section question 8', 'aletheme'),
                'desc' => __('Insert question 8', 'aletheme'),
                'id'   => $prefix . 'faq_question_8',
                'type' => 'text',
            ),
            array(
                'name' => __('FAQ section answer 8', 'aletheme'),
                'desc' => __('Insert answer 8', 'aletheme'),
                'id'   => $prefix . 'faq_answer_8',
                'type' => 'textarea',
            ),
        )
    ); 

//Page Contact Metaboxes
   
     $meta_boxes[] = array(
        'id'         => 'about_metaboxes',
        'title'      => 'Contact Page Settings',
        'pages'      => array( 'page', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        'show_on'    => array( 'key' => 'page-template', 'value' => array('templates/template-contact.php'), ), // Specific post templates to display this metabox
        'fields' => array(
        	array(
                'name' => __('Contact title', 'aletheme'),
                'desc' => __('Insert contact title', 'aletheme'),
                'id'   => $prefix . 'contact_title',
                'type' => 'text',
            ),
            array(
                'name' => __('Contact description', 'aletheme'),
                'desc' => __('Insert contact description', 'aletheme'),
                'id'   => $prefix . 'contact_description',
                'type' => 'textarea',
            ),
            array(
                'name' => __('Address section title', 'aletheme'),
                'desc' => __('Insert address section title', 'aletheme'),
                'id'   => $prefix . 'address_section_title',
                'type' => 'text',
            ),
            array(
                'name' => __('Address section description', 'aletheme'),
                'desc' => __('Insert address section description', 'aletheme'),
                'id'   => $prefix . 'address_section_description',
                'type' => 'textarea',
            ),
            array(
                'name' => __('Phone', 'aletheme'),
                'desc' => __('Insert store phone', 'aletheme'),
                'id'   => $prefix . 'store_phone',
                'type' => 'text',
            ),
            array(
                'name' => __('Email', 'aletheme'),
                'desc' => __('Insert store email', 'aletheme'),
                'id'   => $prefix . 'store_email',
                'type' => 'text',
            ),
            array(
                'name' => __('Address', 'aletheme'),
                'desc' => __('Insert store address', 'aletheme'),
                'id'   => $prefix . 'store_address',
                'type' => 'text',
            ),
            array(
                'name' => __('Map', 'aletheme'),
                'desc' => __('Insert map code here', 'aletheme'),
                'id'   => $prefix . 'store_map',
                'type' => 'textarea',
            ),
        )
    );

    
    //Post type Breadcrumbs Metaboxes
    
    $meta_boxes[] = array(
        'id'         => 'breadcrumbs_metaboxes',
        'title'      => 'Breadcrumbs Settings',
        'pages'      => array( 'Breadcrumbs' ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => __('File Upload', 'aletheme'),
                'desc' => __('Shop page breadcrumbs image', 'aletheme'),
                'id'   => $prefix . 'shop_breadcrumbs',
                'type' => 'file',
            ),
            array(
                'name' => __('File Upload', 'aletheme'),
                'desc' => __('Blog page breadcrumbs image', 'aletheme'),
                'id'   => $prefix . 'blog_breadcrumbs',
                'type' => 'file',
            ),
            array(
                'name' => __('File Upload', 'aletheme'),
                'desc' => __('About page breadcrumbs image', 'aletheme'),
                'id'   => $prefix . 'about_breadcrumbs',
                'type' => 'file',
            ),
            array(
                'name' => __('File Upload', 'aletheme'),
                'desc' => __('Contact page breadcrumbs image', 'aletheme'),
                'id'   => $prefix . 'contact_breadcrumbs',
                'type' => 'file',
            ),
            array(
                'name' => __('File Upload', 'aletheme'),
                'desc' => __('Content-page breadcrumbs image', 'aletheme'),
                'id'   => $prefix . 'content_page_breadcrumbs',
                'type' => 'file',
            ),
            array(
                'name' => __('File Upload', 'aletheme'),
                'desc' => __('Content breadcrumbs image', 'aletheme'),
                'id'   => $prefix . 'content_breadcrumbs',
                'type' => 'file',
            ),
            array(
                'name' => __('File Upload', 'aletheme'),
                'desc' => __('Content-search breadcrumbs image', 'aletheme'),
                'id'   => $prefix . 'content_search_breadcrumbs',
                'type' => 'file',
            ),
        )
    );
     
return $meta_boxes;
}