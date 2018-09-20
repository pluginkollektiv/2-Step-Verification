<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />

        <meta name="robots" content="noindex, nofollow" />
        <meta name="viewport" content="width=device-width" />

        <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans" />
        <link rel="stylesheet" href="<?php echo esc_attr( includes_url() ); ?>css/buttons.min.css" />
        <link rel="stylesheet" href='<?php echo esc_attr( admin_url() ); ?>css/login.min.css' />

        <style>
            a {
                top: 10px;
                display: table;
                position: absolute;
                text-decoration: none;
            }
            a.back {
                left: 20px;
            }
            a.pluginkollektiv {
                right: 20px;
            }
            form {
                top: 50%;
                left: 50%;
                width: 260px;
                display: block;
                margin: -130px 0 0 -130px;
                position: absolute;
                text-align: center;
            }
            input {
                width: 100%;
                display: inline-block;
            }
            input[type="text"] {
                margin: 5px 0;
                height: 50px;
                font-size: 30px;
                line-height: 50px;
                text-align: center;
            }

            @media only screen and (max-width: 480px) {
                a.pluginkollektiv {
                    top: auto;
                    right: 0;
                    bottom: 20px;
                    width: 100%;
                    text-align: center;
                }
            }
        </style>

        <title>
            <?php esc_html_e( 'Query of security code', '2-Step-Verification' ); ?>
        </title>
    </head>

    <body class="wp-core-ui">
        <a href="<?php esc_url( wp_login_url() ); ?>" class="back"><?php esc_html_e( '← Back to Login', '2-Step-Verification' ); ?></a>
        <a href="https://pluginkollektiv.org" target="_blank" class="pluginkollektiv"><?php esc_html_e( 'A Plugin of the Pluginkollektiv', '2-Step-Verification' ); ?></a>

        <form action="" method="post">
            <p>
                <?php esc_html_e( 'A security code has been sent to your email address.', '2-Step-Verification' ); ?>
				<br />
                <?php esc_html_e( 'The code will expire in 5 minutes.', '2-Step-Verification' ); ?>
            </p>

            <input type="text" name="_auth_token" placeholder="CODE" maxlength="5" autocomplete="off" autocorrect="off" spellcheck="false" required />
            <input type="submit" class="button button-primary" value="<?php esc_attr_e( 'Verify security code', '2-Step-Verification' ); ?>"/>
            <?php wp_nonce_field( '_auth_token_verify', '_auth_token_field', true ); ?>
        </form>
    </body>
</html>