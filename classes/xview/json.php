<?php defined('SYSPATH') or die('No direct script access.');
/**
 * JSON output object
 *
 */
class Xview_JSON extends Xview
{
    /**
     * PHP Array
     * @var array
     */
    public $array;
    /**
     * Option accepted by json_encode
     * @var int
     */
    public $options;

    protected $mime_type = 'application/json';
    public $cacheable = true;
    public $no_header = false;
    public $cache_control = 'Cache-Control: no-cache, must-revalidate';
    public $expires = 'Expires: Mon, 26 Jul 1997 05:00:00 GMT';

    public function  __construct($array=null, $options=null)
    {
        $this->value=$value;
        $this->options=$options;
    }

    /**
     * Auto magically render array to json
     * @return <type>
     */
    public function  __toString()
    {
        $this->send_header();
        return json_encode($this->value, $this->options);
    }

    private function send_header()
    {
        if (!$this->no_header)
        {
            if(isset($this->cache_control))
            {
                header($this->cache_control);
            }
            if(isset($this->expires))
            {
                header($this->expires);
            }
            if(isset($this->mime_type))
            {
                header('Content-type: '.$this->mime_type);
            }
        }
    }
}