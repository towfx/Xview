<?php defined('SYSPATH') or die('No direct script access.');

class Xview_Container
{
    public $class;
    public $id;
    public $span;
    public $last;
    public $wrapper = 'div';
    public $childs;

    public function content()
    {
        $output= '';

        if(is_array($this->childs))
        {
            $output=array();
            foreach($this->childs as $content)
            {
                $output[] = $content->render();
            }
            return implode("\n", $output);
        }
        else
        {
            return $output;
        }
    }


    public function render()
    {
        $class[] = 'container';
        $class[] = $this->class;
        if(isset($this->span))
        {
            $class[] = 'span-'.$this->span;
        }

        if(isset($this->last))
        {
            $class[]= 'last';
        }

        $attr = html::attributes(array('id'=> $this->id, 'class'=> implode(' ', $class)));
        return "\n".'<'.$this->wrapper.' '.$attr.'>'.
                "\n".$this->content().
                "\n".'</'.$this->wrapper.'>'.
                "\n";
    }

    public function  __toString()
    {
        try
        {
            return $this->render();
        }
        catch (Exception $e)
        {
            // Display the exception message
            Kohana::exception_handler($e);

            return '';
        }
    }
}