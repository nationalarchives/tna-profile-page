<?php

/**
 * User: mdiaconita
 */
class ProfilePageFunctionsTest extends \PHPUnit_Framework_TestCase
{
    public function testEnqueue_profile_page_stylesExists(){
        $this->assertTrue(function_exists('enqueue_profile_page_styles'));
    }
    public function testEnqueue_profile_page_scriptsExists(){
        $this->assertTrue(function_exists('enqueue_profile_page_scripts'));
    }

    public function testCheck_if_shortcode_exists_in_page_and_add_meta_boxExists(){
        $this->assertTrue(function_exists('check_if_shortcode_exists_in_page_and_add_meta_box'));
    }

    public function testProfile_page_shortcodeExists(){
        $this->assertTrue(function_exists('profile_page_shortcode'));
    }

    public function testGet_cat_profileExists(){
        $this->assertTrue(function_exists('get_cat_profile'));
    }

    public function testProfile_page_single_templateExists(){
        $this->assertTrue(function_exists('profile_page_single_template'));
    }

    public function testProfile_feature_imageExists(){
        $this->assertTrue(function_exists('profile_feature_image'));
    }

    public function testGuard_functions_existExists(){
        $this->assertTrue(function_exists('guard_functions_exist'));
    }

    public function testProfile_landing_blurbsExists(){
        $this->assertTrue(function_exists('profile_landing_blurbs'));
    }

    public function testProfile_landing_cardsExists(){
        $this->assertTrue(function_exists('profile_landing_cards'));
    }

    public function testPost_type_profile_page_initExists(){
        $this->assertTrue(function_exists('post_type_profile_page_init'));
    }

    public function testProfile_define_input_type_label_metaExists(){
        $this->assertTrue(function_exists('profile_define_input_type_label_meta'));
    }

    public function testprofile_textarea_argumentsExists(){
        $this->assertTrue(function_exists('profile_textarea_arguments'));
    }

    public function testProfile_generate_inputExists(){
        $this->assertTrue(function_exists('profile_generate_input'));
    }

    public function testProfile_generate_post_metaExists(){
        $this->assertTrue(function_exists('profile_generate_post_meta'));
    }

    public function testProfile_field_namesExists(){
        $this->assertTrue(function_exists('profile_field_names'));
    }

    public function testProfile_start_tableExists(){
        $this->assertTrue(function_exists('profile_start_table'));
    }

    public function testProfile_end_tableExists(){
        $this->assertTrue(function_exists('profile_end_table'));
    }

    public function testProfile_single_page_meta_boxExists(){
        $this->assertTrue(function_exists('profile_single_page_meta_box'));
    }

    public function testProfile_single_meta_box_saveExists(){
        $this->assertTrue(function_exists('profile_single_meta_box_save'));
    }

    public function testProfile_single_page_contentExists(){
        $this->assertTrue(function_exists('profile_single_page_content'));
    }

    public function testProfile_generate_extra_blurbExists(){
        $this->assertTrue(function_exists('profile_generate_extra_blurb'));
    }

    public function testProfile_landing_page_boxExists(){
        $this->assertTrue(function_exists('profile_landing_page_box'));
    }

    public function testProfile_page_meta_box_saveExists(){
        $this->assertTrue(function_exists('profile_page_meta_box_save'));
    }
}