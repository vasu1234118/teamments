<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
|  Google API Configuration
| -------------------------------------------------------------------
| 
| To get API details you have to create a Google Project
| at Google API Console (https://console.developers.google.com)
| 
|  client_id         string   Your Google API Client ID.
|  client_secret     string   Your Google API Client secret.
|  redirect_uri      string   URL to redirect back to after login.
|  application_name  string   Your Google application name.
|  api_key           string   Developer key.
|  scopes            string   Specify scopes
*/
$config['google']['client_id']        = '795329663242-c47oioriitlj31rgv4sk7k0nvpchg458.apps.googleusercontent.com';
$config['google']['client_secret']    = 'O7OMQgud9Q-C1aBwS5dbb1Yv';
if($_SERVER['HTTP_HOST']=='localhost')
{
	$url = 'http://localhost/taskmanagement/user_authentication';
	
}else{
    // add the server url here also and also add url in Authorized redirect URIs link 
    /* https://console.developers.google.com/apis/credentials/oauthclient/795329663242-c47oioriitlj31rgv4sk7k0nvpchg458.apps.googleusercontent.com?project=taskmangement-260507&authuser=1 */
   // logoin with my accout if not your
   $url = base_url().'user_authentication' ;
}


$config['google']['redirect_uri']     = $url;
$config['google']['application_name'] = 'Web client 1';
$config['google']['api_key']          = '';
$config['google']['scopes']           = array();