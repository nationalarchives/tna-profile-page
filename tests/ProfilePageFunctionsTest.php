<?php

/**
 * User: mdiaconita
 */
class ProfilePageFunctionsTest extends \PHPUnit_Framework_TestCase
{
    public function testTest()
    {
        $this->assertTrue(true);
    }

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
}