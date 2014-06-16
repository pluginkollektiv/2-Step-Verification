<?php


/* Quit */
defined('ABSPATH') OR exit;


final class SIMPLE_TWO_FACTOR_AUTH {


    /* Token field name */

    private static $_token_field = 'auth_token';


    /* Current user ID */

    private static $_user_id = '';



    /**
    * Class preconstructor
    *
    * @since   0.0.1
    * @change  0.0.1
    */

    public static function instance()
    {
        new self();
    }


    /**
    * Class constructor
    *
    * @since   0.0.1
    * @change  0.0.2
    */

    public function __construct()
    {
        /* User ID */
        if ( ! self::$_user_id = get_current_user_id() ) {
            return;
        }

        /* Watch for verifying */
        self::_verify_user_token();
    }


    /**
    * User token check
    *
    * @since   0.0.1
    * @change  0.0.3
    */

    public static function _verify_user_token()
    {
        /* Exit on DOING_X */
        if ( (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) OR (defined('DOING_CRON') && DOING_CRON) OR (defined('DOING_AJAX') && DOING_AJAX) OR (defined('XMLRPC_REQUEST') && XMLRPC_REQUEST) ) {
            return;
        }

        /* Init */
        $user_id = self::$_user_id;
        $token_field = self::$_token_field;

        /* User token */
        $user_token = get_user_meta(
            $user_id,
            $token_field,
            true
        );

        /* Not locked? Exit! */
        if ( empty($user_token) ) {
            return;
        }

        /* Token life expired? */
        if ( ! get_site_transient( $token_field . $user_id ) ) {
            /* Logout */
            wp_logout();

            /* Redirect */
            auth_redirect();
        }

        /* Process post request */
        if ( self::_is_post_request() ) {
            self::_handle_post_request( $user_token );
        }

        /* Display the form */
        self::_the_auth_form();

        /* ;) */
        exit;
    }


    /**
    * Destroy token data
    *
    * @since   0.0.1
    * @change  0.0.2
    */

    private static function _destroy_user_token()
    {
        /* Init */
        $user_id = self::$_user_id;
        $token_field = self::$_token_field;

        /* Cancel user lock */
        delete_user_meta(
            $user_id,
            $token_field
        );

        /* Delete exp. marker */
        delete_site_transient(
            $token_field . $user_id
        );
    }


    /**
    * Checks for POST vars
    *
    * @since   0.0.1
    * @change  0.0.2
    *
    * @param   boolean  TRUE if certain POST vars ​​are set
    */

    private static function _is_post_request()
    {
        return ! empty( $_POST['_auth_token'] ) && ! empty( $_POST['_auth_token_field'] );
    }


    /**
    * Generates a user token
    *
    * @since   0.0.1
    * @change  0.0.3
    *
    * @param   string  $user_token  User auth token
    * @return  mixed                FALSE if the $auth_token does not match the hashed token
    */

    private static function _handle_post_request($user_token)
    {
        /* Verify the nonce */
        check_admin_referer( '_auth_token_verify', '_auth_token_field' );

        /* Init */
        $user_id = self::$_user_id;
        $token_field = self::$_token_field;

        /* Sanitize token */
        $auth_token = sanitize_text_field( trim($_POST['_auth_token']) );

        /* Compare user/form tokens */
        if ( ! wp_check_password($auth_token, $user_token, $user_id) ) {
            return false;
        }

        /* Kill the token */
        self::_destroy_user_token();

        /* Redirect to admin */
        wp_safe_redirect( admin_url() );

        /* I'm fine */
        exit;
    }


    /**
    * Displays the auth form page
    *
    * @since   0.0.1
    * @change  0.0.3
    */

    private static function _the_auth_form()
    {
        echo str_replace(
            array(
                '<!-- %login_url% -->',
                '<!-- %nonce_field% -->',
                '<!-- %wp-includes% -->',
                '<!-- %wp-admin% -->'
            ),
            array(
                wp_login_url(),
                wp_nonce_field(
                    '_auth_token_verify',
                    '_auth_token_field',
                    true,
                    false
                ),
                includes_url(),
                admin_url()
            ),
            file_get_contents(
                sprintf(
                    '%s../html/form.html',
                    plugin_dir_path( __FILE__ )
                )
            )
        );
    }


    /**
    * Generates a user token
    *
    * @since   0.0.1
    * @change  0.0.2
    *
    * @param   string  $user_login    Current user name
    * @param   object  $current_user  Current user object
    */

    public static function set_user_token($user_login, $current_user)
    {
        /* Skip on XMLRPC */
        if ( defined('XMLRPC_REQUEST') && XMLRPC_REQUEST ) {
            return;
        }

        /* Init */
        $user_id = $current_user->ID;
        $token_field = self::$_token_field;
        $user_email = $current_user->user_email;

        /* Generate a token */
        $token = wp_generate_password(5, false);

        /* Token as meta value */
        update_user_meta(
            $user_id,
            $token_field,
            wp_hash_password($token)
        );

        /* Expiration date */
        set_site_transient(
            $token_field . $user_id,
            1,
            5 * MINUTE_IN_SECONDS
        );

        /* Send token */
        wp_mail(
            $user_email,
            __('Dein Sicherheitscode'),
            $token
        );
    }
}