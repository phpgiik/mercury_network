<?php


if ( !defined( 'MERCURY_CLIENT_ID' ) ) {
	define( 'MERCURY_CLIENT_ID', '0146B061-8D40-4F1B-8CC3-DCD21A74D037' );
}

if ( !defined( 'REDIRECT_URI' ) ) {
	define( 'REDIRECT_URI', 'http://www.appraisalworld.com/AW/myoffice_home/mercury_network/mercury_oauth_callback.php' );
}


if ( !defined( 'MERCURY_LOGIN_API' ) ) {
	define( 'MERCURY_LOGIN_API', 'https://wbsvcqa.mercuryvmp.com/API/Vendors/AccountLogin' );
}

if ( !defined( 'MERCURY_SET_STATUS_API' ) ) {
	define( 'MERCURY_SET_STATUS_API', 'https://wbsvcqa.mercuryvmp.com/API/Vendors/Status' );
}

if ( !defined( 'MERCURY_AUTHORIZE_URL' ) ) {
	define( 'MERCURY_AUTHORIZE_URL', 'https://vendors.mercuryvmpqa.com/oauth/connect/authorize' );
}

$is_a_production_server = true;