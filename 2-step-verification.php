<?php
/*
Plugin Name: 2-Step Verification
Description: Zwei-Faktor-Authentifizierung für WordPress. Unabhängig und datenschutzbewusst, denn der Sicherheitscode kommt an die E-Mail-Adresse deines WordPress-Benutzers. Einfach aktivieren und fertig.
Author: pluginkollektiv
Author URI: https://pluginkollektiv.org
Plugin URI: https://github.com/pluginkollektiv/2-Step-Verification
License: GPLv2 or later
Version: 0.0.2
*/

/*
Copyright (C)  2014-2017 Pluginkollektiv

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License along
with this program; if not, write to the Free Software Foundation, Inc.,
51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
*/


/* Quit */
defined('ABSPATH') OR exit;


/* Lib include */
require_once sprintf(
    '%s/inc/auth.class.php',
    dirname(__FILE__)
);


/* Action! */
add_action(
    'wp_login',
    array(
        'SIMPLE_TWO_FACTOR_AUTH',
        'set_user_token'
    ),
    10,
    2
);

add_action(
    'admin_init',
    array(
        'SIMPLE_TWO_FACTOR_AUTH',
        'instance'
    )
);