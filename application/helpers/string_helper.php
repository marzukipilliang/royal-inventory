<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function generateRandomString($length = 32) {
    //return substr(str_shuffle(str_repeat($x='!@#$&0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    return substr(str_shuffle(str_repeat($x='1234567abcdefghjkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}

