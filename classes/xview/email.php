<?php defined('SYSPATH') or die('No direct script access.');

class Xview_Email extends Xview
{
    /**
     * Email address to send
     * @var string
     */
    public $to;
    /**
     * Email address sending email
     * @var string
     */
    public $from;
    /**
     * Email Subject
     * @var string
     */
    public $subject;
    /**
     * Message content
     * @var string Raw string ot View object
     */
    public $message;

    /**
     * Just collect all email headers
     */
    public function header()
    {
        // not sending any http header
    }
    /**
     * Initialize Swift Mailer, compose and send
     */
    public function send()
    {
        // @todo excute swift mailer
    }


}