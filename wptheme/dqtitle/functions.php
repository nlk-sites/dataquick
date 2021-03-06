<?php
/**
 * DQTitle functions and definitions
 *
 * @package DQTitle
 * @subpackage DQTitle
 * @since DQTitle 1.0
 */

add_action( 'after_setup_theme', 'dqtitle_setup', 99 );

if ( ! function_exists( 'dqtitle_setup' ) ):
function dqtitle_setup() {
	// remove unneeded menu locations from the main DQ theme
	unregister_nav_menu('industry');
	unregister_nav_menu('products');
	unregister_nav_menu('about');
	// add our own couple menu locations
	register_nav_menus( array(
		'main' => 'Main Menu',
		'bottombar' => 'Bottom Bar',
	));
	
	remove_filter('body_class','dq_bodyclass');
	add_filter('body_class','dqtitle_bodyclass');
}
endif;

function dqtitle_bodyclass($classes) {
	if ( is_page() ) {
		global $post;
		if(is_page_template('dqrels.php')) {
			$classes[] = 'rels';
			if(is_page(7)) $classes[] = 'lend';
		} elseif(is_page_template('dqdirect.php')) {
			$classes[] = 'dir';
		} elseif(!is_page_template('dqhome.php')) {
			$classes[] = 'cus';
			if ( is_page(array('title-products','industry-solutions')) ) $classes[] = 'title';
			if ( is_page(array('closings','products')) ) $classes[] = 'closings';
			if ( is_page('other') ) $classes[] = 'other';
		}
	} else {
		if(!is_home() && (is_category('companynews') || in_category('companynews') || is_search())) {
			$classes[] = 'col3';
			$classes[] = 'abt';
		} elseif(is_archive() || is_home() || is_single()) $classes[] = 'blog';
			
	}
	return $classes;
}


/**
* Better Pre-submission Confirmation
* http://gravitywiz.com/2012/08/04/better-pre-submission-confirmation/
*/
 
class GWPreviewConfirmation {
 
    private static $lead;
 
    function init() {
 
        add_filter('gform_pre_render', array('GWPreviewConfirmation', 'replace_merge_tags'));
        add_filter('gform_replace_merge_tags', array('GWPreviewConfirmation', 'product_summary_merge_tag'), 10, 3);
 
    }
 
    public static function replace_merge_tags($form) {
 
        $current_page = isset(GFFormDisplay::$submission[$form['id']]) ? GFFormDisplay::$submission[$form['id']]['page_number'] : 1;
        $fields = array();
 
        // get all HTML fields on the current page
        foreach($form['fields'] as &$field) {
 
            // skip all fields on the first page
            if(rgar($field, 'pageNumber') <= 1)
                continue;
 
            $default_value = rgar($field, 'defaultValue');
            preg_match_all('/{.+}/', $default_value, $matches, PREG_SET_ORDER);
            if(!empty($matches)) {
                // if default value needs to be replaced but is not on current page, wait until on the current page to replace it
                if(rgar($field, 'pageNumber') != $current_page) {
                    $field['defaultValue'] = '';
                } else {
                    $field['defaultValue'] = self::preview_replace_variables($default_value, $form);
                }
            }
 
            // only run 'content' filter for fields on the current page
            if(rgar($field, 'pageNumber') != $current_page)
                continue;
 
            $html_content = rgar($field, 'content');
            preg_match_all('/{.+}/', $html_content, $matches, PREG_SET_ORDER);
            if(!empty($matches)) {
                $field['content'] = self::preview_replace_variables($html_content, $form);
            }
 
        }
 
        return $form;
    }
 
    /**
    * Adds special support for file upload, post image and multi input merge tags.
    */
    public static function preview_special_merge_tags($value, $input_id, $merge_tag, $field) {
 
        $input_type = RGFormsModel::get_input_type($field);
        
        $is_upload_field = in_array( $input_type, array('post_image', 'fileupload') );
        $is_multi_input = is_array( rgar($field, 'inputs') );
        $is_input = intval( $input_id ) != $input_id;
        
        if( !$is_upload_field && !$is_multi_input )
            return $value;
 
        // if is individual input of multi-input field, return just that input value
        if( $is_input )
            return $value;
            
        $form = RGFormsModel::get_form_meta($field['formId']);
        $lead = self::create_lead($form);
        $currency = GFCommon::get_currency();
 
        if(is_array(rgar($field, 'inputs'))) {
            $value = RGFormsModel::get_lead_field_value($lead, $field);
            return GFCommon::get_lead_field_display($field, $value, $currency);
        }
 
        switch($input_type) {
        case 'fileupload':
            $value = self::preview_image_value("input_{$field['id']}", $field, $form, $lead);
            $value = self::preview_image_display($field, $form, $value);
            break;
        default:
            $value = self::preview_image_value("input_{$field['id']}", $field, $form, $lead);
            $value = GFCommon::get_lead_field_display($field, $value, $currency);
            break;
        }
 
        return $value;
    }
 
    public static function preview_image_value($input_name, $field, $form, $lead) {
 
        $field_id = $field['id'];
        $file_info = RGFormsModel::get_temp_filename($form['id'], $input_name);
        $source = RGFormsModel::get_upload_url($form['id']) . "/tmp/" . $file_info["temp_filename"];
 
        if(!$file_info)
            return '';
 
        switch(RGFormsModel::get_input_type($field)){
 
            case "post_image":
                list(,$image_title, $image_caption, $image_description) = explode("|:|", $lead[$field['id']]);
                $value = !empty($source) ? $source . "|:|" . $image_title . "|:|" . $image_caption . "|:|" . $image_description : "";
                break;
 
            case "fileupload" :
                $value = $source;
                break;
 
        }
 
        return $value;
    }
 
    public static function preview_image_display($field, $form, $value) {
 
        // need to get the tmp $file_info to retrieve real uploaded filename, otherwise will display ugly tmp name
        $input_name = "input_" . str_replace('.', '_', $field['id']);
        $file_info = RGFormsModel::get_temp_filename($form['id'], $input_name);
 
        $file_path = $value;
        if(!empty($file_path)){
            $file_path = esc_attr(str_replace(" ", "%20", $file_path));
            $value = "<a href='$file_path' target='_blank' title='" . __("Click to view", "gravityforms") . "'>" . $file_info['uploaded_filename'] . "</a>";
        }
        return $value;
 
    }
 
    /**
    * Retrieves $lead object from class if it has already been created; otherwise creates a new $lead object.
    */
    public static function create_lead($form) {
        $lead =!empty(self::$lead) ? self::$lead : RGFormsModel::create_lead($form);
        self::$lead = $lead;
        return $lead;
    }
 
    public static function preview_replace_variables($content, $form) {
 
        $lead = self::create_lead($form);
 
        // add filter that will handle getting temporary URLs for file uploads and post image fields (removed below)
        // beware, the RGFormsModel::create_lead() function also triggers the gform_merge_tag_filter at some point and will
        // result in an infinite loop if not called first above
        add_filter('gform_merge_tag_filter', array('GWPreviewConfirmation', 'preview_special_merge_tags'), 10, 4);
 
        $content = GFCommon::replace_variables($content, $form, $lead, false, false, false);
 
        // remove filter so this function is not applied after preview functionality is complete
        remove_filter('gform_merge_tag_filter', array('GWPreviewConfirmation', 'preview_special_merge_tags'));
 
        return $content;
    }
 
    public static function product_summary_merge_tag($text, $form, $lead) {
 
        if(empty($lead))
            $lead = self::create_lead($form);
 
        $remove = array("<tr bgcolor=\"#EAF2FA\">\n                            <td colspan=\"2\">\n                                <font style=\"font-family: sans-serif; font-size:12px;\"><strong>Order</strong></font>\n                            </td>\n                       </tr>\n                       <tr bgcolor=\"#FFFFFF\">\n                            <td width=\"20\">&nbsp;</td>\n                            <td>\n                                ", "\n                            </td>\n                        </tr>");
        $product_summary = str_replace($remove, '', GFCommon::get_submitted_pricing_fields($form, $lead, 'html'));
 
        return str_replace('{product_summary}', $product_summary, $text);
    }
 
}


// - - - - - GRAVITY FORMS MODS - - - - - //

// Creating custom post action to send XML to rels gofer
GWPreviewConfirmation::init();
// gravity forms secondary post script
add_action("gform_post_submission", "set_post_content", 10, 2);
function set_post_content( $entry, $form ) {
    // Gravity Forms has validated the data
    $message = null;

    /* Testing and debugging...
    $message = print_r($entry, true);
    $message = wordwrap($message, 70);
    */

    // Custom Form action, returns formatted XML as $xml var
    if($form['id'] == 1) {
        require('dqtitleformxml.php'); // located in "wp-content/themes/dqtitle/"
        //$message .= $xml;
        include('office_info_array.php');
        include('dqtitle_emailconfirm.php'); // let's add the confirmation email
    }
    
    // gofer login info
    $username = 'gofer';
    $password = 'f8stg0f3r';

    /* * * * * * CHANGE $sendto FOR PRODUCTION * * * * * */
    // Test site...
    $sendto = 'https://test.webservices.dataquick.com/gofer/receiver.aspx';
    // Production site...
    //$sendto = "https://webservices.dataquick.com/gofer/receiver.aspx";

    //begin curl submit
    if ( isset($sendto) ):
        $ch = curl_init($sendto);
        //$fp = fopen("xml_file.txt", "w");
        //curl_setopt($ch, CURLOPT_MUTE, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        $output = curl_exec($ch);
        $result = print_r(curl_getinfo($ch), true);
        //fwrite($fp, $output);
        curl_close($ch);
        //fclose($fp);
        $resultant = 'cURL Result: ' . $result . "\n\r\n\r" . 'Gofer Response: ' . $output . "\n\r\n\r" . 'Submitted XML: ' . $xml;
    endif;
    // end curl

    // Send email for debugging purposes -> COMMENT OUT FOR PRODUCTION
    //mail($entry['7'], 'DQTitle PlaceOrder debug (RTW' . ( 20000000 + $entry['id'] ) . ')', $resultant);
    // Production email confirmation send...
    mail($entry['7'], $subject, $body, $headers);
}

// Delete any posts to database so information is not stored
// fire the action for all forms
// add_action( 'gform_post_submission', 'my_remove_entries', 10, 2 );
// to only fire the action for a specific form (form ID 1)...
add_action( 'gform_post_submission_2', 'my_remove_entries', 10, 2 );
function my_remove_entries( $entry, $form ) {
        global $wpdb;
        $lead_id                = $entry['id'];
        $lead_table             = RGFormsModel::get_lead_table_name();
        $lead_notes_table       = RGFormsModel::get_lead_notes_table_name();
        $lead_detail_table      = RGFormsModel::get_lead_details_table_name();
        $lead_detail_long_table = RGFormsModel::get_lead_details_long_table_name();
        // Delete from detail long
        $sql = $wpdb->prepare( " DELETE FROM $lead_detail_long_table
                                    WHERE lead_detail_id IN
                                    (SELECT id FROM $lead_detail_table WHERE lead_id=%d)", $lead_id );
        $wpdb->query( $sql );
        // Delete from lead details
        $sql = $wpdb->prepare( "DELETE FROM $lead_detail_table WHERE lead_id=%d", $lead_id );
        $wpdb->query( $sql );
        // Delete from lead notes
        $sql = $wpdb->prepare( "DELETE FROM $lead_notes_table WHERE lead_id=%d", $lead_id );
        $wpdb->query( $sql );
        // Delete from lead
        $sql = $wpdb->prepare( "DELETE FROM $lead_table WHERE id=%d", $lead_id );
        $wpdb->query( $sql );
}


// Custom action to display Selected Office of page 3 of place order form (form ID 1)
add_filter("gform_pre_render_2", "populate_html");
function populate_html($form)
{
    $current_page = GFFormDisplay::get_current_page($form["id"]);
    $html_content = null;
    $ss = null;
    $so = null;
    if ($current_page == 3)
    {
        foreach($form["fields"] as &$field)
        {
            // Select a State
            if ($field["id"] == 1)
            {    
            //get the label and then get the posted data for the field (this works for simple fields only - not the field groups like name and address)
                $ss = rgpost('input_' . $field['id']); // selected state
            }
            //select office from range of input options
            if ($field["id"] >= 51 && $field["id"] <= 89 && $field["id"] != 85)
            {    
                $so .= rgpost('input_' . $field['id']); // selected office
            }
        }
        // outside of loop

        // This generates the HTML to be displayed on confirmation page
        require('office_info_array.php');

        // if office exists in array
        if ($o_array[$ss][$so]) {
            $html_content = '<ul class="gform_fields left_label description_below"><!-- Office Info --><li class="gfield gsection fieldset-top"><h2 class="gsection_title">Selected Office</h2></li>';
            $html_content .= '<li class="gfield fieldset"><label class="gfield_label">Selected Office</label><div class="ginput_container">' . $ss . ' ' . $so . '</div></li>';
            //address section
            $html_content .= '<li class="gfield fieldset"><label class="gfield_label" style="min-height:60px;">Office Address</label><div class="ginput_container" style="min-height:60px;">';
            $html_content .= $o_array[$ss][$so]['address'] . "<br />" . $o_array[$ss][$so]['address2'] . "<br />" . $o_array[$ss][$so]['city'] . ", " . $o_array[$ss][$so]['state'] . " " . $o_array[$ss][$so]['zip'];
            $html_content .= '</div></li>';
            //phone and fax sections
            $html_content .= '<li class="gfield fieldset"><label class="gfield_label">Office Phone</label><div class="ginput_container">' . $o_array[$ss][$so]['phone'] . '</div></li>';
            $html_content .= '<li class="gfield fieldset"><label class="gfield_label">Office Fax</label><div class="ginput_container">' . $o_array[$ss][$so]['fax'] . '</div></li>';
            // email section
            $html_content .= '<li class="gfield fieldset-bottom"><label class="gfield_label">Office Email</label><div class="ginput_container">' . $o_array[$ss][$so]['email'] . '</div></li>';
            $html_content .= '</ul>';
        }

        //loop back through form fields to get html field (id 3 on my form) that we are populating with the data gathered above
        foreach($form["fields"] as &$field)
        {
            //get html field
            if ($field["id"] == 127)
            {
                //set the field content to the html
                $field["content"] = $html_content;
            }
        }
    }
    //return altered form so changes are displayed
    return $form;       
}
