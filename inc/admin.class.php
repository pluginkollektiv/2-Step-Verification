<?php


/* Quit */
defined('ABSPATH') OR exit;


final class SIMPLE_TWO_FACTOR_AUTH {


	private static $_auth_token_name = 'auth_token';


	/**
	* Pseudo-Konstruktor der Klasse
	*
	* @since   0.0.1
	* @change  0.0.1
	*/

	public static function instance()
	{
		new self();
	}


	/**
	* Konstruktor der Klasse
	*
	* @since   0.0.1
	* @change  0.0.1
	*/

	public function __construct()
	{
		/* Exit on DOING_X */
		if ( (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) OR (defined('DOING_CRON') && DOING_CRON) OR (defined('DOING_AJAX') && DOING_AJAX) OR (defined('XMLRPC_REQUEST') && XMLRPC_REQUEST) ) {
			return;
		}

		/* User ID */
		$user_id = wp_get_current_user()->ID;

		/* Auth token */
		$user_auth_token = get_user_meta(
			$user_id,
			self::$_auth_token_name,
			true
		);

		/* Not loked? Exit! */
		if ( empty($user_auth_token) ) {
			return;
		}

		/* Process post request */
		if ( self::_is_post_request() ) {
			self::_verify_user_token(
				$user_id,
				$user_auth_token
			);
		}

		/* Display the form */
		self::_the_auth_form();

		/* ;) */
		exit;
	}


	private static function _is_post_request()
	{
		return ! empty( $_POST['_auth_token'] ) && ! empty( $_POST['_auth_token_field'] );
	}


	private static function _verify_user_token($user_id, $user_auth_token)
	{
		/* Verify the nonce */
		if ( ! check_admin_referer( '_auth_token_verify', '_auth_token_field' ) ) {
			wp_die('Noooooo?');
		}

		/* Sanitize token */
		$token = sanitize_text_field( $_POST['_auth_token'] );

		/* Compare user/form tokens */
		if ( ! wp_check_password($token, $user_auth_token, $user_id) ) {
			return false;
		}

		/* All clear, cancel user lock */
		delete_user_meta($user_id, 'auth_token');

		/* Redirect to admin */
		wp_safe_redirect( admin_url() );

		/* I'm fine */
		exit;
	}


	private static function _the_auth_form()
	{
		echo str_replace(
			array(
				'<!-- %login_url% -->',
				'<!-- %nonce_field% -->'
			),
			array(
				wp_login_url(),
				wp_nonce_field(
					'_auth_token_verify',
					'_auth_token_field',
					true,
					false
				)
			),
			file_get_contents(
				sprintf(
					'%s../html/form.html',
					plugin_dir_path( __FILE__ )
				)
			)
		);
	}


	public static function set_user_token($user_login, $current_user)
	{
		/* Skip on XMLRPC */
		if ( defined('XMLRPC_REQUEST') && XMLRPC_REQUEST) {
			return;
		}

		/* Generate a token */
		$token = wp_generate_password(5, false);

		/* Token as meta value */
		update_user_meta(
			$current_user->ID,
			self::$_auth_token_name,
			wp_hash_password($token)
		);

		/* Send token */
		wp_mail(
			$current_user->user_email,
			__('Dein Sicherheitscode'),
			$token
		);
	}
}