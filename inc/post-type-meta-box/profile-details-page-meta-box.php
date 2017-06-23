<?php
/**
 * ------------------ CONTENTS ---------------------------
 * User: mdiaconita
 * 1. Define the inputs and their label
 * 2. Textarea arguments
 * 3. Generate input fields
 * 4. Loop through array and create a get_post_meta for each element
 * 5. Field names
 * 6. HTML start table
 * 7. HTML end table
 * 8. Generate meta box for user profiles
 * 9. Save user profile meta box
 */

function profile_define_input_type_label_meta()
{
    return $arr_inputs = array(
        'user_profile_position' => array('Title detail', 'text'),
        'user_profile_contact' => array('Email address', 'text'),
        /** --------------------------------------------------------------- */
        'user_profile_extra_headline' => array('Profile banner 1 title', 'text'),
        'user_profile_extra' => array('Profile banner 1 content', 'textarea'),
        /** --------------------------------------------------------------- */
        'user_profile_extra_two_headline' => array('Profile banner 2 title', 'text'),
        'user_profile_extra_two' => array('Profile banner 2 content', 'textarea'),
        /** --------------------------------------------------------------- */
        'user_profile_extra_three_headline' => array('Profile banner 3 title', 'text'),
        'user_profile_extra_three' => array('Profile banner 3 content', 'textarea'),
        /** --------------------------------------------------------------- */
        'user_profile_extra_four_headline' => array('Profile banner 4 title', 'text'),
        'user_profile_extra_four' => array('Profile banner 4 content', 'textarea')
    );
}

/**
 * ------------------ CONTENTS ---------------------------
 * User: mdiaconita
 * 2. Textarea arguments
 */
function profile_textarea_arguments()
{
    return $args = array(
        'media_buttons' => false,
        'textarea_rows' => 3,
        'tinymce' => false,
        'quicktags' => array('buttons' => 'strong,em,ul,ol,li,link'),
        'wpautop' => false
    );
}

/**
 * 3. Generate input fields
 * @param $input_type
 * @param $meta
 * @param $arg
 * @return string
 */
function profile_generate_input($input_type, $meta, $arg)
{
    if ($input_type == 'text' || $input_type == 'tel' || $input_type == 'email') {
        echo '<tr>',
        '<th style="width:20%; text-align:left">',
            '<label for="' . $meta[1] . '">' . $meta[2] . '</label>',
        '</th>',
        '<td>',
            '<input style="margin:10px 0 10px 0; width:100%;" type="' . $input_type . '" name="' . $meta[1] . '" id="' . $meta[1] . '" value="' . $meta[0] . '"/>',
        '</td>',
        '</tr>';
    } elseif ($input_type == 'textarea') {
        if (function_exists('wp_editor')) {
            echo '<tr>',
            '<th style="width:20%; text-align:left;">',
                '<label for="' . $meta[1] . '">' . $meta[2] . '</label>',
            '</th>',
            '<td>';
            wp_editor($meta[0], $meta[1], $arg);
            echo '</td>',
            '</tr>';
        }
    }
}

/**
 * 4. Loop through array and create a get_post_meta for each element
 * @param $arr
 * @return array|string
 */
function profile_generate_post_meta($arr)
{
    global $post;
    foreach ($arr as $key => $meta) {
        if (function_exists('get_post_meta')) {
            return $array = array(
                ${$key} = get_post_meta($post->ID, $key, true),
                $key,
                $meta
            );
        }
    }
}


/**
 * 5. Field names
 * @param $key
 * @param $value
 * @return array
 */
function profile_field_names($key, $value)
{
    return $fields_post_meta = array($key => $value);
}


/**
 * 6. HTML start table
 * @param $class
 * @return string
 */
function profile_start_table($class)
{
    return '<table class="' . $class . '"><tbody>';
}


/**
 * 7. HTML end table
 * @return string
 */
function profile_end_table()
{
    return '</tbody></table>';
}

/**
 * 8. Generate meta box for user profiles
 */
function profile_single_page_meta_box()
{
    if (function_exists('wp_nonce_field')) {
        wp_nonce_field(basename(__FILE__), 'profile_single_receipt_content_nonce');

        echo profile_start_table('profile-page-table');
        foreach (profile_define_input_type_label_meta() as $key => $inputs) {
            if ($inputs[1] == 'text') {
                profile_generate_input($inputs[1], profile_generate_post_meta(profile_field_names($key, $inputs[0])), '');
            } elseif ($inputs[1] == 'textarea') {
                profile_generate_input($inputs[1], profile_generate_post_meta(profile_field_names($key, $inputs[0])), profile_textarea_arguments());
            }
        }
        echo profile_end_table();
    }
}

/**
 * 9. Save user profile meta box
 * @param $post_id
 */
function profile_single_meta_box_save($post_id)
{
    if (function_exists('update_post_meta') && function_exists('wp_kses') && function_exists('wp_verify_nonce') && function_exists('wp_is_post_autosave') && function_exists('wp_is_post_revision')) {

        $is_autosave = wp_is_post_autosave($post_id);
        $is_revision = wp_is_post_revision($post_id);

        $is_valid_cf_receipt_email_nonce = (isset($_POST['profile_page_receipt_content_nonce']) && wp_verify_nonce($_POST['profile_single_receipt_content_nonce'], basename(__FILE__))) ? 'true' : 'false';
        $is_valid_cf_get_tna_email_nonce = (isset($_POST['profile_page_receipt_content_nonce']) && wp_verify_nonce($_POST['profile_single_receipt_content_nonce'], basename(__FILE__))) ? 'true' : 'false';
        if ($is_autosave || $is_revision || !$is_valid_cf_receipt_email_nonce || !$is_valid_cf_get_tna_email_nonce) {
            return;
        }
        $allowed = array(
            'a' => array(
                'href' => array(),
                'title' => array()
            ),
            'br' => array(),
            'em' => array(),
            'strong' => array(),
            'p' => array(),
            'ul' => array(),
            'li' => array(),
            'ol' => array()
        );
        foreach (profile_define_input_type_label_meta() as $key => $post_meta) {
            if (isset($_POST[$key])) {
                update_post_meta($post_id, $key, wp_kses($_POST[$key], $allowed));
            }
        }
    }
}