<?php

// This file create custom rest api end points

class WP_React_Setting_Rest_Route
{

    public function __construct()
    {
        add_action('rest_api_init', [$this, 'create_rest_routes']);
    }

    public function create_rest_routes()
    {
        register_rest_route('mnf/v1', '/settings', [
            'method' => 'GET',
            'callback' => [$this, 'get_settings'],
            'permission_callback' => [$this, 'get_settings_permission']
        ],);

        register_rest_route('mnf/v1', '/settings', [
            'method' => 'POST',
            'callback' => [$this, 'save_settings'],
            'permission_callback' => [$this, 'save_settings_permission']
        ],);
    }

    public function get_settings()
    {
        $firstName = get_option('mnf_settings_firstName');
        $lastName = get_option('mnf_settings_lastName');
        $email = get_option('mnf_settings_email');
        $response = [
            'firstname' => 'Jhon',
            'lastname' => 'Doe',
            'email' => 'john@gmail.com'
        ];

        return rest_ensure_response($response);
    }

    public function get_settings_permission()
    {
        return true;
    }

    public function save_settings($req)
    {
        $firstName = sanitize_text_field($req['firstName']);
        $lastName = sanitize_text_field($req['lastName']);
        $email = sanitize_text_field($req['email']);

        update_option('mnf_settings_firstName', $firstName);
        update_option('mnf_settings_lastName', $lastName);
        update_option('mnf_settings_email', $email);

        return rest_ensure_response('success');
    }

    public function save_settings_permission()
    {
        return true;
    }
}

new WP_React_Setting_Rest_Route();
