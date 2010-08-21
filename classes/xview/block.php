<?php defined('SYSPATH') or die('No direct script access.');

class Xview_Block extends Container
{
    public $content;
    
    public function render()
    {
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
                "\n".$this->content.
                "\n".'</'.$this->wrapper.'>'.
                "\n";
    }
}