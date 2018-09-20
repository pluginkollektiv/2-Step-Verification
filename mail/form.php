<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />

        <meta name="robots" content="noindex, nofollow" />
        <meta name="viewport" content="width=device-width" />

        <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans" />
        <link rel="stylesheet" href="<!-- %wp-includes% -->css/buttons.min.css" />
        <link rel="stylesheet" href='<!-- %wp-admin% -->css/login.min.css' />

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
            a.wpcoder {
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
                a.wpcoder {
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
        <a href="<!-- %login_url% -->" class="back"><?php esc_html_e( '← Back to Login', '2-Step-Verification' ); ?></a>
        <a href="http://wpcoder.de" target="_blank" class="wpcoder"><?php esc_html_e( 'Plugin from Sergej Müller', '2-Step-Verification' ); ?></a>

        <form action="" method="post">
            <p>
                <?php esc_html_e( 'A security code has been sent to your email address. <br /> The code will expire in 5 minutes.', '2-Step-Verification' ); ?>
            </p>

            <input type="text" name="_auth_token" placeholder="CODE" maxlength="5" autocomplete="off" autocorrect="off" spellcheck="false" required />
            <input type="submit" class="button button-primary" value="<?php esc_attr_e( 'Verify security code', '2-Step-Verification' ); ?>"/>
            <!-- %nonce_field% -->
        </form>
    </body>
</html>