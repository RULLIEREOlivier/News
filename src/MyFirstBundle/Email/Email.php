<?php
/**
 * Created by PhpStorm.
 * User: olivier
 * Date: 13/02/2016
 * Time: 17:16
 */

namespace MyFirstBundle\Email;


class Email
{

    private $body;

    private $object;

    private $emailTo;

    private $emailFrom;

    public function __construct($object,$emailTo,$emailFrom,$body = null)
    {
        $this->object = $object;
        $this->emailFrom = $emailFrom;
        $this->emailTo = $emailTo;
        $this->body = $body;
    }

    private function sendEmail(){

    }

    public function sendMetaMail(){
        return $this->sendEmail();
    }

    public function sendMailAction($body){
        $this->body = $body;
    }

}