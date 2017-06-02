<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
require_once APPPATH."third_party/phpmailer/PHPMailerAutoload.php"; 
 
class Mail extends PHPMailer
{
    function __construct()
    {
        parent::__construct();
    }
}