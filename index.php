<?php
/**
  * @package AppraisalWorld
  */

//
//================================================================================
//	FILE:           index.php
//	AUTHOR:         binh
//	DESCRIPTION:    user click icon on MyO dashboard, take them to this page
//                      this page will post to Mercury API
//                      
//      /AW/myoffice_home/mercury_network/?appraiser_id=APPRAISER_ID&access_token=31a9ebe27248c41deca2093d4ce61089&aw_token=TodoHere
//	CREATED DATE:   4/12/2016
//	MODIFY DATE:    10/24/2016
//
//	(c)2016, Bradford Technologies, Inc., All Rights Reserved
//
//	Information herein may not be used, copied or disclosed in whole or part
//	without prior written consent from Bradford Technologies, Inc..
//================================================================================
//

//CHANGE HISTORY
//10/24/2016 : changed to make it works on any server - Jeff -mmeting 10/21/2016
//10/18/2016 : Mercury changed API docs

require_once( 'config.php' );

if( !isset( $_REQUEST['appraiser_id']) && $_REQUEST['appraiser_id'] == '' || 
        !isset( $_REQUEST['access_token']) && $_REQUEST['access_token'] == '' ||
        !isset( $_REQUEST['aw_token']) && $_REQUEST['aw_token'] == ''
 ) {
    
    //user must have their session available
    header("location: http://www.appraisalworld.com/myoffice");
    exit();
}

$appraiser_id       = $_REQUEST['appraiser_id'];
$mn_access_token    = $_REQUEST['access_token'];
$aw_token           = $_REQUEST['aw_token'];
 
//post this to Mercury API
    $post_fields = array(
        'client_id'         =>MERCURY_CLIENT_ID //BT ID that mercury provided
        , 'redirect_uri'    =>urlencode(REDIRECT_URI)
        , 'response_type'   =>urlencode('token') //static
        , 'scope'           =>urlencode('OrdersAPI AccountLogin') //static
    );
 
if( $mn_access_token != '' && $aw_token != '' ){ 
    header("location:". MERCURY_LOGIN_API . "?access_token=$mn_access_token");
    exit();
}
else{
    //if user not exists in Mercury, go to Mercury so that Mercury can redirect user to "create account" page
    // and redirect to AW redirect_uri.
    //url-ify the data for the POST
    foreach($post_fields as $key=>$value) {
        $post_fields_string .= $key.'='.$value.'&';
    }
    $post_fields_string = rtrim($post_fields_string,'&');
    
    header("location: ". MERCURY_AUTHORIZE_URL . '?' . $post_fields_string);
    exit();
}
