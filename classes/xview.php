<?php defined('SYSPATH') or die('No direct script access.');
/**
 * X View Ouput System
 * Forward all model to this rendering engine. The purpose is to avoid
 * Controller extends Template which kinda not logical when Template also
 * serving ajax output
 */
class Xview
{
    
    protected $mime_type;
    public $cacheable;
    public $no_header;
    public $cache_control;
    public $expires;
    public $headers;
    public function headers()
    {
        return array($headers);
    }

    /**
     * Decide how this object being rendered
     */
    public function output()
    {
        return 'STRING';

    }

    function  __toString()
    {
        return '{ __toString() not overriden yet ! }';
    }
}