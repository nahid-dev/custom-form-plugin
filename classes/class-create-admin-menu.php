<?php

// This file will create admin menu page

class MNWP_Create_Admin_Page
{

    public function __construct()
    {
        add_action('admin_menu', [$this, 'create_admin_menu']);
    }

    public function create_admin_menu()
    {
        $capability = 'manage_options';
        $slug = 'work_settings';

        add_menu_page(
            __('My New Form', 'my-new-form'),
            __('My New Form', 'my-new-form'),
            $capability,
            $slug,
            [$this, 'menu_page_template'],
            'dashicons-buddicons-replies'
        );
    }

    public function menu_page_template()
    {
        echo '<div class="wrap"><div id="mwf-admin-app"></div></div>';
    }
}

new MNWP_Create_Admin_Page();
