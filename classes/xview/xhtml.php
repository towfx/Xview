<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Produce XHTML page object
 */
class Xview_XHTML extends Xview
{
    public $template='xhtml';
    public $meta = array();
    public $title = '{ TITLE }';
    public static $scripts = array();
    public static $styles = array();
    public $header = '{ HEADER }';
    public $slogan = '{ slogan }';
    public $navigation;
    public $content = '{ content }';
    public $footer;

    public $view;

    public function __construct($file=null)
    {
        if(isset($file))
        {
            $this->template=$file;
        }
        $this->view = View::factory($this->template);

        $this->view->bind('title', $this->title);

        $this->view->bind('header', $this->header);
        $this->view->bind('footer', $this->footer);

        $this->view->bind('content', $this->content);

        $this->view->bind('slogan', $this->slogan);
        $this->view->bind('login_box', $this->slogan);

        $this->navigation = View::factory('navigation/top');
        $this->view->bind('navigation', $this->navigation);

        $this->default_scripts();
        $this->view->bind('scripts', self::$scripts);
        $this->default_styles();
        $this->view->bind('styles', self::$styles);

    }

    /**
     * Assign default JavaScript files for the layout
     * @example To add extra script use XHTML::$scripts[]='path/to.js'; in controller
     */
    public function default_scripts()
    {
        if( ! is_array(self::$scripts))
        {
            self::$scripts = array();
        }
        self::$scripts[]= 'modules/xview/vendor/jqueryui/js/jquery-1.4.2.min.js';
        self::$scripts[]= 'modules/xview/vendor/jqueryui/js/jquery-ui-1.8.4.custom.min.js';
        self::$scripts[]= 'modules/xview/vendor/superfish/js/hoverIntent.js';
        self::$scripts[]= 'modules/xview/vendor/superfish/js/superfish.js';
        self::$scripts[]= 'modules/xview/media/xhtml.js';
    }

    /**
     * Assign default CSS files for the layout
     * @example To add extra script use XHTML::$styles[]='path/to.css'; in controller
     */
    public function default_styles()
    {
        if( ! is_array(self::$styles))
        {
            self::$styles = array();
        }
        self::$styles[]= 'modules/xview/vendor/bluetrip/css/screen.css';
        self::$styles[]= 'modules/xview/vendor/superfish/css/superfish.css';
        self::$styles[]= 'modules/xview/vendor/superfish/css/superfish-navbar.css';
        self::$styles[]= 'modules/xview/vendor/jqueryui/css/flick/jquery-ui-1.8.4.custom.css';
        self::$styles[]= 'modules/xview/media/xhtml.css';

    }

    /**
     * Alias for the original View::factory() to provide XHTML View
     * @param string $file
     * @param array $data
     * @return View
     */
    public static function factory($file=null, $data=null)
    {
        return new XHTML($file, $data);
    }

    /**
     * Assume undeclared property belongs to View
     * @param <type> $name
     * @param <type> $value
     */
    public function __set($name,  $value)
    {
        $this->view->set($name, $value);
    }

    /**
     * Emulate View::__toString()
     * @return string
     */
    public function __toString()
    {
        try
        {
            return $this->view->render();
        }
        catch (Exception $e)
        {
            // Display the exception message
            Kohana::exception_handler($e);

            return '';
        }
    }

}