<?php
/**
 * Created by PhpStorm.
 * User: mdiaconita
 * Date: 06/06/2017
 * Time: 19:09
 */

function profile_single_page_box($post)
{
    $position = get_post_meta($post->ID, 'profile_single_position', true);
    $publications = get_post_meta($post->ID, 'profile_single_publications', true);
    $current_research_students = get_post_meta($post->ID, 'profile_single_current_research_students', true);
    $completed_research_students = get_post_meta($post->ID, 'profile_single_completed_research_students', true);
    $research_projects = get_post_meta($post->ID, 'profile_single_research_projects', true);

    $args = array(
        'media_buttons' => false,
        'textarea_rows' => 3,
        'tinymce' => false,
        'quicktags' => array('buttons' => 'strong,em,ul,ol,li,link'),
        'wpautop' => false
    );
    wp_nonce_field(basename(__FILE__), 'profile_single_receipt_content_nonce');
    ?>
    <table class="profile-page-table">
        <tbody>
        <tr>
            <th style="width:20%">
                <label for="profile_single_publications">Position</label>
            </th>
            <td>
                <?php wp_editor($publications, 'profile_single_publications', $args); ?>
                <p>The text entered here will appear in the user profile.</p>
            </td>
        </tr>
        <tr>
            <th style="width:20%">
                <label for="profile_single_publications">Publications</label>
            </th>
            <td>
                <?php wp_editor($publications, 'profile_single_publications', $args); ?>
                <p>The text entered here will appear in the user profile.</p>
            </td>
        </tr>
        <tr>
            <th style="width:20%">
                <label for="profile_single_current_research_students">Current Research Students</label>
            </th>
            <td>
                <?php wp_editor($current_research_students, 'profile_single_current_research_students', $args); ?>
                <p>The text entered here will appear in the user profile.</p>
            </td>
        </tr>
        <tr>
            <th style="width:20%">
                <label for="profile_single_completed_research_students">Completed Research Students</label>
            </th>
            <td>
                <?php wp_editor($completed_research_students, 'profile_single_completed_research_students', $args); ?>
                <p>The text entered here will appear in the user profile.</p>
            </td>
        </tr>
        <tr>
            <th style="width:20%">
                <label for="profile_single_research_projects">Research Projects</label>
            </th>
            <td>
                <?php wp_editor($research_projects, 'profile_single_research_projects', $args); ?>
                <p>The text entered here will appear in the user profile.</p>
            </td>
        </tr>
        </tbody>
    </table>
    <?php
}

function profile_single_meta_box_save($post_id)
{
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
    if (isset($_POST['profile_single_publications'])) {
        update_post_meta($post_id, 'profile_single_publications', wp_kses($_POST['profile_single_publications'], $allowed));
    }
    if (isset($_POST['profile_single_current_research_students'])) {
        update_post_meta($post_id, 'profile_single_current_research_students', wp_kses($_POST['profile_single_current_research_students'], $allowed));
    }
    if (isset($_POST['profile_single_completed_research_students'])) {
        update_post_meta($post_id, 'profile_single_completed_research_students', wp_kses($_POST['profile_single_completed_research_students'], $allowed));
    }
    if (isset($_POST['profile_single_research_projects'])) {
        update_post_meta($post_id, 'profile_single_research_projects', esc_html($_POST['profile_single_research_projects']));
    }
}