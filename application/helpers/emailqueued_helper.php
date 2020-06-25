<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function email_activation($nik, $password) {
    $CI =& get_instance();

    $data = $CI->m_user->getByNik($nik);
    $nama = ucfirst(strtolower($data->nama));
    $email = $data->email;
    $token = $data->token;
    $activation_url = URL_WEB_API.'/Activation?token='.$token;
    require_once(VIEWPATH.'user/activation.php');
    
    
    $object = array(
        'to' => $email,
        'subject' => 'Your Activation Code!',
        'body' => $body
    );
    $CI->m_user->insertEmailQueued($object);
    
}
